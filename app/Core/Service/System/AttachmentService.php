<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://mall.xcmei.com
 * @document https://mall.xcmei.com
 * @contact  8257796@qq.com
 */
namespace App\Core\Service\System;

use App\Constants\State\AttachmentState;
use App\Core\Dao\System\AttachmentDao;
use App\Core\Plugins\Bucket\SamplesBucket;
use App\Core\Service\AbstractService;
use App\Exception\NotFoundException;
use App\Model\Attachment;
use Throwable;

class AttachmentService extends AbstractService
{
    protected string $dao = AttachmentDao::class;

    public function getInfoByMd5(string $md5): ?Attachment
    {
        try {
            $dao = new AttachmentDao();
            return $dao->getInfoByMd5($md5);
        } catch (Throwable $e) {
            return null;
        }
    }

    /**
     * 保存上传文件信息
     * @param array $fileData
     * @param string $hash
     * @param string $key
     * @param string $system
     * @return int
     */
    public function createUpload(array $fileData, string $hash, string $key, string $system = AttachmentState::SYSTEM_QINIU): int
    {
        $config = config('custom')['attachment'];
        $md5 = '';
        if ($fileData['size'] <= $config['check_md5'] && file_exists($fileData['tmp_file'])) {
            $md5 = md5_file($fileData['tmp_file']);
        }

        $data = [
            'system' => $system,
            'type' => $fileData['type'],
            'size' => $fileData['size'],
            'hash' => $hash,
            'key' => $key,
            'index' => $this->generateIndex($key),
            'md5' => $md5,
            'status' => AttachmentState::STATUS_ENABLED
        ];
        return $this->create($data);
    }

    /**
     * 批量删除附件
     * @param array $ids
     * @param string $system
     * @return bool
     */
    public function batchDelete(array $ids, string $system = AttachmentState::SYSTEM_QINIU): bool
    {
        $dao = new AttachmentDao();
        $keys = $dao->getColumnByCondition([
            ['id', 'in', $ids],
            ['system', '=', $system]
        ], 'key');

        if (empty($keys)) {
            throw new NotFoundException('资源不存在');
        }

        // 成功删除的资源
        $bucket = (new SamplesBucket())->make($system);
        $result = $bucket->batchDelete($keys);
        if (! empty($result['success'])) {
            $index = [];
            foreach ($result['success'] as $key) {
                $index[] = $this->generateIndex($key);
            }
            $dao->deleteByCondition([
                ['index', 'in', $index],
            ]);
        }
        return true;
    }

    /**
     * 文件失效
     * @param string $key
     */
    public function failure(string $key)
    {
        $dao = new AttachmentDao();
        $info = $dao->getInfoByIndex($this->generateIndex($key));
        $info->status = AttachmentState::STATUS_DISABLED;
        $info->save();
    }

    /**
     * 文件批量失效
     * @param array $oldKeys
     * @param array $newKeys
     */
    public function batchFailure(array $oldKeys, array $newKeys)
    {
        $diff = array_diff($oldKeys, $newKeys);
        if (! empty($diff)) {
            $diffIndex = [];
            foreach ($diff as $item) {
                $diffIndex[] = $this->generateIndex($item);
            }
            $dao = new AttachmentDao();
            $dao->updateByCondition([
                ['index', 'in', $diffIndex]
            ], [
                'status' => AttachmentState::STATUS_DISABLED
            ]);
        }
    }

    /**
     * 生成文件查询索引
     * @param string $key
     * @return string
     */
    public function generateIndex(string $key): string
    {
        return md5($key);
    }
}

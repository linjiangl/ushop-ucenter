<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://mall.xcmei.com
 * @document https://mall.xcmei.com
 * @contact  8257796@qq.com
 */
namespace App\Core\Dao\User;

use App\Core\Dao\AbstractDao;
use App\Model\User\UserHistory;

class UserHistoryDao extends AbstractDao
{
    protected string $model = UserHistory::class;

    protected array $noAllowActions = [];

    protected string $notFoundMessage = '浏览记录不存在';
}

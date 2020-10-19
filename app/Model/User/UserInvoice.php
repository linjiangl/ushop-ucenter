<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://store.yii.red
 * @document https://document.store.yii.red
 * @contact  8257796@qq.com
 */
namespace App\Model\User;

use App\Model\Model;
use Hyperf\Database\Model\SoftDeletes;

/**
 * @property int $id
 * @property int $user_id
 * @property int $open_type 开具类型 0:个人 1:企业
 * @property int $type 发票类型 0:增值税普通发票 1:增值税专用发票 2:组织(非企业)增值税普通发票
 * @property string $title 发票抬头
 * @property string $taxpayer_no 纳税人识别号
 * @property string $register_address 注册地址
 * @property string $register_phone 注册电话
 * @property string $bank_name 开户银行
 * @property string $bank_account 银行账号
 * @property int $content_type 发票内容 0:商品明细
 * @property string $email 邮箱
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class UserInvoice extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_invoice';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'user_id', 'open_type', 'type', 'title', 'taxpayer_no', 'register_address', 'register_phone', 'bank_name', 'bank_account', 'content_type', 'email', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'user_id' => 'integer', 'open_type' => 'integer', 'type' => 'integer', 'content_type' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}

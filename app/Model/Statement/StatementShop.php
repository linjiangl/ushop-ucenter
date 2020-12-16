<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://mall.xcmei.com
 * @document https://mall.xcmei.com
 * @contact  8257796@qq.com
 */
namespace App\Model\Statement;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $id
 * @property int $shop_id
 * @property int $user_id
 * @property float $amount
 * @property string $type 类别 order:订单, withdraw:提现, refund:退款
 * @property string $module 关联模型
 * @property int $module_id
 * @property string $order_sn
 * @property string $remark
 * @property int $created_time
 * @property int $updated_time
 */
class StatementShop extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'statement_shop';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id', 'shop_id', 'user_id', 'amount', 'type', 'module', 'module_id', 'order_sn', 'remark', 'created_time', 'updated_time'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['id' => 'integer', 'shop_id' => 'integer', 'user_id' => 'integer', 'amount' => 'float', 'module_id' => 'integer', 'created_time' => 'integer', 'updated_time' => 'integer'];
}

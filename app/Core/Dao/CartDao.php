<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://store.yii.red
 * @document https://document.store.yii.red
 * @contact  8257796@qq.com
 */
namespace App\Core\Dao;

use App\Model\Cart;

class CartDao extends AbstractDao
{
    protected $model = Cart::class;

    protected $noAllowActions = [];
}

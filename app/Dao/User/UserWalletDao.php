<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://store.yii.red
 * @document https://document.store.yii.red
 * @contact  8257796@qq.com
 */
namespace App\Dao\User;

use App\Dao\AbstractDao;
use App\Model\User\UserWallet;

class UserWalletDao extends AbstractDao
{
    protected $model = UserWallet::class;

    protected $noAllowActions = [];

    protected $notFoundMessage = '用户钱包异常';
}

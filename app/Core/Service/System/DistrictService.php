<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://store.yii.red
 * @document https://document.store.yii.red
 * @contact  8257796@qq.com
 */
namespace App\Core\Service\System;

use App\Core\Dao\System\DistrictDao;
use App\Core\Service\AbstractService;

class DistrictService extends AbstractService
{
    protected $dao = DistrictDao::class;
}

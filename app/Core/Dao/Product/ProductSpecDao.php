<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://mall.xcmei.com
 * @document https://mall.xcmei.com
 * @contact  8257796@qq.com
 */
namespace App\Core\Dao\Product;

use App\Core\Dao\AbstractDao;
use App\Model\Product\ProductSpec;

class ProductSpecDao extends AbstractDao
{
    protected string $model = ProductSpec::class;

    protected array $noAllowActions = [];

    protected string $notFoundMessage = '商品关联规格不存在';

    /**
     * 检查规格下是否有商品
     * @param int $specId
     * @return bool
     */
    public function checkSpecIdHasProduct(int $specId): bool
    {
        return ProductSpec::query()->where('spec_id', $specId)->count() ? true : false;
    }
}

<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://mall.xcmei.com
 * @document https://mall.xcmei.com
 * @contact  8257796@qq.com
 */
namespace App\Core\Service\Goods\Stock\Change;

abstract class AbstractStockChangeService implements InterfaceStockChangeService
{
    protected array $params = [];

    public function setParams(array $data): self
    {
        $this->params = $data;
        return $this;
    }
}

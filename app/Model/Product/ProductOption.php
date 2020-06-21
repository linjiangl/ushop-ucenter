<?php

declare(strict_types=1);
/**
 * Multi-user mall
 *
 * @link     https://www.doubi.site
 * @document https://doc.doubi.site
 * @contact  8257796@qq.com
 */
namespace App\Model\Product;

use Hyperf\DbConnection\Model\Model;

/**
 * @property int $product_id
 * @property int $option_id
 */
class ProductOption extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'product_option';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id', 'option_id'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = ['product_id' => 'integer', 'option_id' => 'integer'];
}

<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\ProductAttributeRepository;
use App\Validators\ProductAttributeValidator;
use App\Models\ProductAttribute;

/**
 * Class ProductAttributeRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class ProductAttributeRepositoryEloquent extends BaseRepository implements ProductAttributeRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProductAttribute::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function __construct()
    {
        $this->model = new ProductAttribute;
    }

    public function getImages($limit, $slug)
    {
        $query = $this->model;
        $query = $query->join('products', 'product_attributes.product_id', '=', 'products.id')
        ->join('colors', 'product_attributes.color_id', '=', 'colors.id')
        ->join('images', 'product_attributes.id', '=', 'images.product_attributes_id')
        ->where('products.slug', '=', $slug );

        return $query->paginate($limit);
    }

    public function getImagesAll($limit)
    {
        $query = $this->model;
        $query = $query->join('products', 'product_attributes.product_id', '=', 'products.id')
        ->join('colors', 'product_attributes.color_id', '=', 'colors.id')
        ->join('images', 'product_attributes.id', '=', 'images.product_attributes_id');

        return $query->paginate($limit);
    }

    public function getColor($limit, $slug)
    {
        $query = $this->model;
        $query = $query->join('products', 'product_attributes.product_id', '=', 'products.id')
        ->join('colors', 'product_attributes.color_id', '=', 'colors.id')
        ->where('products.slug', '=', $slug );

        return $query->paginate($limit);
    }

    public function getProductByPAId($param)
    {
        $query = $this->model;
        $query = $query->join('products', 'products.id', '=', 'product_attributes.product_id')
        ->join('order_details', 'order_details.product_attribute_id', '=', 'product_attributes.id')
        ->orderBy('order_details.order_id', 'desc');

        return $query->paginate($param);
    }
}

<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\CategoryRepository;
use App\Models\Category;
use App\Validators\CategoryValidator;

/**
 * Class CategoryRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
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
        $this->model = new Category();
    }

    public function getCategoryByParentId($id)
    {
        $query = $this->model;

        return $this->model->where('parent_id', '=', $id)
                           ->take(100)
                           ->get();
    }

    public function getCategoryByParentIdIsNull()
    {
        $query = $this->model;

        return $this->model->where('parent_id', '=', null)
                           ->take(100)
                           ->get();
    }
}

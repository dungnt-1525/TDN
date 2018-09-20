<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    /**
     * The Model name.
     *
     * @var \Illuminate\Database\Eloquent\Model;
     */
    
    abstract public function getModel();
    
    public function create($atts)
    {
        return $this->model->create($atts);
    }

    /**
     * Paginate the given query.
     *
     * @param The number of models to return for pagination $n integer
     *
     * @return mixed
     */
    public function getPaginate($n)
    {
        return $this->model->paginate($n);
    }

    /**
     * FindOrFail Model and return the instance.
     *
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }
    
    public function getIdBySlug($slug)
    {
        return $this->model->where('slug', '=', $slug)->first()->id;
    }

    /**
     * FindOrFail Model and return the instance.
     * @param string $slug
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Collection
     *
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function getBySlug($slug)
    {
        return $this->model->where('slug', 'like', $slug.'%')->first();
    }
    
    /**
     * Get all of model in the database.
     *
     * @return mixed
     */
    public function getAllRecord()
    {
        return $this->model->all();
    }
    /**
     * find records have a col like a value
     * @param unknown $name named column
     * @return mixed
     */
    public function getWhereACol($name, $value)
    {
        return $this->model->where($name, 'like', "%$value%");
    }
    
    /**
     * find records have a column like a value and order by a col
     * @param unknown $name named col
     * @param unknown $value
     * @param unknown $orderByCol
     * @param unknown $sort: des or asc
     * @return mixed
     */
    public function getWhereAColAndOrderBy($name, $value, $orderByCol, $sort)
    {
        return $this->model->where($name, 'like', "%$value%")->orderBy($orderByCol, $sort)->paginate(12);
    }
    
    /**
     * find record have columns as values and order by a col
     * @param unknown $col
     * @param unknown $value
     * @return mixed
     */
    public function getWhereCols($cols, $values)
    {
        return $this->model->where($cols[0], 'like', "%$values[0]%")->where($cols[1], '=', $values[1]);
    }
    
    /**
     * find record have columns as values
     * @param unknown $cols
     * @param unknown $values
     * @param unknown $orderByCol
     * @param unknown $sort
     * @return unknown
     */
    public function getWhereColsAndOrderBy($cols, $values, $orderByCol, $sort)
    {
        return $this->model->where($cols[0], 'like', "%$values[0]%")
                            ->where($cols[1], '=', $values[1])
                            ->orderBy($orderByCol, $sort)->paginate(12);
    }
    
    /**
     * Find record of model by a field assign by a value.
     * @param unknown $field
     * @param unknown $value
     *
     * @return mixed
     */
    public function findByField($field, $value)
    {
        return $this->model->where($field, '=', $value)->get();
    }
    
    /**
     * Find record of model by limit.
     * @param unknown $limit
     *
     * @return mixed
     */
    public function getOrderByAndLimit($limit, $orderBy)
    {
        return $this->model->orderBy($orderBy)->limit($limit)->get();
    }
    
    public function getByLimit($limit)
    {
        return $this->model->limit($limit)->get();
    }
    
    public function getLimitWhere($limit, $column, $value)
    {
        return $this->model->where($column, '=', $value)->limit($limit)->get();
    }
}

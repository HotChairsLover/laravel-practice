<?php

namespace App\Repositories;

use App\Models\AdvPost as Model;
use Illuminate\Pagination\LengthAwarePaginator;

class AdvPostRepository extends CoreRepository
{
    private $columnsForIndex = [
        'id',
        'title',
        'is_published',
        'published_at',
        'price',
        'category_id',
    ];

    public function getBySearchForIndexWithPaginate($perPage, $search)
    {
        $result = $this->startConditions()
            ->select($this->columnsForIndex)
            ->orderBy('id', 'DESC')
            ->where('title', 'LIKE', "%{$search}%")
            ->orWhere('description', 'LIKE', "%{$search}%")
            ->with('category:id,title')
            ->paginate($perPage);

        $result->appends(['search' => $search]);

        return $result;
    }
    public function getByCategoryForIndexWithPaginate($perPage, $categoryId)
    {
        $result = $this->startConditions()
            ->select($this->columnsForIndex)
            ->orderBy('id','DESC')
            ->where('is_published', '=', '1')
            ->where('category_id', '=', $categoryId)
            ->with('category:id,title')
            ->paginate($perPage);

        $result->appends(['category' => $categoryId]);

        return $result;
    }
    /**
     * @return LengthAwarePaginator
     */
    public function getForIndexWithPaginate($perPage)
    {
        $result = $this->startConditions()
            ->select($this->columnsForIndex)
            ->orderBy('id','DESC')
            ->where('is_published', '=', '1')
            ->with('category:id,title')
            ->paginate($perPage);

        return $result;
    }

    /**
     * @return LengthAwarePaginator
     */
    public function getForProfileWithPaginate($perPage, $userId)
    {
        $result = $this->startConditions()
            ->select($this->columnsForIndex)
            ->orderBy('id','DESC')
            ->where('user_id', '=', "$userId")
            ->with('category:id,title')
            ->paginate($perPage);

        return $result;
    }

    public function getShow($id)
    {
        $columns = [
            'id',
            'title',
            'description',
            'price',
            'category_id',
            'user_id',
            'published_at',
            'updated_at',
            'created_at',
            'deleted_at',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->where('id', '=', "$id")
            ->with([
                'category:id,title',
                'user:id,name',
            ])
            ->first();

        return $result;
    }


    /**
     * @return LengthAwarePaginator
     */
    public function getAllWithPaginate()
    {
        $columns = [
          'id',
          'title',
          'slug',
          'is_published',
          'published_at',
          'user_id',
          'category_id',
        ];

        $result = $this->startConditions()
            ->select($columns)
            ->orderBy('id','DESC')
            ->with([
                'category:id,title',
                'user:id,name'
            ])
            ->paginate(25);

        return $result;
    }

    /**
     * @param int $id
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}

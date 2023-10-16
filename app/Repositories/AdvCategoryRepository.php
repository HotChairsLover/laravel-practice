<?php

namespace App\Repositories;

use App\Models\AdvCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class AdvCategoryRepository
 *
 * @package App\Repositories
 */
class AdvCategoryRepository extends CoreRepository
{
    protected function getModelClass()
    {
        return Model::class;
    }
    /**
     * Получить модель для редатирования в админке
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    public function getForComboBox()
    {
        $columns = implode(',', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $result = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $result;
    }

    public function getAllWithPaginate($perPage = null)
    {
        $columns = ['id', 'title', 'parent_id'];

        $result = $this
            ->startConditions()
            ->select($columns)
            ->with('parentCategory:id,title')
            ->paginate($perPage);

        return $result;
    }



}

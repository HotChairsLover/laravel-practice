<?php

namespace App\Http\Controllers\Api\Adv;

use App\Http\Controllers\Controller;
use App\Http\Factories\Adv\AdvCategoryFactory;
use App\Http\Requests\Adv\CategoryCreateRequest;
use App\Http\Requests\Adv\CategoryUpdateRequest;
use App\Repositories\AdvCategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends ApiAdvBaseController
{
    /**
     * @var AdvCategoryRepository
     */
    private $advCategoryRepository;

    public function __construct(AdvCategoryRepository $advCategoryRepository)
    {
        parent::__construct();
        $this->advCategoryRepository = $advCategoryRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = $this->advCategoryRepository->getAllWithPaginate(15);

        return $paginator;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $data = $request->input();
        $categoryFactory = new AdvCategoryFactory();
        $item = $categoryFactory->create($data);
        $item->save();

        if ($item) {
            return ['success' => 'Успешно сохранено'];
        } else {
            return ['msg' => 'Ошибка сохранения'];
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $item = $this->advCategoryRepository->getEdit($id);
        if (empty($item)) {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->input();
        $categoryFactory = new AdvCategoryFactory();
        $item = $categoryFactory->update($item, $data);
        $item->save();

        if ($item) {
            return ['success' => 'Успешно сохранено'];
        } else {
            return ['msg' => 'Ошибка сохранения'];
        }
    }
}

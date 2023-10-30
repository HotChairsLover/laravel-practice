<?php

namespace App\Http\Controllers\Api\Adv;

use App\Http\Controllers\Controller;
use App\Http\Factories\Adv\AdvPostFactory;
use App\Http\Requests\Adv\PostCreateRequest;
use App\Http\Requests\Adv\PostUpdateRequest;
use App\Models\AdvPost;
use App\Repositories\AdvCategoryRepository;
use App\Repositories\AdvPostRepository;
use Illuminate\Http\Request;

class PostController extends ApiAdvBaseController
{
    /**
     * @var AdvPostRepository
     */
    private $advPostRepository;

    public function __construct(AdvPostRepository $advPostRepository)
    {
        parent::__construct();

        $this->advPostRepository = $advPostRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = $this->advPostRepository->getForIndexWithPaginate(20);

        return $paginator;
    }

    public function categorySearch(Request $request)
    {
        $categoryId = $request->category;
        $paginator = $this->advPostRepository->getByCategoryForIndexWithPaginate(20, $categoryId);

        return $paginator;
    }

    public function textSearch(Request $request)
    {
        $search = $request->search;
        $paginator = $this->advPostRepository->getBySearchForIndexWithPaginate(20, $search);

        return $paginator;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->input();
        $postFactory = new AdvPostFactory();
        $item = $postFactory->create($data);
        $item->save();

        if ($item) {
            return ['id' => $item->id, 'success' => "Успешно сохранено"];
        } else {
            return ['msg' => 'Ошибка сохранения'];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->advPostRepository->getShow($id);

        return $item;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $item = $this->advPostRepository->getEdit($id);

        if (empty($item)) {
            return ['msg' => "Запись id=[{$id}] не найдена"];
        }

        $data = $request->input();

        $postFactory = new AdvPostFactory();
        $item = $postFactory->update($item, $data);
        $item->save();

        if ($item) {
            return ['id' => $item->id, 'success' => "Успешно сохранено"];
        } else {
            return ['msg' => 'Ошибка сохранения'];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = AdvPost::destroy($id);
        if ($result) {
            return ["success" => "Запись id[$id] удалена"];
        } else {
            return ['msg' => 'Ошибка удаления'];
        }
    }
}

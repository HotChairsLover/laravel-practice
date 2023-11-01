<?php

namespace App\Http\Controllers\Api\Adv;

use App\Http\Requests\Adv\CategoryCreateRequest;
use App\Http\Requests\Adv\CategoryUpdateRequest;
use App\Http\Resources\SuccessJsonResource;
use App\Repositories\AdvCategoryRepository;

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

        return SuccessJsonResource::make($paginator);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryCreateRequest $request)
    {
        $result = app(CreateCategoryAction::class)($request->input());
        return SuccessJsonResource::make($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, string $id)
    {
        $result = app(UpdateCategoryAction::class)($request->input(), $id, $this->advCategoryRepository);
        return SuccessJsonResource::make($result);
    }
}

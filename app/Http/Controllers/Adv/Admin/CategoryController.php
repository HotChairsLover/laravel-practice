<?php

namespace App\Http\Controllers\Adv\Admin;

use App\Http\Factories\Adv\AdvCategoryFactory;
use App\Http\Requests\Adv\CategoryCreateRequest;
use App\Http\Requests\Adv\CategoryUpdateRequest;
use App\Models\AdvCategory;
use App\Repositories\AdvCategoryRepository;

class CategoryController extends BaseController
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

        return view('adv.admin.categories.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = new AdvCategory();
        $categoryList
            = $this->advCategoryRepository->getForComboBox();

        return view('adv.admin.categories.edit',
            compact('item', 'categoryList'));
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
            return redirect()->route('adv.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->advCategoryRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->advCategoryRepository->getForComboBox();

        return view('adv.admin.categories.edit',
            compact('item', 'categoryList'));
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
            return redirect()
                ->route('adv.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

}

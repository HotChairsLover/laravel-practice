<?php

namespace App\Http\Controllers\Adv\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvCategoryCreateRequest;
use App\Http\Requests\AdvCategoryUpdateRequest;
use App\Models\AdvCategory;
use App\Repositories\AdvCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    /**
     * @var AdvCategoryRepository
     */
    private $advCategoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->advCategoryRepository = app(AdvCategoryRepository::class);
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
    public function store(AdvCategoryCreateRequest $request)
    {
        $data = $request->input();

        $item = (new AdvCategory())->create($data);

        if($item)
        {
            return redirect()->route('adv.admin.categories.edit', [$item->id])
                ->with(['success' => 'Успешно сохранено']);
        }
        else{
            return back()->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd(__METHOD__);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->advCategoryRepository->getEdit($id);
        if(empty($item))
        {
            abort(404);
        }
        $categoryList = $this->advCategoryRepository->getForComboBox();

        return view('adv.admin.categories.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvCategoryUpdateRequest $request, string $id)
    {
        $item = $this->advCategoryRepository->getEdit($id);
        if(empty($item))
        {
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if($result)
        {
            return redirect()
                ->route('adv.admin.categories.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        }
        else
        {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd(__METHOD__);
    }
}

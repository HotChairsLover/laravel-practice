<?php

namespace App\Http\Controllers\Adv;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdvPostCreateRequest;
use App\Http\Requests\AdvPostUpdateRequest;
use App\Repositories\AdvCategoryRepository;
use App\Repositories\AdvPostRepository;
use Illuminate\Http\Request;
use App\Models\AdvPost;

class PostController extends BaseController
{
    /**
     * @var AdvPostRepository
     */
    private $advPostRepository;

    /**
     * @var AdvCategoryRepository
     */
    private $advCategoryRepository;

    public function __construct()
    {
        parent::__construct();

        $this->advPostRepository = app(AdvPostRepository::class);
        $this->advCategoryRepository = app(AdvCategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->category)
        {
            $categoryId = $request->category;
            $paginator = $this->advPostRepository->getByCategoryForIndexWithPaginate(20, $categoryId);
        }
        elseif ($request->search)
        {
            $search = $request->search;
            $paginator = $this->advPostRepository->getBySearchForIndexWithPaginate(20, $search);
        }
        else
        {
            $paginator = $this->advPostRepository->getForIndexWithPaginate(20);
        }

        return view('adv.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = new AdvPost();
        $categoryList =
            $this->advCategoryRepository->getForComboBox();

        return view('adv.posts.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AdvPostCreateRequest $request)
    {
        $data = $request->input();
        $item = (new AdvPost())->create($data);
        if($item)
        {
            return redirect()
                ->route('adv.posts.edit', [$item->id])
                ->with(['success' => "Успешно сохранено"]);
        }
        else
        {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->advPostRepository->getShow($id);
        //dd(__METHOD__,$item);

        return view('adv.posts.show', compact('item'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->advPostRepository->getEdit($id);
        if(empty($item))
        {
            abort(404);
        }

        $categoryList
            = $this->advCategoryRepository->getForComboBox();

        return view('adv.posts.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdvPostUpdateRequest $request, string $id)
    {
        $item = $this->advPostRepository->getEdit($id);

        if(empty($item))
        {
            return back()
                ->withErrors(['msg' => 'Запись id=[{$id}] не найдена'])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if($result)
        {
            return redirect()
                ->route('adv.posts.edit', $item->id)
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
        $result = AdvPost::destroy($id);

        if($result)
        {
            return redirect()
                ->route('adv.posts.index')
                ->with(["success" => "Запись id[$id] удалена"]);
        }
        else
        {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
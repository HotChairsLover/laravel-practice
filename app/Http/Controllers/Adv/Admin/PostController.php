<?php

namespace App\Http\Controllers\Adv\Admin;

use App\Http\Factories\Adv\AdvPostFactory;
use App\Http\Requests\Adv\PostCreateRequest;
use App\Http\Requests\Adv\PostUpdateRequest;
use App\Models\AdvPost;
use App\Repositories\AdvCategoryRepository;
use App\Repositories\AdvPostRepository;
use Auth;

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

    public function __construct(AdvPostRepository $advPostRepository, AdvCategoryRepository $advCategoryRepository)
    {
        parent::__construct();

        $this->advPostRepository = $advPostRepository;
        $this->advCategoryRepository = $advCategoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = $this->advPostRepository->getAllWithPaginate();
        return view('adv.admin.posts.index', compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $item = new AdvPost();
        $categoryList =
            $this->advCategoryRepository->getForComboBox();

        return view('adv.admin.posts.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $data = $request->input();
        $postFactory = new AdvPostFactory();
        $item = $postFactory->create($data);

        if ($item) {
            return redirect()
                ->route('adv.admin.posts.edit', [$item->id])
                ->with(['success' => "Успешно сохранено"]);
        } else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = $this->advPostRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }

        $categoryList
            = $this->advCategoryRepository->getForComboBox();

        return view('adv.admin.posts.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $item = $this->advPostRepository->getEdit($id);

        if (empty($item)) {
            return back()
                ->withErrors(['msg' => 'Запись id=[{$id}] не найдена'])
                ->withInput();
        }

        $data = $request->all();
        $user = Auth::user();
        $postFactory = new AdvPostFactory();
        $result = $postFactory->update($item, $data, $user->id);

        if ($result) {
            return redirect()
                ->route('adv.admin.posts.edit', $item->id)
                ->with(['success' => 'Успешно сохранено']);
        } else {
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

        if ($result) {
            return redirect()
                ->route('adv.admin.posts.index')
                ->with(["success" => "Запись id[$id] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}

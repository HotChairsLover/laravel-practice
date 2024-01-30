<?php

namespace App\Http\Controllers\Api\Adv;

use App\Http\Requests\Adv\PostCreateRequest;
use App\Http\Requests\Adv\PostUpdateRequest;
use App\Http\Resources\AdvPostShowJsonResource;
use App\Http\Resources\SuccessJsonResource;
use App\Models\AdvPost;
use App\Repositories\AdvPostRepository;
use App\Repositories\ProfileRepository;
use Auth;
use Illuminate\Http\Request;

class PostController extends ApiAdvBaseController
{
    /**
     * @var AdvPostRepository
     */
    private $advPostRepository;
    /**
     * @var ProfileRepository
     */
    private $profileRepository;

    public function __construct(AdvPostRepository $advPostRepository, ProfileRepository $profileRepository)
    {
        parent::__construct();

        $this->advPostRepository = $advPostRepository;
        $this->profileRepository = $profileRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginator = $this->advPostRepository->getForIndexWithPaginate(20);

        return SuccessJsonResource::make($paginator);
    }

    public function categorySearch(Request $request)
    {
        $categoryId = $request->category;
        $paginator = $this->advPostRepository->getByCategoryForIndexWithPaginate(20, $categoryId);

        return SuccessJsonResource::make($paginator);
    }

    public function textSearch(Request $request)
    {
        $search = $request->search;
        $paginator = $this->advPostRepository->getBySearchForIndexWithPaginate(20, $search);

        return SuccessJsonResource::make($paginator);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
        $user = Auth::user();
        $image = $request->file('image')->store('image', 'public');
        $payload = $request->input();
        $payload['image'] = '/storage/'.$image;
        $result = app(CreatePostAction::class)($payload, $user->id);

        return SuccessJsonResource::make($result);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = $this->advPostRepository->getShow($id);

        return AdvPostShowJsonResource::make($item);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostUpdateRequest $request, string $id)
    {
        $user = Auth::user();
        $image = $request->file('image');
        if ($image) {
            $image = $image->store('image', 'public');
            $payload = $request->input();
            $payload['image'] = '/storage/'.$image;
            $result = app(UpdatePostAction::class)($payload, $id, $this->advPostRepository, $user->id);
        } else {
            $result = app(UpdatePostAction::class)($request->input(), $id, $this->advPostRepository, $user->id);
        }

        return SuccessJsonResource::make($result);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = AdvPost::destroy($id);
        return $result;
    }
}

<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Profile\ForceDeleteProfileAction;
use App\Http\Controllers\Profile\UpdateProfileAction;
use App\Http\Requests\ProfileRequest;
use App\Http\Resources\SuccessJsonResource;
use App\Repositories\AdvPostRepository;
use Illuminate\Support\Facades\Auth;

class ProfileController extends ApiBaseProfileController
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
        $user = Auth::user();

        return SuccessJsonResource::make($user);
    }

    public function posts()
    {
        $user = Auth::user();
        $paginator = $this->advPostRepository->getForProfileWithPaginate(20, $user->id);

        return SuccessJsonResource::make($paginator);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request)
    {
        $user = app(UpdateProfileAction::class)($request->input(), Auth::user());

        return SuccessJsonResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function forcedDelete()
    {
        $result = app(ForceDeleteProfileAction::class)(Auth::user());

        return SuccessJsonResource::make($result);
    }
}

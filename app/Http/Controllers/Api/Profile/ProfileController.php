<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Requests\ProfileRequest;
use App\Http\Resources\SuccessJsonResource;
use App\Models\User;
use App\Repositories\AdvPostRepository;
use App\Repositories\ProfileRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends ApiBaseProfileController
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
    public function index(Request $request)
    {
        $user = $this->profileRepository->getByApiKey($request->header('apikey'));

        return SuccessJsonResource::make($user);
    }

    public function posts(Request $request)
    {
        $user = $this->profileRepository->getByApiKey($request->header('apikey'));
        $paginator = $this->advPostRepository->getForProfileWithPaginate(20, $user->id);

        return SuccessJsonResource::make($paginator);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfileRequest $request)
    {
        $apiUser = $this->profileRepository->getByApiKey($request->header('apikey'));
        $user = app(UpdateProfileAction::class)($request->input(), $apiUser);

        return SuccessJsonResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function forcedDelete(Request $request)
    {
        $apiUser = $this->profileRepository->getByApiKey($request->header('apikey'));
        $result = app(ForceDeleteProfileAction::class)($apiUser);

        return SuccessJsonResource::make($result);
    }
}

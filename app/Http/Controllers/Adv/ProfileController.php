<?php

namespace App\Http\Controllers\Adv;

use App\Repositories\AdvPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends BaseController
{
    // TODO create user repository
    //private $advUserRepository;
    /**
     * @var AdvPostRepository
     */
    private $advPostRepository;

    public function __construct(AdvPostRepository $advPostRepository)
    {
        parent::__construct();

        $this->advPostRepository = $advPostRepository;

        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $paginator = $this->advPostRepository->getForProfileWithPaginate(20, $user->id);

        return view('adv.profile.index', compact('paginator'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // TODO make personal info show
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // TODO make personal info edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // TODO make personal info update
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // TODO make profile delete
    }
}

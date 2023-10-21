<?php

namespace App\Http\Controllers\Profile;

use App\Repositories\AdvPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends BaseController
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

        return view('profile.index', compact('user'));
    }

    public function posts()
    {
        $user = Auth::user();
        $paginator = $this->advPostRepository->getForProfileWithPaginate(20, $user->id);

        return view('profile.posts', compact('paginator'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user = Auth::user();

        return view('profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $userUpdateData = $request->input();
        $user->update($userUpdateData);


        if ($user) {
            return redirect()
                ->route('profile.edit')
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
    public function forcedDelete()
    {
        $user = Auth::user();

        $result = $user->forceDelete();
        if ($result) {
            return redirect()
                ->route('home')
                ->with(["success" => "Профиль удален"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}

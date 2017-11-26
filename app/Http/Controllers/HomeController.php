<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function updateAvatar(Request $request){

        $this->validate($request, [
            'avatar' => 'required|image'
        ]);

        $user = Auth::user();

        $file = $request->file('avatar');

        $fileName = $file->getClientOriginalName();

        $file->move(storage_path(), $fileName);

        $user->addMedia(storage_path() . '/' . $fileName)->toMediaCollection('avatars');

        return redirect()->route('auth.change_password');
    }
}

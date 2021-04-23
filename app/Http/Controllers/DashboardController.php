<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use App\Models\Post;
use App\Models\User;
// use DB;



class DashboardController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        // $user_id = auth()->user()->id;
        $user = User::find($user_id);
        
        return view('dashboard')->with('posts',$user->post); //from relationships
        // return view('/dashboard');
    }
    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class PagesController extends Controller
{
    public function index(){
        $title = "Welcome to laravelll";
        // return view('pages.index', compact('title'));
        return view('pages.index')->with('title',$title);

    }

    public function about(){
        $title = "About Us";
        // return view('pages.about', compact('title'));
        return view('pages.about')->with('title',$title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Development', 'SEO']
        );   
        
        // return view('pages.services');
        return view('pages.services')->with($data);
    }

    public function contact(){
        return view('pages.contact');
    }
    
    public function blog(){
        return view('pages.blog');
    }

    public function test(){
    
        return view('test');
    }
    
}
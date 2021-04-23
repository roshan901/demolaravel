<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except'=>['index','show']]);
    }
    


    public function index()
    {
        // $posts = Post::orderBy('title','asc')->take(2)->get(); //shows only two posts in asc order
        // $posts = Post::where('title','Post One')->get();
        // $postss = DB::select('SELECT * FROM posts');
        // $posts = DB::table('posts')->get();
        // foreach($postss as $post)
        //     var _dump($post->id);
        
        // @endforeach
        // $posts = Post::orderBy('updated_at','desc')->simplePaginate(2);
        $posts = Post::all();
        return view('test')->with('posts',$posts);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'title'=>'required',
        'body'=> 'required',
        'cover_image'=>'image|nullable|max:2000'
        ]);

            if($request->hasFile('cover_image')){
                $filenameFull = $request->file('cover_image')->getClientOriginalName();

                $filename = pathinfo($filenameFull,PATHINFO_FILENAME);

                $extension = $request->file('cover_image')->getClientOriginalExtension();

                $filenameToStore = $filename.'_'.time().'.'.$extension;
                // upload image
                $path = $request->file('cover_image')->storeAs('public/cover_image',$filenameToStore);

            } else {
                $filenameToStore = 'noimage.jpg';
            }
        
        // $user_id = Auth::user()->id;  //get auth id
        
            
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $filenameToStore;  
        $post->user_id = auth()->user()->id; //
        $post->save();

        return redirect('/dashboard')->with('success','Post Created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('posts',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //checks authorized user
        if(Auth::user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized page');
                
        }

        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->save();

        return redirect('/dashboard')->with('success','Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(Auth::user()->id !== $post->user_id){
            return redirect('/posts')->with('error','Unauthorized page');
                
        }
        if($post->cover_image != 'noimage.jpg'){
            Storage::delete('public/cover_image/'.$post->cover_image);
        }

        $post->delete();

        return redirect('/dashboard');
    }
}

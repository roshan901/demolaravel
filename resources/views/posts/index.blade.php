@extends('layouts.app') 

@section('content')



{{-- @if(count($posts)>1)
    @foreach($posts as $post)
        <h2>{{$post->title}}</h2>
    
    @endforeach
@else
<p>No POST found!!</p> 
    

@endif --}}
<div class="site-section">
    <div class="container">
        <h2 class="font-size-regular"><a href="#">Post</a></h2><br><br>
        
        @if(count($posts)>0)
        @foreach($posts as $post)
      <div class="row mb-3 align-items-stretch">
        
        
         <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
          <div class="h-entry">
            <img src="images/hero_bg_1.jpg" alt="Image" class="img-fluid">
            <h2 class="font-size-regular"><a href="{{url('/posts')}}/{{$post->id}}">{{$post->title}}</a></h2>
            <div class="meta mb-4">by {{$post->user->name}} <span class="mx-2">&bullet;</span> {{$post->created_at}}<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p> --}}
          </div> 
        </div> 
        
        
        {{-- <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
          <div class="h-entry">
            <img src="images/hero_bg_2.jpg" alt="Image" class="img-fluid">
            <h2 class="font-size-regular"><a href="#">{{$post->title}}</a></h2>
            <div class="meta mb-4">by Theresa Winston <span class="mx-2">&bullet;</span> {{$post->created_at}} <span class="mx-2">&bullet;</span> <a href="#">News</a></div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p>
          </div>
        </div> --}}
        
        
  
      </div>
      
      @endforeach
      @else
        <p>No posts to show</p>
      @endif
        
      <div class="row">
        <div class="col-12 text-center">
            <a>{{$posts->links()}}</a> 
            {{-- <a href="#" class="btn btn-outline-primary border-2 py-3 px-5">{{$posts->links()}}</a> --}}
            {{-- <a href="#" class="btn btn-outline-primary border-2 py-3 px-5">Hello</a> --}}

        </div>
      </div>
    </div>
    
  </div>
  
@endsection

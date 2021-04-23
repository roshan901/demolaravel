@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                    <br><br>
                    <p><a class="btn btn-primary btn-lg" href="{{url('category/create')}}" role="button">Add Category</a></p><br>
                    <p><a class="btn btn-primary btn-lg" href="{{url('destination')}}" role="button">Add Destination</a></p><br>

                    <p><a class="btn btn-primary btn-lg" href="{{url('services')}}" role="button">Create Post</a></p>
                    
                @if(count($posts)>0)
                @foreach($posts as $post)
            
                <div class="row mb-3 align-items-stretch">    
        
                    <div class="col-md-6 col-lg-6 mb-4 mb-lg-4">
                     <div class="h-entry">
                       <img src="storage/cover_image/{{$post->cover_image}}" alt="Image" class="img-fluid">
                       <h2 class="font-size-regular"><a href="{{url('/posts')}}/{{$post->id}}"> {{$post->title}}</a></h2>
                       <div class="meta mb-4">by {{$post->user->name}} <span class="mx-2">&bullet;</span> {{$post->created_at}}<span class="mx-2">&bullet;</span> <a href="#">News</a></div>
                        {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus eligendi nobis ea maiores sapiente veritatis reprehenderit suscipit quaerat rerum voluptatibus a eius.</p> --}}
                     </div> 
                   </div> 
                
                   <a href="{{url('/posts')}}/{{$post->id}}/edit" type="button">Edit</a>

             {!! Form::open(['action'=>['PostsController@destroy',$post->id],'method'=>'POST']) !!}

            {{Form::hidden('_method','DELETE')}}
            {{Form::submit('Delete',['class' =>'btn btn-danger','onclick'=>'confirm("Are you sure you want to delete ?")'])}}
            {!! Form::close() !!}
               
        
                </div>
                @endforeach
                @else 
                <p>No posts to show</p>
                @endif
                
                 </div>

            </div>
            <p>
        </div>
    </div>
</div>
@endsection

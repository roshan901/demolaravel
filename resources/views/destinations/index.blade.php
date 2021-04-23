@extends('layouts.app')

@section('content')


<div class="site-section">
    <div class="container">
        <h2 class="font-size-regular"><a href="#">Post</a></h2><br><br>
        
        @if(count($destinations)>0)
      <div class="row mb-3 align-items-stretch">
        
        
         <table border="1">
           <tr>
             <th>Name</th>
             <th>Price</th>
             <th>Duration</th>
             <th>Description</th>
             <th>Inclusion</th>
             <th>Exclusion</th>
             <th>Itinerary</th>
             <th>Category</th>
             <th>Action</th>
           </tr>
           @foreach($destinations as $dest)

           <tr>
             <td>{{$dest->name}}</td>
             <td>{{$dest->price}}</td>
             <td>{{$dest->duration}} days</td>
             <td>{!! $dest->description !!}</td>
             <td>{!! $dest->inclusion !!}</td>
             <td>{!!$dest->exclusion!!}</td>
             <td>{!!$dest->itinerary!!}</td>
            <td>
             @foreach($destc as $de)
             {{$de->category->id}}
             @endforeach
            </td>
             <td>
               <a href="{{url('/destination/edit')}}/{{$dest->id}}">Edit</a>
               <a>
               {!!Form::open(['action'=>['DestinationsController@delete',$dest->id],'method'=>'post']) !!}
               {{Form::hidden('_method','DELETE')}}
                {{Form::submit('Delete',['class'=>'btn btn-primary'])}}
                {!!Form::close() !!}
               </a>
             </td>
           </tr>
           @endforeach
          </table>
             
        
        @else
        <p>No Destinations to show</p>
        @endif
        <p>This is : {{$d}}</p>
     
  
      </div>

{{--       
      @foreach($destc->destination as $destcc)
             <td>{{$destcc->name}}</td>
             @endforeach
         --}}
      <div class="row">
        <div class="col-12 text-center">
            {{-- <a>{{$posts->links()}}</a>  --}}
            {{-- <a href="#" class="btn btn-outline-primary border-2 py-3 px-5">{{$posts->links()}}</a> --}}
            {{-- <a href="#" class="btn btn-outline-primary border-2 py-3 px-5">Hello</a> --}}

        </div>
      </div>
    </div>
    
  </div>
  
@endsection

@extends('layouts.app')

@section('content')

                <div class="site-section bg-light">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-7 mb-5">
              
                          
                            {!! Form::open(['action'=>'CategoryController@store','method'=>'POST']) !!}
                          {{-- <form action="#" class="p-5 bg-white"> --}}
                           
              
                            <div class="row form-group">
                              <div class="col-md-12">
                                {{Form::label('name','Add Category',['class'=>'text-black'])}}
                                {{Form::text('name','',['class'=>'form-control','placeholder'=>'Category name'])}}
                              </div>
                            </div>
              
                            {{-- <div class="row form-group">
                              
                              <div class="col-md-12">
                                {{Form::label('email','Email',['class'=>'text-black'])}}
                                {{Form::email('email','',['class'=>'form-control','placeholder'=>'Email'])}}
                              </div>
                            </div> --}}
              
                          
              
                            <div class="row form-group">
                              <div class="col-md-12">
                                {{-- <input type="submit" value="Send Message" class="btn btn-primary py-2 px-4 text-white"> --}}
                                {{Form::submit('Add',['class'=>'btn btn-success btn-lg'])}}
                              </div>
                            </div>
                            
              
                            {!! Form::close() !!}
                          {{-- </form> --}}

                          {{-- to display categories --}}
                          @if(count($cats)>0)
                          
                          <table border="2">
                            {{-- @foreach($cats as $cat) --}}
                              <tr>
                                  <th>Id No</th>
                                  <th>Category Name</th>
                                  <th>Action</th>
                              </tr>
                              
                              @foreach($cats as $cat)
                              <tr>
                                  <td>{{$cat->id}}</td>
                                  <td>{{$cat->name}}</td>
                                  <td>
                                      <a href="">Edit</a>
                                      
                                        {!!Form::open(['action'=>['CategoryController@destroy',$cat->id],'method'=>'post']) !!}
                                        {{Form::hidden('_method','DELETE')}}
                                        {{Form::submit('Delete',['class' =>'btn btn-danger']) }}
                                        {!!Form::close() !!}
                                  </td>
                                  
                              </tr>
                              @endforeach
                          </table>
                            
                          
                          @else
                          <p>No Category</p>
                          @endif


                        </div>
                        <div class="col-md-4">
                          <div class="p-4 mb-3 bg-white">
                            <p class="mb-0 font-weight-bold">Address</p>
                            <p class="mb-4">203 Fake St. Mountain View, San Francisco, California, USA</p>
              
                            <p class="mb-0 font-weight-bold">Phone</p>
                            <p class="mb-4"><a href="#">+1 232 3235 324</a></p>
              
                            <p class="mb-0 font-weight-bold">Email Address</p>
                            <p class="mb-0"><a href="#">youremail@domain.com</a></p>
              
                          </div>
                          
                          <div class="p-4 mb-3 bg-white">
                            <img src="images/hero_bg_1.jpg" alt="Image" class="img-fluid mb-4 rounded">
                            <h3 class="h5 text-black mb-3">More Info</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur? Fugiat quaerat eos qui, libero neque sed nulla.</p>
                            <p><a href="#" class="btn btn-primary px-4 py-2 text-white">Learn More</a></p>
                          </div>
              
                        </div>
                      </div>
                    </div>
                  </div>
        

                
@endSection
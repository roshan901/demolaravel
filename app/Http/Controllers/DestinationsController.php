<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;





class DestinationsController extends Controller
{
    public function index(){

        $dests = Destination::all();
        $cats = Category::find(1); 
        $des = Destination::find(3); 
        return view('destinations.index')->with('destinations',$dests)
        ->with('destc',$cats->destinations)
        ->with('d',$des->category);
        // ->with('destc',$cats->destination);
        // return view('destinations.create');
    }
    public function create(){

        $cats = Category::all();
        return view('destinations.create')->with('cats',$cats);
    }
    public function store(Request $request)
    {

           $this->validate($request,
            [
                'name'=>'required',
                'price'=>'required',
                'duration'=>'required', 
                'inclusion'=>'required',
                'exclusion'=>'required',
                'description'=>'required',
                'itinerary'=>'required',
                'cat_name'=>'required'
            ]);
            
            $dest = new Destination();
            $dest->name =$request->input('name');
            $dest->price =$request->input('price');
            $dest->duration =$request->input('duration');
            $dest->inclusion =$request->input('inclusion');
            $dest->exclusion =$request->input('exclusion');
            $dest->itinerary =$request->input('itinerary');
            $dest->description =$request->input('description');
            $dest->category_id = $request->input('cat_name');
            $dest->save();
            
             return redirect('/destination')->with('success','Destination added successfully');

    }
    public function show($id)
    {
        return "show";

    }
    public function edit($id)
    {
        $dest = Destination::find($id);
        return view('destinations.edit')->with('dest',$dest);
    }

    public function update(Request $request, $id){
        $this->validate($request,
        [
            'name'=>'required|max:255',
            'price'=>'required',
            'duration'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required',
            'description'=>'required',
            'itinerary'=>'required',
            
        ]);
        
        $dest = Destination::find($id);
        $dest->name =$request->input('name');
        $dest->price =$request->input('price');
        $dest->duration =$request->input('duration');
        $dest->inclusion =$request->input('inclusion');
        $dest->exclusion =$request->input('exclusion');
        $dest->itinerary =$request->input('itinerary');
        $dest->description =$request->input('description');
        // $dest->category_id =$request->input('cat_name');
        $dest->save();
// print_r($dest);

        
        return redirect('/destination');
      
    }
    public function delete($id){
        $dest = Destination::find($id);
        $dest->delete();
        return redirect('/destination');
    }

    public function any(){

        $dests = Destination::all();
        $cats = Category::all();
        
        return view('destinations.any')->with('cats',$cats)
        ->with('dest',$dests);
        // ->with('destc',$cats->destination);
        // return $cats->destinations;
        
    }
    
}

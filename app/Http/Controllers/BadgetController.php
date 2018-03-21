<?php

namespace App\Http\Controllers;

use App\Badget;
use Illuminate\Http\Request;

class BadgetController extends Controller
{
    

    public function index($id=null)
    {
       if($id == null){
            return Badget::orderBy('id','asc')->get();
        }else{
            return $this->show($id); 
        }
    }

    
    public function store(Request $request)
    {
        $badget = new Badget;
        $badget->description = $request->input('description');
        $badget->min_value = $request->input('min_value');
        $badget->urlfoto = $request->input('urlfoto');
        $badget->save();

        return 'Badget record created' .$badget->id;
    }

   
    public function show($id)
    {
        return Badget::find($id);
    }

  
    public function update(Request $request, $id)
    {
        $badget = Badget::find($id);
        $badget->description = $request->input('description');
        $badget->min_value = $request->input('min_value');
        $badget->urlfoto = $request->input('urlfoto');
        $badget->save();
        return 'Badget record updated' .$badget->id;
    }

  
    public function destroy($id)
    {
        $badget = Badget::find($id)->delete();
        return 'bagdet record deleted' .$badget->id;
    }
}

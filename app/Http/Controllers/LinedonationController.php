<?php

namespace App\Http\Controllers;

use App\Linedonation;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LinedonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
       if($id == null){
            return Linedonation::orderBy('id','asc')->get();
        }else{
            return $this->show($id); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $linedonation = new Linedonation;
        $linedonation->iddonation = $request->input('iddonation');
        $linedonation->idbasket = $request->input('idbasket');
        $linedonation->quantity = $request->input('quantity');
        $linedonation->value = $request->input('value');
        $linedonation->save();
        return 'Donation record created' .$linedonation->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Linedonation::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Linedonation $donation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $linedonation = Linedonation::find($id);
        // $donation->iduser = 1;
        // $donation->idbasket = $request->input('idbasket');
        // $donation->data = $request->input('data');
        $linedonation->idstatus = $request->input('status');;
        $linedonation->save();
        return 'Donation record updated' .$linedonation->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $linedonation = Linedonation::find($id)->delete();
        
    }

}

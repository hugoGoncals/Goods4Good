<?php

namespace App\Http\Controllers;

use App\Productsline;
use Illuminate\Http\Request;

class ProductslineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
       if($id == null){
            return Productsline::orderBy('id','asc')->get();
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
        $productsline = new Productsline;
        $productsline->totalline = $request->input('totalline');
        $productsline->idproduct = $request->input('idproduct');
        $productsline->quantity = $request->input('quantity');
        $productsline->idbasket = $request->input('idbasket');
        $productsline->save();
        return 'ProductLine record created' .$productsline->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Productsline::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
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
    public function update(Productsline $request, $id)
    {
        $productsline = Productsline::find($id);
        $productsline = new Productsline;
        $productsline->totalline = $request->input('totalline');
        $productsline->idproduct = $request->input('idproduct');
        $productsline->quantity = $request->input('quantity');
        $productsline->idbasket = $request->input('idbasket');
        $productsline->save();
        return 'productsline record updated' .$productsline->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productsline = Productsline::find($id)->delete();
        return 'productsline record deleted';
    }
}

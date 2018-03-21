<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Productsline;
use App\Productsbasket;
use Illuminate\Http\Request;

class ProductsbasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
       if($id == null){
            return Productsbasket::orderBy('id','asc')->get();
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
    
    public function listbasket($id=null){

        $list = DB::table('productsbaskets')
            ->join('productslines', 'productsbaskets.id', '=', 'productslines.idbasket')
            ->join('products', 'productslines.idproduct','=','products.id')
            ->join('providers', 'products.idprovider', '=','providers.id')
            ->select('productsbaskets.id','productsbaskets.name', 'products.description', 'products.quantity', 'productsbaskets.price')
            ->groupBy('productsbaskets.name', 'products.description', 'products.quantity', 'productsbaskets.price','productsbaskets.id')
            ->orderBy('productsbaskets.id')
            ->get();
            
        return $list;
    }


    public function listProdBasket($id=null){
        
                $list = DB::table('products')
                    ->join('productslines', 'products.id', '=', 'productslines.idproduct')
                    ->join('productsbaskets', 'productslines.idbasket','=','productsbaskets.id')
                    ->where('productsbaskets.id', '=', $id)
                    ->select('products.description', 'productslines.quantity', 'products.price') 
                    ->get();
                    
                return $list;
            }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productsbasket = new Productsbasket;
        $productsbasket->name = $request->input('name');
        $productsbasket->price = $request->input('price');
        $productsbasket->priority = $request->input('priority');
        $productsbasket->save();
        return $productsbasket->id;
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
    public function update(Productsbasket $request, $id)
    {
        $productsbasket = Productsbasket::find($id);
        $productsbasket->name = $request->input('name');
        $productsbasket->price = $request->input('price');
        $productsbasket->priority = $request->input('priority');
        $productsbasket->save();
        return 'productsbasket record updated' .$productsbasket->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productsbasket = Productsbasket::find($id)->delete();
        return 'productsbasket record deleted';
    }

    
}
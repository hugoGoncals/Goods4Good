<?php

namespace App\Http\Controllers;

use App\Donation;
use App\Productsbasket;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=null)
    {
       if($id == null){
            return Donation::orderBy('id','asc')->get();
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

         public function sumDonations($id=null){

        $sum = DB::table('donations')
        ->select(DB::raw('sum(totaldone) as sdon'))
        ->where('iduser', '=', $id)
        ->get();

        return $sum;
    }

    public function listDonationsMadeByUser($id=null){

      $list = DB::table('donations')
        ->join('statusdonations as sd', 'sd.id', '=', 'donations.idstatus')
        ->where('iduser','=', $id)
        ->select('donations.id','donations.data','donations.totaldone','sd.status')
        ->get();

        return $list;
}
    public function listDonations($id=null){

    $list = DB::table('donations')
        ->join('users as us', 'us.id', '=', 'donations.iduser')
        ->join('statusdonations as sd', 'sd.id', '=', 'donations.idstatus')
        ->select('donations.id','donations.data','donations.totaldone','sd.status','us.name')
        ->get();

        return $list;
}


    public function listDonationsMade($id=null){

        $list = DB::table('donations')
            ->join('productsbaskets as pb', 'pb.id', '=', 'donations.idbasket')
            ->select(DB::raw('count(*) as ndonations, pb.name as name'
                    ))
            ->where('idstatus', '=', 1)
            ->groupBy('name')
            ->get();

            return $list;
    }

    public function listBasket($id=null){

        $list = DB::table('productsbaskets')
            ->join('productslines', 'productsbaskets.id', '=', 'productslines.idbasket')
            ->join('products', 'productslines.idproduct','=','products.id')
            ->join('providers', 'products.idprovider', '=','providers.id')
            ->select('productsbaskets.id','productsbaskets.name', 'products.description', 'productsbaskets.price')
            ->groupBy('productsbaskets.name', 'products.description', 'productsbaskets.price','productsbaskets.id')
            ->orderBy('productsbaskets.id')
            ->get();
            
        return $list;
    }

    public function listDonationsDetails($id=null){

        $list = DB::table('donations')
            ->join('statusdonations as status', 'status.id', '=', 'donations.idstatus')
            ->join('users as donor', 'donor.id', '=', 'donations.iduser')
            ->join('linedonations as ld', 'ld.iddonation', '=', 'donations.id')
            ->join('productsbaskets as pb', 'pb.id', '=', 'ld.idbasket')
            ->join('productslines as pl', 'pl.idbasket', '=', 'pb.id')
            ->join('products', 'products.id', '=', 'pl.idproduct')
            ->join('providers', 'providers.id', '=', 'products.idprovider')
            ->select('donations.id','donations.data as DonationDate','pb.name as basketname','pb.price as price','donor.name','status.status')
            ->get();

        return $list;
    }

    public function listLines($id=null){

        $list = DB::table('donations')
            ->join('linedonations as ld', 'ld.iddonation', '=', 'donations.id')
            ->join('productsbaskets as bsk', 'bsk.id', '=', 'ld.idbasket')
            ->join('productslines', 'productslines.idbasket', '=', 'bsk.id')
            ->join('products', 'products.id', '=', 'productslines.idproduct')
            ->where('donations.id', '=', $id)
            ->select('donations.id','products.description as pd','productslines.quantity','productslines.totalline')
            ->groupBy('donations.id','products.description','productslines.quantity','productslines.totalline')
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
        $donation = new Donation;
        $donation->iduser = $request->input('iduser');
        $donation->idstatus = $request->input('idstatus');
        $donation->data = $request->input('data');
        $donation->totaldone = $request->input('totaldone');
        $donation->save();
        return $donation->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Donation::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function edit(Donation $donation)
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
        $donation = Donation::find($id);
        // $donation->iduser = 1;
        // $donation->idbasket = $request->input('idbasket');
        // $donation->data = $request->input('data');
        $donation->idstatus = 7;
        $donation->save();
        return $donation->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Donation  $donation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donation = Donation::find($id)->delete();
        
    }



    public function saveCar(Request $data)
    {
        if ( is_array( $data ) )
            $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
        else
            $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

        echo $output;
    }

}
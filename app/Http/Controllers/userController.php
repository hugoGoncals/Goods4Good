<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;


class userController extends Controller
{

	public function editUser(Request $request){
		$gender = $request->input( 'gender' );
        $age = $request->input( 'age' );
        $location = $request->input( 'location' );
        $id = $request->input('id');

        DB::table('users')
            ->where('id', $id)
            ->update(['gender'=>$gender,'age' => $age,'location'=>$location]); 
	}

}

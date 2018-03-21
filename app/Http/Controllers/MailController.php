<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

// we will use Mail namespace
use Mail;

class MailController extends Controller
{
    // first, we create function for send Basics email
    public function basic_email(Request $request){
        $nome = $request->nome;
        $email = $request->mail;
        $assunto = $request->assunto;
        $mensagem = $request->mensagem;

        $data=['name'=>$nome, 'mensagem'=>$mensagem, 'mail'=>$email];
        Mail::send(['text'=>'mail'], $data, function($message) use($assunto, $nome){
            $message->to('hugo._filipe_goncalves@outlook.pt')->subject($assunto);
            $message->from('hugofcoutinho@gmail.com', $nome);
        });

       // return view('\index');
        return redirect()->action('MailController@index');
    }

    public function register(Request $request){
        

       $pass=$request->input('pass');
       $mail = $request->input('email'); 
       $nome=$request->input('name');
       $assunto = "Account Creation";
       $mensagem=$pass;
       $email=$mail;

       $data=['nomeUser'=>$nome, 'correio'=>$email, 'pass'=>$mensagem];
       Mail::send(['text'=>'mailRegister'], $data, function($message) use($assunto, $nome, $email){
           $message->to($email)->subject($assunto);
           $message->from('hugofcoutinho@gmail.com', $nome);
       });

       // return view('\index');
        return redirect()->action('MailController@index');
    }

    public function index()
    {
                return view('index');
            
    }

}
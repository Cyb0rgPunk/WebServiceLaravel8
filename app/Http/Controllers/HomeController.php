<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    //
    public function __invoke(){

        $datos = Http::get('https://jsonplaceholder.typicode.com/todos/1');
        $datosJson = $datos->json();
        
        return view('welcome', compact('datosJson'));
    }

    public function create(){

        return view('create');

    }
    
    public function save(Request $request){

        $request->validate([
            'userId'=>'required',
            'title'=>'required',
            'completed'=>'required'
        ]);

        $url = 'https://jsonplaceholder.typicode.com/todos'; 

        $response = Http::post($url,
        [
            "userId" => $request->userId,
            "title" => $request->title,
            "completed" => $request->completed
        ]);

        $datosJson = $response->json(); 
        
        return view('welcome', compact('datosJson'));


    }


    public function edit($datosJson){
        
        $url = 'https://jsonplaceholder.typicode.com/todos/'.$datosJson;         
        $datos = Http::get($url);
        $datosJson = $datos->json();
        return view('edit', compact('datosJson'));
        
    }

    public function update($datosJson, Request $request){
        
        $request->validate([
            'userId'=>'required',
            'title'=>'required',
            'completed'=>'required'
        ]);
        
        $url = 'https://jsonplaceholder.typicode.com/todos/'.$datosJson; 

        $response = Http::put($url,
        [
            "userId" => $request->userId,
            "title" => $request->title,
            "completed" => $request->completed

        ]);
        
        $datosJson = $response->json(); 
        
        return view('welcome', compact('datosJson'));

    }

    public function delete($datosJson){        
        $url = 'https://jsonplaceholder.typicode.com/todos/'.$datosJson; 
        
        $response = Http::delete($url);
        
        $datosJson = $response->status();
        
        if($datosJson == 200){
            return view('delete');
        }       

    }
    
}

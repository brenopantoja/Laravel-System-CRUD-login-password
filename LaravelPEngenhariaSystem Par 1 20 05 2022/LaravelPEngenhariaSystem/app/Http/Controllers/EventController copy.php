<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //
     //
     public function index(){
        $nome = "Breno";
        $idade = 36;
        $vetor =  [1,2,3,5,6];
        $nomes = ["Ramos", "Sousa", "Maria"];
    
        return view(
            'welcome', ['nome' => $nome, 
            'idade' => $idade, 
            'profissao' => "Engenheiro",
            'vetor' =>$vetor,
            'nomes'=> $nomes
        ]);
    
        

}
        public function create(){
            return view ('/events.create');

        }

        public function delete(){
            return view ('/events.delete');

        }

        public function update(){
            return view ('/events.update');

        }
        public function show(){
            return view ('/events.show');

        }

}

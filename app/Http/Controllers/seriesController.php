<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Serie;

class seriesController extends controller {

    public function index(Request $request){
        $series = Serie::query()->orderBy('nome')->get();
        
        $mensagem = $request -> session() -> get('mensagem');
        $request -> session() -> remove('mensagem');
        return view('series.index', compact('series', 'mensagem'));
    }

    public function create(){
        return view('series.create');
    }

    public function store(Request $request)
    {
        $request -> validate([ 
            'nome' => 'required|min:2',
        ]);

        $serie = Serie::create($request -> all()); 
        $request -> session() -> flash('mensagem', "Série criada com sucesso!");

        return redirect('/series');
    }

    public function destroy(Request $request){
        Serie::destroy($request ->id);
        $request -> session() -> flash('mensagem', "Série removida com sucesso!");
        return redirect('/series');
    }
};


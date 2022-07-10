<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::all();

        return view('produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produtos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate ([  
            'titulo' => ['required','alpha', 'distinct', 'unique:produtos', 'min:1', 'max:150'], 
            'descricao' => ['required', 'alpha_dash', 'min:0', 'max:150'],
            'quantidade' => ['required', 'integer', 'numeric'],
            'valor' => ['required', 'numeric'],
        ]);
        
        $produto = new Produto($validatedData);
        $produto->save();

        return redirect('produtos')->with('sucesso');
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        return view('produtos.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {

        $validatedData = $request->validate ([  
            'titulo' => ['required', 'alpha', 'distinct', Rule::unique('produtos')->ignore($produto), 'min:1', 'max:150'], 
            'descricao' => ['required', 'alpha_dash', 'min:0', 'max:150'],
            'quantidade' => ['required', 'integer', 'numeric'],
            'valor' => ['required', 'numeric'],
        ]);

        if($produto->id === Auth::id()){
            $produto->update($request->all());
            return redirect()->route('produtos.index')->with('successo', 'Produto adicionado com sucesso!');
            }else{
            return redirect()->route('produtos.index')
                    ->with('erraaaado')
                    ->withInput();
            }
        
        

       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();

        return redirect()->route('produtos.index');
    }
}

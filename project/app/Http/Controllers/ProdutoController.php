<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

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
            'titulo' => ['required','alpha', 'distinct', 'unique:produtos', 'min:0', 'max:150'], 
            'descricao' => ['required', 'alpha_dash', 'min:0', 'max:150'],
            'quantidade' => ['required', 'integer', 'numeric'],
            'valor' => ['required', 'numeric'],
            'image' => ['mimes:jpeg,png' , 'dimensions:min_width=200,min_height=200'],
        ]);
        
        $produto = new Produto($validatedData);
        $produto->user_id = Auth::id();
        $produto->save();

        if ($request->hasFile('image') and $request->file('image')->isValid()){

            $extension = $request->image->extension();
            $image_name = now()-> toDateTimeString()."_".substr(base64_encode(sha1(mt_rand())), 0, 10);
    
            $path = $request->image->storeAs('produtos', $image_name.".".$extension, 'public');
    
            $image = new Image();
            $image->produto_id = $produto->id;
            $image->path = $path;
            $image->save();
    
        }    

        return redirect('produtos')->with('success', 'Produto adicionado com sucesso!');
        
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

        //$produto->update($request->all());

        //return redirect()->route('produtos.index');

        $validatedData = $request->validate ([  
            'titulo' => ['required', 'min:0', 'max:150'], 
            'descricao' => ['required', 'min:0', 'max:150'],
            'quantidade' => ['required'],
            'valor' => ['required'],
        ]);

        if($produto->user_id === Auth::id()){
            $produto->update($request->all());

            if ($request->hasFile('image') and $request->file('image')->isValid()) {
                //Storage::disk('public')->delete($image->path);
                $produto->image->delete();

                $extension = $request->image->extension();
                $image_name = now()->toDateTimeString()."_".substr(base64_encode(sha1(mt_rand())), 0, 10);
                
                $path = $request->image->storeAs('produtos', $image_name.".".$extension, 'public');
                 
                $image =  new Image();
                $image->produto_id = $produto->id;
                $image->path = $path;
                $image->save();

            }
            
            return redirect()->route('produtos.index')->with('success', 'Produto editado com sucesso!');
            
        }else{
            
            return redirect()->route('produtos.index')
                    ->with('error')
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
        $path = $produto->image->path;

        $produto->delete();

        Storage::disk('public')->delete($path);

        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso!');;
    }
}

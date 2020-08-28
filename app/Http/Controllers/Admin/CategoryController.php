<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    
    private $category;
    
    public function __construct(Category $category) {
        $this->category = $category;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd($categories);
        $categories = $this->category->paginate(15);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        try
        {
            $cat = $this->category->create($data);
            flash('CAtegoria criada com sucesso!')->success();
            return redirect()->route('categories.index');
            
        } catch (Exception $ex) {
            $message = 'Erro ao criar categoria.';
            
            if(env('APP_DEBUG')){
                $message = $ex->getMessage();
                
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit')->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update( Category $category, Request $request)
    {
        $data = $request->all();
        try
        {
            $cat = $category->update($data);
            flash('Categoria atualizada com sucesso!')->success();
            return redirect()->route('categories.index');
            
        } catch (Exception $ex) {
            $message = 'Erro ao atualizar categoria.';
            
            if(env('APP_DEBUG')){
                $message = $ex->getMessage();
                
            }
            flash($message)->warning();
            return redirect()->back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        
        try
        {
            $cat = $category->delete();
            flash('Categoria removida com sucesso!')->success();
            return redirect()->route('categories.index');
            
        } catch (Exception $ex) {
            $message = 'Erro ao deletar categoria.';
            
            if(env('APP_DEBUG')){
                $message = $ex->getMessage();
                
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }
}

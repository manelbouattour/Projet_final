<?php

namespace App\Http\Controllers;

use App\Models\Scategorie;
use Illuminate\Http\Request;

class ScategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
        $scategorie = Scategorie::with("categorie")->get(); //"categorie"  :nom de la relation li fi model (public function categorie)
        return response()->json($scategorie);
    }catch(\Exception $e){
        return response()->json($e->getMessage());
    }
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try{
            $scategorie=new Scategorie([
                "namescategorie"=> $request->input("namescategorie"),
                "imagescategorie"=> $request->input("imagescategorie"),
                "categorieID"=> $request->input("categorieID"),
            ]);
            $scategorie->save();
            return response()->json($scategorie);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        try{
            $scategorie = Scategorie::with("categorie")->findOrFail($id);
            return response()->json($scategorie);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        //
        try{
            $scategorie = Scategorie::findOrFail($id);
            $scategorie->update($request->all());
            return response()->json($scategorie);
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try{
            $scategorie = Scategorie::findOrFail($id);
            $scategorie->delete();
            return response()->json("Sous categorie supprimée avec succèes !" );
        }catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FoodCategory;
use App\Models\Food;
use DB;
use Validator;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = FoodCategory::all()->toArray();
        return (array)$foods;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function sreach(Request $request)
    {
        // $keyword = 'burger';
        $keyword = $request->input('keyword');
        $foodsearch = DB::table('food')
        ->select('food.*')
        ->where('FoodName', 'like', '%' . $keyword . '%')
        ->get()
        ->toArray();
        return (array)$foodsearch;
        // return response()->json($foods);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $Food = new Food([
            'FoodName'=>$request->input('FoodName'),
            'FoodPrice'=>$request->input('FoodPrice'),
            'FoodImage'=>$request->input('FoodImage'),
            'FoodCategory'=>$request->input('FoodCategory'),
        ]);
        $Food->save();

        return response()->json('The Foods successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $fooddetail = Food::all()->where('FoodCategory', '=', $id)->toArray();
        $fooddetail = DB::table('food')
        ->leftjoin('food_categories', 'food_categories.id', '=', 'food.FoodCategory')
        ->select('food_categories.FoodName as FoodCategoryName', 'Food.*')
        ->where('food_categories.id','=',$id)
        ->get()
        ->toArray();
        return (array)$fooddetail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return response()->json($food);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Food = Food::find($id);
        $Food->update($request->all());
        return response()->json('The Food successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $Food = Food::find($id);
        $Food->delete();
 
        return response()->json('The Food successfully deleted');
    }
}

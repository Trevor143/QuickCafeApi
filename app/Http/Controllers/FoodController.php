<?php

namespace App\Http\Controllers;

use App\Food;
use App\Http\Resources\FoodResource;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    //
    public function allFoods(){
        $foods = Food::all();

//        return $foods;
        return FoodResource::collection($foods);

    }

    public function breakfastFood(){
        $breakfast = Food::all()->where('foodType','=','Breakfast');

//        return $breakfast;
        return FoodResource::collection($breakfast);

    }

    public function lunchFood(){
        $lunch = Food::all()->where('foodType','=', 'Lunch');

//        return $lunch;
        return FoodResource::collection($lunch);

    }

    public function dinnerFood(){
        $dinner = Food::all()->where('foodType','=', 'Dinner');

//        return $dinner;
        return FoodResource::collection($dinner);

    }

    public function snackFood()
    {
        $snack = Food::all()->where('foodType', '=', 'Snack');

//        return $snack;
        return FoodResource::collection($snack);

    }
}

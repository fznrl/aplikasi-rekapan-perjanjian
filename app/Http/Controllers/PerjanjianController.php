<?php

namespace App\Http\Controllers;

use App\Models\Perjanjian;
use App\Models\Category;

class PerjanjianController extends Controller
{
    public function index() {
        return view('dashboard', [
            "title" => "Rekapan Perjanjian",
            "perjanjians" => Perjanjian::latest()->get()
        ]);
    }

    public function getPerjanjian(Category $category){
        // dd($category);
        $perjanjian = Perjanjian::where("category_id", $category->id)->get();
        $data =  [
            "title" => $category->name,
            "perjanjians" => $perjanjian
        ];
        return view('perjanjian', $data);
    }

    public function create(){

    }

    public function store(){

    }

    public funtion show(){

    }

    public funtion edit(){

    }


    public function update(){

    }

    public function destroy(){

    }
    
}

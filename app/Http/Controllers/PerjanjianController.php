<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Perjanjian;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
        return view('perjanjian.tambah', [
            'categories' => Category::all(),
            'perjanjians' => Perjanjian::all()
        ]);
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'category_id' => 'required',
            'uraian' => 'required',
            'no_pks' => 'required',
            'mulai' => 'required',
            'berakhir' => 'required',
            'wilayah' => 'required',
            'kegiatan' => 'required',
            'keterangan' => 'required',
        ]);

        Perjanjian::create($validateData);

        return redirect('/')->with('success', 'Data Berhasil Ditambahkan!');

    }

    public function show(){

    }

    public function edit(){

    }


    public function update(){

    }

    public function destroy(Perjanjian $perjanjian){

        // $perjanjian = Perjanjian::find($id);
        Perjanjian::destroy($perjanjian->id);
        
        return redirect('/')->with('success', 'Data Berhasil Dihapus!');

    }
    
}

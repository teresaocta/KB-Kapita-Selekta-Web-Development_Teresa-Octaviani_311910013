<?php

namespace App\Http\Controllers;

use App\Models\buku;                    //menghubungkan dengan Modal buku
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;      //untuk menjalankan method querynya

class bukuController extends Controller
{
    public function getHome()
    {
        return view('home', [
            "title" => "Home"
        ]);
    }

    public function getTitle()
    {
        $sql = buku::select('Judul', 'Stok', 'Harga')->get();

        foreach($sql as $index => $item)
        {
            $result[++$index] = [$item->Judul, $item->Stok, $item->Harga];
        }
        
        return view('title', [
            "title" => "Title"
        ])->with('data', json_encode($result));
    }

    public function getCategory()
    {
        $sql = buku::select('Kategori', DB::raw('count(Judul) as Jumlah'))->groupBy('Kategori')->get();

        foreach($sql as $index => $item)
        {
            $result[++$index] = [$item->Kategori, $item->Jumlah];
        }
        
        return view('category', [
            "title" => "Category"
        ])->with('data', json_encode($result));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Test',
            'description' => 'ini Deskripsi blbab albalb bablabl'
        ];
        return view('home',$data);
    }
}

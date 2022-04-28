<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Repository;

class PageController extends Controller
{
    /***********************
     * Método para el home *
     ***********************/
    public function home()
    {
        // $repositories = Repository::latest()->get();
        return view('welcome', ['repositories'=>Repository::latest()->get()]);
    }
}
<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\Kelas;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class KelasController extends Controller
{
     /**
     * index
     *
     * @return View
     */
    public function index(): View
    {
        //get posts
        $kelas = Kelas::latest()->paginate(5);

        //render view with posts
        return view('admin.kelas.index', compact('kelas'));
    }
}

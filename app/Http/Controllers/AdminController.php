<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artigo;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaMigalhas  =   json_encode([
            ["titulo" => "Admin", "url" => ""]

        ]);
        $countUser      = User::count();
        $countArtigo    = Artigo::count();
        $countAutores   = User::where('autor','=','S')->count();
        $countAdmin     = User::where('admin','=','S')->count();

        return view('admin', compact('listaMigalhas','countUser','countArtigo','countAutores','countAdmin' ));
    }
}

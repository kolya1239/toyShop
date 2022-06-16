<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Toy;
use App\Models\Type;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $toys = Toy::select('id', 'name', 'image')->get();
        $materials = Material::select('id', 'name', 'image')->get();
        $types = Type::select('id', 'name', 'image')->get();
        return view('panel')->with('toys', $toys)->with("materials", $materials)->with('types', $types);
    }
}

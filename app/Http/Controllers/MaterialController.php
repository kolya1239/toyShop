<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialPostRequest;
use App\Models\Material;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class MaterialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['show', 'index']]);
    }
    
    public function index()
    {
        return abort(404);
    }


    public function create()
    {
        return view('material.create');
    }

    public function store(MaterialPostRequest $request)
    {
        $material = Material::make($request->except('image'));
        $material->image = Cloudinary::upload($request->file('image')->getRealPath())->getPublicId();
        $material->save();
        return redirect()->back();
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        $toys = $material->toys()->paginate(8);
        return view('material.show')->with('material', $material)->with('toys', $toys);
    }

    public function edit($id)
    {
        $material = Material::findOrFail($id);
        return view('material.edit')->with('material', $material);
    }

    public function update(MaterialPostRequest $request, $id)
    {
        $material = Material::findOrFail($id);
        $material->update($request->except('image'));
        if (!is_null($request->file('image'))) {
            Cloudinary::destroy($material->image);
            $material->image = Cloudinary::upload($request->file('image')->getRealPath())->getPublicId();
        }
        $material->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Cloudinary::destroy(Material::findOrFail($id)->image);
        Material::destroy($id);
        return redirect()->back();
    }
}

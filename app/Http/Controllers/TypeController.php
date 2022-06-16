<?php

namespace App\Http\Controllers;

use App\Http\Requests\TypePostRequest;
use App\Models\Type;
use Illuminate\Http\Request;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class TypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return abort(404);
    }

    public function create()
    {
        return view('type.create');
    }

    public function store(TypePostRequest $request)
    {
        $type = Type::make($request->except('image'));
        $type->image = Cloudinary::upload($request->file('image')->getRealPath())->getPublicId();
        $type->save();
        return redirect()->back();
    }

    public function show($id)
    {
        return abort(404);
    }

    public function edit($id)
    {
        $type = Type::findOrFail($id);
        return view('type.edit')->with('type', $type);
    }

    public function update(TypePostRequest $request, $id)
    {
        $type = Type::findOrFail($id);
        $type->update($request->except('image'));
        if (!is_null($request->file('image'))) {
            Cloudinary::destroy($type->image);
            $type->image = Cloudinary::upload($request->file('image')->getRealPath())->getPublicId();
        }
        $type->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        Cloudinary::destroy(Type::findOrFail($id)->image);
        Type::destroy($id);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ToyPostRequest;
use App\Models\Material;
use App\Models\Toy;
use App\Models\Type;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ToyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'cartAdd', 'cartRemove']]);
    }

    public function index(Request $request)
    {
        $type = Type::findOrFail($request->id);
        $toys = $type->toys()->paginate(8);
        return view('toy.index')->with('toys', $toys);
    }

    public function create()
    {
        return view('toy.create')->with('types', Type::all())->with('materials', Material::all());
    }

    public function store(ToyPostRequest $request)
    {
        DB::beginTransaction();
        try {
            $toy = Toy::create($request->except('material_id'));
            $materials = $request->input('material_id');
            if (is_null($materials)) {
                throw new \Exception();
            }
            $toy->image = Cloudinary::upload($request->file('image')->getRealPath())->getPublicId();
            $toy->materials()->attach($materials);
            $toy->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->back();
    }

    public function show($id)
    {
        $toy = Toy::find($id);
        return view('toy.show')->with('toy', $toy);
    }

    public function edit($id)
    {
        $toy = Toy::find($id);
        return view('toy.edit')->with('toy', $toy)->with('types', Type::all())->with('materials', Material::all());
    }

    public function update(ToyPostRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $toy = Toy::where('id', $id)->firstOrFail();
            $toy->update($request->except('material_id'));
            $materials = $request->input('material_id');
            if (is_null($materials)) {
                throw new \Exception();
            }
            if (!is_null($request->file('image'))) {
                Cloudinary::destroy(Toy::find($id)->image);
                $toy->image = Cloudinary::upload($request->file('image')->getRealPath())->getPublicId();
            }
            $toy->materials()->attach($materials);
            $toy->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->back();
    }

    public function destroy($id)
    {
        Cloudinary::destroy(Toy::findOrFail($id)->image);
        Toy::destroy($id);
        return redirect()->back();
    }

    public function cartAdd($id)
    {
        $toy = Toy::find($id);
        Cart::add($toy, 1, ['size' => 'large']);
        return redirect()->back();
    }

    public function cartRemove($rowId)
    {
        $toyQty = Cart::get($rowId)->qty;
        if ($toyQty == 1) {
            Cart::remove($rowId);
        } else {
            Cart::update($rowId, --$toyQty);
        }
        return redirect()->back();
    }
}

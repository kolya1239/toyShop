<?php

namespace App\Http\Controllers;

use App\Models\Toy;
use App\Models\Type;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $toys = Toy::paginate(16);
        return view('index')->with('types', $types)->with('toys', $toys);
    }

    public function search(Request $request)
    {
        $types = Type::all();
        $requestedValue = '%' . $request->input('search') . '%';
        $toys = Toy::orWhere('name', 'like', $requestedValue)
            ->orWhere('description', 'like', $requestedValue)
            ->orWhereHas('materials', function (Builder $builder) use ($request) {
                $builder->where('name', 'like', '%' . $request->input('search') . '%');
            })
            ->paginate(16);
        return view('index')->with('types', $types)->with('toys', $toys);
    }

    public function contactGet()
    {
        return view('contact');
    }

    public function contactSend()
    {
        return redirect()->route('index');
    }

    public function about()
    {
        return view('about');
    }

    public function getCart()
    {
        $toyIdArray = [];
        foreach (Cart::content() as $toy) {
            $toyIdArray[] = $toy->id;
        }
        $images = Toy::whereIn('id', $toyIdArray)->pluck('image');
        return view('cart')->with('toys', Cart::content())->with('images', $images);
    }

    public function buyCart()
    {
        Cart::destroy();
        return redirect()->route('index');
    }
}

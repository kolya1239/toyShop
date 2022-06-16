@extends('layouts/main')
@section('content')
    <div class="row justify-content-center col-md-12 m-0">
        <h1 class="display-6 text-center">Корзина</h1>
        @if(Cart::initial() != 0)
            <h4 class="h4 price mb-2 text-center">Итого: {{ Cart::initial() }}₽</h4>
            <a class="btn btn-primary col-md-1" id="cart-buy" href="{{ route('buyCart') }}" role="button">Купить</a>
        @endif
        <?php $counter = 0; ?>
        @foreach ($toys as $toy)
            <div class="col-md-12 mt-4 justify-content-center row">
                <div class="col-md-3">
                    <img src="{{ Cloudinary::getUrl($images[$counter]); }}" class="img-fluid" alt="...">
                </div>
                <div class="col-md-3">
                    <a href="{{ route('toys.show', $toy->id) }}" class="h2 name mt-1 w-auto cart-name">{{ mb_strlen($toy->name) > 50 ? mb_substr($toy->name, 0, 50)."..." : $toy->name; }}</a>
                </div>
                <div class="col-md-3">
                    <h5 class="h5 price mb-0">Цена: {{ $toy->price * $toy->qty }}₽</h5>
                    <p class="h5">Количество товара: {{ $toy->qty }}</p>
                    <a class="btn btn-primary" href="{{ route('toys.cart.remove', $toy->rowId) }}" role="button">Убрать элемент из корзины.</a>
                </div>
            </div>
            <?php $counter++; ?>
        @endforeach
    </div>
@endsection

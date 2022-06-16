@extends('layouts/main')
@section('content')
    <div class="row col-md-12 m-0">
        @foreach ($toys as $toy)
            <div class="col-md-3 mb-2">
                <a href="{{ route('toys.show', $toy->id) }}" class="toy">
                    <img src="{{ Cloudinary::getUrl($toy->image); }}"
                        class="img-fluid toy__image" alt="...">
                    <div class="toy__content ps-2 pe-2 pt-2">
                        <p class="h6 toy__price price mb-0">{{ $toy->price }}₽</p>
                        <p class="h4 toy__name name mt-1">{{ mb_strlen($toy->name) > 50 ? mb_substr($toy->name, 0, 50)."..." : $toy->name; }}</p>
                        <a class="btn btn-primary" href="{{ route('toys.cart.add', $toy->id) }}" role="button">Добавить в корзину</a>
                    </div>
                </a>
            </div>
        @endforeach
        <div class="col-md-12 row justify-content-center pagination-block mt-2">
            {{ $toys->withQueryString()->links() }}
        </div>
    </div>
@endsection

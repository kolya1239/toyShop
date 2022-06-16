@extends('layouts/main')
@section('content')
    <div class="row col-md-12 m-0">
        <div class="col-md-12 h-100 align-items-center text-center row">
            <div class="col-md-6">
                <img src="{{ Cloudinary::getUrl($toy->image); }}" class="img-fluid" alt="...">
            </div>
            <div class="col-md-6 text-start">
                <h2 class="h2 name mt-1 w-auto material-name">{{ $toy->name }}</h2>
                <h5 class="h5 price mb-0">{{ $toy->price }}₽</h5>
                <p>Тип игрушки: {{ $toy->type->name }}</p>
                <p>Материалы:
                    @foreach ($toy->materials as $material)
                        <a href="{{ route('materials.show', $material->id) }}"
                            class="material-link">{{ $material->name }}{{ !$loop->last ? ',' : '' }}</a>
                    @endforeach
                </p>
                <p>{{ $toy->description }}</p>
                <a class="btn btn-primary" href="{{ route('toys.cart.add', $toy->id) }}" role="button">Добавить в корзину</a>
            </div>
        </div>
    </div>
@endsection

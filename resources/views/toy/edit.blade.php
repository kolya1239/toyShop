@extends('layouts/main')
@section('content')
    <div class="row col-md-12 m-0">
        <form action="{{ route('toys.update', $toy->id) }}" method="post" class="col-md-4 offset-md-4" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" required maxlength="300" minlength="10" value="{{ $toy->name }}">
                <label for="price" class="form-label">Цена в ₽</label>
                <input type="number" class="form-control" id="price" name="price" required value="{{ $toy->price }}">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ $toy->image }}">
                <label for="type_id" class="form-label">Тип игрушки</label>
                <select class="form-select" aria-label="Floating label select example" name="type_id" required>
                    @foreach($types as $type)
                        <option value="{{$type->id}}" {{ $type->id === $toy->type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
                <label for="material_id" class="form-label">Материал игрушки</label>
                <select class="form-select" multiple name="material_id[]" required>
                    @foreach($materials as $material)
                        <option value="{{$material->id}}" {{ $toy->materials->contains($material->id) ? 'selected' : '' }}>{{ $material->name }}</option>
                    @endforeach
                </select>
                <textarea class="form-control mt-4" maxlength="2000" minlength="10" placeholder="Описание игрушки"
                          style="height: 200px" name="description" required>{{ $toy->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection

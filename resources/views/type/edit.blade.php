@extends('layouts/main')
@section('content')
    <div class="row col-md-12 m-0">
        <form action="{{ route('types.update', $type->id) }}" method="post" class="col-md-4 offset-md-4" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $type->name }}" required maxlength="300" minlength="10">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control" id="image" name="image" value="{{ $type->image }}">
            </div>
            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>
    </div>
@endsection

@extends('layouts/main')
@section('content')
    <div class="row col-md-12 m-0">
        <form action="{{ route('materials.store') }}" method="post" class="col-md-4 offset-md-4" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Название</label>
                <input type="text" class="form-control" id="name" name="name" required maxlength="300" minlength="10">
                <label for="image" class="form-label">Изображение</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
@endsection

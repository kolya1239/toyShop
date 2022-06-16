@extends('layouts/main')
@section('content')
    <div class="row col-md-12 m-0">
        <h2 class="h2 text-center">Связь с нами</h2>
        <form class="col-md-4 offset-md-4 contact" action="{{ route('contactSend') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" required>
                <textarea class="form-control mt-4" maxlength="2000" minlength="100" placeholder="Оставьте ваше сообщение здесь" style="height: 200px" required></textarea>
                <div id="emailHelp" class="form-text">Ваш email адрес не будет предоставлен третьим лицам.</div>
            </div>
            <button type="submit" class="btn btn-primary contact__send">Отправить</button>
        </form>
    </div>
@endsection

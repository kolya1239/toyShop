@extends('layouts/main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите свой email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Ссылка для подтверждения была отправлена на ваш email адрес.') }}
                        </div>
                    @endif

                    {{ __('Если ссылка не была получена') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Нажмите для получения новой ссылки') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

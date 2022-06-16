@extends('layouts/main')

@section('content')
    <div class="row justify-content-center col-md-12 m-0">
        <div class="col-md-12">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="Toy-tab" data-bs-toggle="tab" data-bs-target="#Toy-tab-pane" type="button" role="tab"
                                aria-controls="Toy-tab-pane" aria-selected="true">Игрушки</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Material-tab" data-bs-toggle="tab" data-bs-target="#Material-tab-pane" type="button"
                                role="tab" aria-controls="Material-tab-pane" aria-selected="false">Материалы</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="Type-tab" data-bs-toggle="tab" data-bs-target="#Type-tab-pane" type="button" role="tab"
                                aria-controls="Type-tab-pane" aria-selected="false">Типы игрушек</button>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="myTabContent">
                        @include('panel/toyBlock')
                        @include('panel/materialBlock')
                        @include('panel/typeBlock')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

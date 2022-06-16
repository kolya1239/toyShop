<div class="tab-pane fade" id="Type-tab-pane" role="tabpanel" aria-labelledby="Type-tab" tabindex="0">
    <img src="../image/types.jpg" class="w-50" alt="...">
    <div class="panel-content text-center d-flex flex-column align-items-center justify-content-center">
        <select class="form-select w-25 mt-3 panel__type-select">
            @foreach ($types as $type)
                <option value="{{ $type->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>
        <div class="w-50 mt-3 mb-3 d-flex justify-content-around">
            <a class="btn btn-primary" href="{{ route('types.create') }}" role="button">Создать</a>
            @if(count($types) > 0)
                <a class="btn btn-primary panel__type-edit" href="{{ route('types.edit', $types->first()->id) }}" role="button">Изменить</a>
                <form class="panel__type-delete" action="{{ route('types.destroy', $types->first()->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary" type="submit">Удалить</button>
                </form>
            @endif
        </div>
    </div>
</div>
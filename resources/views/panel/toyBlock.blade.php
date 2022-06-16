<div class="tab-pane fade show active text-center panel" id="Toy-tab-pane" role="tabpanel" aria-labelledby="Toy-tab" tabindex="0">
    <img src="../image/toys.jpg" class="w-50" alt="...">
    <div class="panel-content text-center d-flex flex-column align-items-center justify-content-center">
        <select class="form-select w-25 mt-3 panel__toy-select">
            @foreach ($toys as $toy)
                <option value="{{ $toy->id }}" {{ $loop->first ? 'selected' : '' }}>{{ mb_strlen($toy->name) > 50 ? mb_substr($toy->name, 0, 30) : $toy->name; }}</option>
            @endforeach
        </select>
        <div class="w-50 mt-3 mb-3 d-flex justify-content-around">
            <a class="btn btn-primary" href="{{ route('toys.create') }}" role="button">Создать</a>
            @if(count($toys) > 0)
                <a class="btn btn-primary panel__toy-show" href="{{ route('toys.show', $toys->first()->id) }}" role="button">Просмотреть</a>
                <a class="btn btn-primary panel__toy-edit" href="{{ route('toys.edit', $toys->first()->id) }}" role="button">Изменить</a>
                <form class="panel__toy-delete" action="{{ route('toys.destroy', $toys->first()->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary" type="submit">Удалить</button>
                </form>
            @endif
        </div>
    </div>
</div>

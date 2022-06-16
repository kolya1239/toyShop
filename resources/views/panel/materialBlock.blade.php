<div class="tab-pane fade text-center" id="Material-tab-pane" role="tabpanel" aria-labelledby="Material-tab" tabindex="0">
    <img src="../image/materials.jpg" class="w-50" alt="...">
    <div class="panel-content text-center d-flex flex-column align-items-center justify-content-center">
        <select class="form-select w-25 mt-3 panel__material-select">
            @foreach ($materials as $material)
                <option value="{{ $material->id }}" {{ $loop->first ? 'selected' : '' }}>{{ $material->name }}</option>
            @endforeach
        </select>
        <div class="w-50 mt-3 mb-3 d-flex justify-content-around">
            <a class="btn btn-primary" href="{{ route('materials.create') }}" role="button">Создать</a>
            @if(count($materials) > 0)
                <a class="btn btn-primary panel__material-show" href="{{ route('materials.show', $materials->first()->id) }}" role="button">Просмотреть</a>
                <a class="btn btn-primary panel__material-edit" href="{{ route('materials.edit', $materials->first()->id) }}" role="button">Изменить</a>
                <form class="panel__material-delete" action="{{ route('materials.destroy', $materials->first()->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary" type="submit">Удалить</button>
                </form>
            @endif
        </div>
    </div>
</div>

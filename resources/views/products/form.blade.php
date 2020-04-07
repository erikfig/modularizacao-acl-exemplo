<form action="{{ route($url, $params) }}" method="post">
    {{ csrf_field() }}
    @if ($result->id)
        {{ method_field('PUT') }}
    @endif

    <div class="form-group">
        <label for="formTitle">Título</label>
        <input type="text" id="formTitle" class="form-control" name="title" value="{{ old('title', $result->title) }}">
    </div>

    <div class="form-group">
        <label for="formDescription">Descrição</label>
        <textarea name="description" class="form-control" id="formDescription">{{ old('description', $result->description) }}</textarea>
    </div>

    <input type="submit" value="Salvar" class="btn btn-primary">
</form>

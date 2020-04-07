<form action="{{ route($url, $params) }}" method="post">
    {{ csrf_field() }}
    @if ($result->id)
        {{ method_field('PUT') }}
    @endif

    <div class="form-group">
        <label for="formName">Nome</label>
        <input type="text" id="formName" class="form-control" name="name" value="{{ old('name', $result->name) }}">
    </div>

    <div class="form-group">
        <strong>Permissões:</strong>
        @foreach($permissions as $permission)
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="permission[]"
                    value="{{ $permission->id }}" id="formPermission{{ $permission->id }}"
                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : null }}>
                <label class="form-check-label" for="formPermission{{ $permission->id }}">
                    {{ $permission->name }}
                </label>
            </div>
        @endforeach
    </div>

    <input type="submit" value="Salvar">
</form>

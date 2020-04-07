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
        <label for="formEmal">E-mail</label>
        <input type="email" id="formEmal" class="form-control" name="email" value="{{ old('email', $result->email) }}">
    </div>

    <div class="form-group">
        <label for="formPassword">Senha</label>
        <input type="password" id="formPassword" class="form-control" name="password" value="password">
    </div>

    <div class="form-group">
        <strong>Grupos:</strong>
        @foreach($roles as $role)
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    name="roles[]"
                    value="{{ $role->name }}" id="formRoles{{ $role->id }}"
                    {{ in_array($role->name, $userRole) ? 'checked' : null }}>
                <label class="form-check-label" for="formRoles{{ $role->id }}">
                    {{ $role->name }}
                </label>
            </div>
        @endforeach
    </div>

    <input type="submit" value="Salvar" class="btn btn-primary">
</form>

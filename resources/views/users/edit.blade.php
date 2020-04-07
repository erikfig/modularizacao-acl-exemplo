@include('crud.default', [
    'title' => 'Editar usuário',
    'content' => 'users.form',
    'contentData' => [
        'url' => 'users.update',
        'params' => [$result->id]
    ]
])

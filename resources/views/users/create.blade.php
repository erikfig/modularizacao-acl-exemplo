@include('crud.default', [
    'title' => 'Criar usuário',
    'content' => 'users.form',
    'contentData' => [
        'url' => 'users.store',
        'params' => [$result->id]
    ]
])

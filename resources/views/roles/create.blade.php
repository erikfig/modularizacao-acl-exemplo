@include('crud.default', [
    'title' => 'Criar grupo',
    'content' => 'roles.form',
    'contentData' => [
        'url' => 'roles.store',
        'params' => [$result->id]
    ]
])

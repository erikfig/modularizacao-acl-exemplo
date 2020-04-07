@include('crud.default', [
    'title' => 'Editar grupo',
    'content' => 'roles.form',
    'contentData' => [
        'url' => 'roles.update',
        'params' => [$result->id]
    ]
])

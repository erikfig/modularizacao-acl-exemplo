@include('crud.default', [
    'title' => 'Editar produto',
    'content' => 'products.form',
    'contentData' => [
        'url' => 'products.update',
        'params' => [$result->id]
    ]
]);

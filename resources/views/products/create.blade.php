@include('crud.default', [
    'title' => 'Criar produto',
    'content' => 'products.form',
    'contentData' => [
        'url' => 'products.store',
        'params' => [$result->id]
    ]
]);

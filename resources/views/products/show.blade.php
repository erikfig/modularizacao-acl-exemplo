@include('crud.show', [
    'title' => 'Produto',
    'table' => [
        '#' => 'id',
        'Título' => 'title',
        'Criado em' => 'created_at',
        'Atualizado em' => 'updated_at',
    ],
    'result' => $result,
]);

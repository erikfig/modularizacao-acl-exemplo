@include('crud.show', [
    'title' => 'Grupo',
    'table' => [
        '#' => 'id',
        'Nome' => 'name',
        'Criado em' => 'created_at',
        'Atualizado em' => 'updated_at',
    ],
    'result' => $result,
    'relateds' => [
        [
            'title' => 'Permissões',
            'data' => $result->permissions()->paginate(15),
            'table' => [
                '#' => 'id',
                'Nome' => 'name',
                'Criado em' => 'created_at',
                'Atualizado em' => 'updated_at',
            ]
        ]
    ],
])

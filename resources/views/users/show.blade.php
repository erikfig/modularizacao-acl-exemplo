@include('crud.show', [
    'title' => 'Usuário',
    'table' => [
        '#' => 'id',
        'Nome' => 'name',
        'Email' => 'email',
        'Criado em' => 'created_at',
        'Atualizado em' => 'updated_at',
    ],
    'result' => $result,
    'relateds' => [
        [
            'title' => 'Grupo',
            'data' => $result->roles()->paginate(15),
            'table' => [
                '#' => 'id',
                'Nome' => 'name',
                'Criado em' => 'created_at',
                'Atualizado em' => 'updated_at',
            ]
        ]
    ],
])

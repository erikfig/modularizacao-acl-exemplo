@include('crud.index', [
    'title' => 'Usuários',
    'createRoute' => 'users.create',
    'table' => [
        '#' => 'id',
        'Nome' => 'name',
        'Email' => 'email',
    ],
    'results' => $results,
    'actions' => [
        [
            'type' => 'link',
            'route' => 'users.show',
            'label' => 'ver',
            'color' => 'secondary',
        ],
        [
            'type' => 'link',
            'route' => 'users.edit',
            'label' => 'editar',
            'color' => 'primary',
        ],
        [
            'type' => 'form',
            'route' => 'users.destroy',
            'label' => 'remover',
            'color' => 'danger',
            'method' => 'DELETE',
        ],
    ]
])

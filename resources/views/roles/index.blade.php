@include('crud.index', [
    'title' => 'Grupos',
    'createRoute' => 'roles.create',
    'table' => [
        '#' => 'id',
        'Nome' => 'name',
    ],
    'results' => $results,
    'actions' => [
        [
            'type' => 'link',
            'route' => 'roles.show',
            'label' => 'ver',
            'color' => 'secondary',
        ],
        [
            'type' => 'link',
            'route' => 'roles.edit',
            'label' => 'editar',
            'color' => 'primary',
        ],
        [
            'type' => 'form',
            'route' => 'roles.destroy',
            'label' => 'remover',
            'color' => 'danger',
            'method' => 'DELETE'
        ],
    ]
])

@include('crud.index', [
    'title' => 'Produtos',
    'createRoute' => 'products.create',
    'table' => [
        '#' => 'id',
        'Título' => 'title',
    ],
    'results' => $results,
    'actions' => [
        [
            'type' => 'link',
            'route' => 'products.show',
            'label' => 'ver',
            'color' => 'secondary',
        ],
        [
            'type' => 'link',
            'route' => 'products.edit',
            'label' => 'editar',
            'color' => 'primary',
        ],
        [
            'type' => 'form',
            'route' => 'products.destroy',
            'label' => 'remover',
            'color' => 'danger',
            'method' => 'DELETE'
        ],
    ]
]);

<?php

namespace ErikFig\Feature\products\Http\Controllers;

use App\Http\Controllers\CrudController;
use ErikFig\Feature\products\Product as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;

class ProductController extends CrudController
{
    protected $model = null;

    public function __construct()
    {
        // $this->middleware('permission:Listar Produtos', ['only' => ['index', 'show']]);
        // $this->middleware('permission:Criar Produtos', ['only' => ['create','store']]);
        // $this->middleware('permission:Editar Produtos', ['only' => ['edit','update']]);
        // $this->middleware('permission:Remover Produtos', ['only' => ['destroy']]);
    }

    protected function getModel() :EloquentModel
    {
        if (!$this->model) {
            $this->model = new Model;
        }

        return $this->model;
    }

    protected function getViewPathName() :String
    {
        return  'products';
    }

    protected function getRedirectPath() :String
    {
        return  'products';
    }
}

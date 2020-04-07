<?php

namespace App\Http\Controllers;

use App\User as Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends CrudController
{
    protected $model = null;

    public function __construct()
    {
        $this->middleware('permission:Listar Usuários', ['only' => ['index', 'show', 'api']]);
        $this->middleware('permission:Criar Usuários', ['only' => ['create','store']]);
        $this->middleware('permission:Editar Usuários', ['only' => ['edit','update']]);
        $this->middleware('permission:Remover Usuários', ['only' => ['destroy']]);
    }

    protected function getModel() : EloquentModel
    {
        if (!$this->model) {
            $this->model = new Model;
        }

        return $this->model;
    }

    protected function getViewPathName() :String
    {
        return  'users';
    }

    protected function getRedirectPath() :String
    {
        return  'users';
    }


    public function api()
    {
        $per_page = request()->query('per_page', 15);
        $results = $this->getModel()->paginate($per_page);

        return $results;
    }

    public function create()
    {
        $result = $this->getModel();
        $roles = Role::all();
        $userRole = [];
        return view($this->getViewPathName() . '.create', compact('result', 'roles', 'userRole'));
    }

    public function store(Request $request)
    {
        $model = $this->getModel();

        $result = $model->create($request->all());
        $result->assignRole($request->input('roles'));
        return redirect()
            ->route($this->getRedirectPath() . '.show', $result->id)
            ->withInput();
    }

    public function edit($id)
    {
        $model = $this->getModel();
        $result = $model->find($id);

        $roles = Role::all();
        $userRole = $result->roles == null ? [] : $result->roles->pluck('name','name')->all();

        return view($this->getViewPathName() . '.edit', compact('result', 'roles', 'userRole'));
    }

    public function update(Request $request, $id)
    {
        $model = $this->getModel();

        $result = $model->find($id);
        $result->update($request->all());

        $result->syncRoles($request->input('roles'));

        return redirect()->route($this->getRedirectPath() . '.edit', $result->id)
            ->withInput();
    }
}

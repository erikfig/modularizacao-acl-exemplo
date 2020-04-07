<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Spatie\Permission\Models\Role as Model;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends CrudController
{
    protected $model = null;

    public function __construct()
    {
         $this->middleware('permission:Listar grupos', ['only' => ['index', 'show']]);
         $this->middleware('permission:Criar grupos', ['only' => ['create','store']]);
         $this->middleware('permission:Editar grupos', ['only' => ['edit','update']]);
         $this->middleware('permission:Remover grupos', ['only' => ['destroy']]);
    }

    protected function getModel() :EloquentModel
    {
        if (!$this->model) {
            $this->model = new Model();
        }

        return $this->model;
    }

    protected function getViewPathName() :String
    {
        return  'roles';
    }

    protected function getRedirectPath() :String
    {
        return  'roles';
    }

    public function create()
    {
        $result = $this->getModel();
        $permissions = Permission::get();
        $rolePermissions = [];
        return view($this->getViewPathName() . '.create', compact('result', 'permissions', 'rolePermissions'));
    }

    public function store(Request $request)
    {
        $model = $this->getModel();

        $result = $model->create($request->only('name'));
        $result->syncPermissions($request->input('permission'));

        return redirect()
            ->route($this->getRedirectPath() . '.show', $result->id)
            ->withInput();
    }

    public function edit($id)
    {
        $model = $this->getModel();
        $permissions = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$id)
            ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
            ->all();

        $result = $model->find($id);
        return view($this->getViewPathName() . '.edit', compact('result', 'permissions', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        $model = $this->getModel();

        $result = $model->find($id);
        $result->update($request->only('name'));
        $result->syncPermissions($request->input('permission'));

        return redirect()->route($this->getRedirectPath() . '.edit', $result->id)
            ->withInput();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class CrudController extends Controller
{
    /**
     * Return Model instance
     *
     * @return Model
     */
    abstract protected function getModel() :Model;

    /**
     * Return view path config
     *
     * @return Model
     */
    abstract protected function getViewPathName() :String;

    /**
     * Return redirect base path config
     *
     * @return Model
     */
    abstract protected function getRedirectPath() :String;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $per_page = request()->query('per_page', 15);
        $results = $this->getModel()->paginate($per_page);

        return view($this->getViewPathName() . '.index', compact('results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $result = $this->getModel();
        return view($this->getViewPathName() . '.create', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = $this->getModel();

        $result = $model->create($request->all());
        return redirect()
            ->route($this->getRedirectPath() . '.show', $result->id)
            ->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = $this->getModel();

        $result = $model->find($id);
        return view($this->getViewPathName() . '.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = $this->getModel();

        $result = $model->find($id);
        return view($this->getViewPathName() . '.edit', compact('result'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $model = $this->getModel();

        $result = $model->find($id);
        $result->update($request->all());

        return redirect()->route($this->getRedirectPath() . '.edit', $result->id)
            ->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->getModel();

        $result = $model->find($id);
        $result->delete();

        return redirect()->route($this->getRedirectPath() . '.index');
    }
}

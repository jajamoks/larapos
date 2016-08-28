<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'roles' => Role::all()
        ];

        return view('settings.roles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\StoreRole $request)
    {
        $form = $request->all();

        $role = Role::create($form);

        return redirect('settings/roles')
            ->with('message-success', 'Role created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::findOrFail($id);

        return view('settings.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::findOrFail($id);

        return view('settings.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UpdateRole $request, $id)
    {
        $form = $request->all();

        $role = Role::findOrFail($id);
        $role->update($form);

        return redirect('settings/roles')
            ->with('message-success', 'Role updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();

        return redirect('settings/roles')
            ->with('message-success', 'Role deleted!');
    }
}

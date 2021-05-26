<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Response
     */
    public function index()
    {
        return Role::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Collection|Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required' ,
            'label' => 'required' ,
        ]);

        return Role::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Collection|Response
     */
    public function show(int $id)
    {
        return Role::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Collection|Response
     */
    public function update(Request $request, int $id)
    {
        $role = Role::find($id);
        $role->update($request->all());
        return $role;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Collection|Response
     */
    public function destroy(int $id)
    {
        return Role::destroy($id);

    }
}

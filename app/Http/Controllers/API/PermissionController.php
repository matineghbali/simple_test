<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRoleRequest;
use App\Models\Permission;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Response
     */
    public function index()
    {
        return Permission::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PermissionRoleRequest $request
     * @return Collection|Response
     */
    public function store(PermissionRoleRequest $request)
    {
        return Permission::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Collection|Response
     */
    public function show(int $id)
    {
        return Permission::find($id);
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
        $permission = Permission::find($id);
        $permission->update($request->all());
        return $permission;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Collection|Response
     */
    public function destroy(int $id)
    {
        return Permission::destroy($id);

    }
}

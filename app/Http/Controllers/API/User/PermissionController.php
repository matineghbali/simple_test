<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    public function store(Request $request, User $user)
    {
        if (!Gate::allows('add-permission-for-users'))
            return response([
                'data' => 'شما دسترسی برای اختصاص اجازه دسترسی به کاربران را ندارید',
                'status' => 401
            ]);

        $user->permissions()->sync($request->permissions);
        $user->roles()->sync($request->roles);

        return response([
            'data' => 'دسترسی مورد نظر شما با موفقیت اضافه شد',
            'status' => 200
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function create(Request $request)
    {
        $user = [
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'sex' => $request->input('sex'),
            'salary' => $request->input('salary'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
        ];
        User::create($user);
        return "success";
    }

    public function show()
    {
        $users = DB::table('users')->get();
        return response()->json($users);
    }

    public function getUser($id) 
    {
        $user = User::findOrFail($id);
        return $user;
    }

    public function edit(User $user)
    {
        //
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->input('id'));
        $user->delete();
        return "remove success";
    }
}

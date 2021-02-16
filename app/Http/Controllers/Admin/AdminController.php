<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\FormCreateUserRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // public function __construct() {
    //     $this->middleware('auth');
    // }

    public function users() {
        $users = User::paginate(10);
        // ['users' => $users]
        return view('views_admin.admin.users', compact('users'));
    }

    public function filtro(){
        $users = User::select('users.*');

        if(isset($_GET['estado']) && $_GET['estado'] != null){
            if($_GET['estado'] == "true"){
                $users = $users->where('estado','Activo');
            }else{
                $users = $users->where('estado','Inactivo');
            }
        }
        if(isset($_GET['search']) && $_GET['search'] != null) {
            $users = $users->where('identificacion', 'like', "%".$_GET['search']."%");
            $users = $users->orWhere('name', 'like', "%".$_GET['search']."%");
            $users = $users->orWhere('email', 'like', "%".$_GET['search']."%");
        }
        if(isset($_GET['ordenarpor']) && $_GET['ordenarpor'] != null){
            $users = $users->orderBy($_GET['ordenarpor']);
        }
        $users = $users->paginate(10);

        return view('views_admin.admin.users', ['users' => $users]);
    }

    public function createUser(FormCreateUserRequest $request) {

        $user = User::create([
            'name' => $request['name'],
            'identificacion' => $request['identificacion'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'estado' => $request['estado'],
        ]);

        if ($user->save()) {
            // if ($request['tipo'] == 'admin') {
            //     $user->assignRole($request['tipo']);
            // } else {
            //     $user->assignRole($request['tipo']);
            //     $user->givePermissionTo($request['permisos']);
            // }
            return redirect()->route('users')->with('create', 1);
        } else {
            return redirect()->route('users')->with('create', 0);
        }

    }

    public function showUser(Request $request) {
        $user = User::find($request['id']);
        // $permisos = array();

        // foreach ($user->permissions as $permiso) {
        //     array_push($permisos, $permiso->name);
        // }

        // return [
        //     'user' => $user,
        //     'rol' => $user->roles()->first()->name,
        //     'permisos' => $permisos
        // ];
    }

    public function updateUser(Request $request) {

        $user = User::find($request['id']);

        if ($request['password']) {
            $user->update([
                'password' => Hash::make($request['password'])
            ]);
        }

        $user->update([
            'name' => $request['name'],
            'identificacion' => $request['identificacion'],
            'email' => $request['email'],
            'estado' => $request['estado'],
        ]);

        // if ($request['tipo'] == 'admin') {
        //     $user->assignRole($request['tipo']);
        //     $user->removeRole('general');
        // } else {
        //     $user->assignRole($request['tipo']);
        //     $user->removeRole('admin');
        //     $user->revokePermissionTo(Permission::all());
        //     $user->givePermissionTo($request['permisos']);
        // }
        return redirect()->route('users')->with('update', 1);

    }

}

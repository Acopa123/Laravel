<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Roles_Users;
use App\Roles;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;

class EmployeeController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return Response
    */
   public function index()
   {
     $employees = User::all();
     return view('admin.employee.employee', compact('employees'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return Response
    */
   public function create()
   {
     $roles = Roles::all();
     return view('admin.employee.add-employee', compact('roles'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @return Response
    */
   public function store(CreateUserRequest $request)
   {
     $employee = new User;
     $employee->name = request('name');
     $employee->user = request('user');
     $employee->email = request('email');
     $employee->phone = request('phone');
     $employee->password = bcrypt(request('password'));
     $employee->tipo = request('tipo');
     $employee->save();

     $roleUser = new Roles_Users;
     $roleUser->role_id = request('tipo');
     $roleUser->user_id = $employee->id;
     $roleUser->save();

     return redirect('admin/usuario')->with('success','Empleado '. $employee->name .' Guardado correctamente')->withInput(request(['email', 'name', 'user', 'phone']));
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function show($id)
   {

   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return Response
    */
   public function edit($id)
   {
     $employee = User::find($id);
     $roles = Roles::all();
     return view('admin.employee.edit-employee', compact('employee', 'roles'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function update(UpdateUserRequest $request, $id)
   {
     $newName = $request->input('name');
     $newUser = $request->input('user');
     $newEmail = $request->input('email');
     $newPhone = $request->input('phone');
     $newPassword = $request->input('password');
     $newTipo = $request->input('tipo');


     $employee = User::find($id);

     $employee->name = $newName;
     $employee->user = $newUser;
     $employee->email = $newEmail;
     $employee->phone = $newPhone;
     $employee->tipo = $newTipo;
     if ($newPassword != null) {
       $employee->password = bcrypt($newPassword);
     }

     $employee->save();

     $roleUser = Roles_Users::where('user_id', $id)->first();
     $roleUser->role_id = $newTipo;
     $roleUser->user_id = $id;
     $roleUser->save();

     return redirect('admin/usuario')->with('success','Empleado RX-'. $id .' actualizado correctamente');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return Response
    */
   public function destroy($id)
   {
     User::find($id)->delete();
     Roles_Users::where('user_id', $id)->delete();
     return redirect('admin/usuario')->with('success','Empleado RX-'. $id .' eliminado correctamente');
   }
}

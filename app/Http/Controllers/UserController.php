<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\NotificationTable;
use App\services\sendToken;

class UserController extends Controller
{
   
    public function index()
    {
        //
    }
    
    public function create()
    {
        //
    }

  
    public function store(Request $request)
    {
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $password = $request->password;
        $randcode = random_int(100000, 999999);
        $sendToken = new sendToken( $phone , $randcode );
        $user = User::create([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'password' => $password,
            'randcode' => $randcode
        ]);
        $notify = NotificationTable::create([
            'token' => $randcode
        ]);

    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}

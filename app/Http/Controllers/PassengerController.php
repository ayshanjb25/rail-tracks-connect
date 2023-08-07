<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PassengerController extends Controller
{
    public function store(Request $request)
{
    $data = $request->validate([
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'mobile' => 'required|string',
        'email' => 'required|email',
        'nic' => 'required|string',
    ]);

    $passenger = Passenger::create($data);

    return response()->json(['message' => 'Passenger created successfully', 'data' => $passenger], 201);
}

public function update(Request $request, $id)
{
    $passenger = Passenger::findOrFail($id);

    $data = $request->validate([
        'firstname' => 'required|string',
        'lastname' => 'required|string',
        'mobile' => 'required|string',
        'email' => 'required|email',
        'nic' => 'required|string',
    ]);

    $passenger->update($data);

    return response()->json(['message' => 'Passenger updated successfully', 'data' => $passenger]);
}


// public function edit(Request $request, $id)
//     {
//         $user = User::find($id);
//         $user->first_name = $request->input('first_name');
//         $user->last_name = $request->input('last_name');
//         $user->nickname = $request->input('nickname');
//         $user->email = $request->input('email');
//         $user->password = $request->input('password');
//         $user->dob = $request->input('dob');
//         $user->mobile = $request->input('mobile');
//         $user->gender = $request->input('gender');
//         $user->save();

//         return response()->json($user);
//     }
}

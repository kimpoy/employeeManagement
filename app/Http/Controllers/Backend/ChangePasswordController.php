<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change_password(Request $request, User $user){
        /* validation */
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        /* update */
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        /* return */
        return redirect()->route('users.index')->with('message', 'Password Updated Successfully');

    }
}

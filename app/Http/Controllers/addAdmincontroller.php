<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\User; // Import the User model
use Illuminate\Validation\Rule; 
use Illuminate\Validation\ValidationException;// Import Rule class
use Illuminate\Auth\Events\Registered; // Import the Registered event class
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class addAdmincontroller extends Controller
{
    public function index()
    {
        return view('AddAdmin');
    }

    public function store(Request $request)
    {
        
       try{ 
        $FormFields = $request->validate([
             'name' => ['required', 'min:3'],
             'email' => ['required', 'email', Rule::unique('users', 'email')],
             'password' => ['required', 'confirmed', 'min:6'],
             'role' =>['required'],

 
         ]);

         // Hash the password before storing it
    $FormFields['password'] = Hash::make($FormFields['password']);
 

         // Create a new user with the validated data
         $user = User::create($FormFields);

         event(new Registered($user)); 
 
         // Redirect the user somewhere after successful submission
 
      return redirect('/AddAdmin')->with('success', 'User created successfully!');
      
     }catch(ValidationException $e){
         return redirect()->back()->withErrors($e->validator->errors())->withInput();
 }
    }

public function show()
{
    $users = User::where('role', 'admin')->paginate(7); // Display 10 admins per page
    return view('AdminList',compact('users') );
}
public function delete($id)
{
    
    $user = user::findOrFail($id);
   
    if ($user) {
      
        
        $user->delete();

        return redirect()->back()->with('success', 'Admin deleted successfully.');
    }

    return redirect()->back()->with('error', 'Content not found.');
}
}

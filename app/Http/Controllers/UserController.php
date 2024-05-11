<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; // Import the Hash facade
use App\Models\User; // Import the User model
use Illuminate\Validation\Rule; 
use Illuminate\Validation\ValidationException;// Import Rule class

class UserController extends Controller
{
    public function create()
    {
        return view('registre');
    }

   
    public function store(Request $request)
    {
       try{ 
       $FormFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
            'role' => ['required'],
        ]);

        // Hash the password before storing it
   $FormFields['password'] = Hash::make($FormFields['password']);

        // Create a new user with the validated data
        $user = User::create($FormFields);

        // Redirect the user somewhere after successful submission
        return redirect('/accueil')->with('success', 'User created successfully!');
    }catch(ValidationException $e){
        return redirect()->back()->withErrors($e->validator->errors())->withInput();
}
}
//show login
public function login(){
    return view('login');
}
//authentication 
public function authenticate(Request $request)
{
$FormField = $request->validate([
    'email' => ['required','email'],
    'password'=> 'required'
]);
if(auth()->attempt($FormField)){
    $request->session()->regenerate();
    return redirect()->route('welcome')->with('message','you are logged in');

}
return back();
}
public function logout(Request $Request){
auth()->logout();
$request = session()->invalidate();
$request = session()->regenrateToken();
return redirect()->route('accueil')->with('message','you have been logged out');
 
}
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
//use Illuminate\Support\Facades\Auth;


class UserController extends Controller 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $titlePage="Users";
        $users= User::get();
        return view('admin.users',compact('users','titlePage'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $titlePage="Add User";
        return view('admin.addUser',compact('titlePage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validationRules(), $this->messages());

        $data['active'] = $request->has('active') ? 1 : 0;

        User::create($data);

        //return redirect()->route('usersList')->with('success', 'User created successfully.');
        return redirect()->route('admin.usersList')->with('success', 'User created successfully.');
    }
//--------------------------------------------------------------------------------------------------------
/*try {
    $data = $request->validate([
        'name' => 'required|min:3|max:100',
        'username' => 'required|min:3|max:100|unique:users,username',
        'email' => 'required|email:rfc|unique:users,email',
        'password' => 'required|min:8', // Add any other rules for password
    ]);

    // User creation logic using $validatedData here

} catch (\Illuminate\Validation\ValidationException $e) {
    return redirect()->route('addUser')->withErrors($e->errors())->withInput();
}
       $data['active'] = $request->has('active') ? 1 : 0;


        User::create($data);

        return redirect()->route('usersList')->with('success', 'User created successfully.');*/
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $user = User::find($id);
        $titlePage="Edit User";

    // Return the edit view with the client data
         return view('admin.edituser', compact('user','titlePage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $user = User::findOrFail($id);

       $data = $request->validate($this->updateValidationRules($id), $this->messages());
       if (empty($data['password'])) {
        unset($data['password']);
    } else {
        // Hash the password before saving it
        $data['password'] = bcrypt($data['password']);
    }

        $data['active'] = $request->has('active') ? 1 : 0;

        

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->update($data);
        return redirect()->route('admin.usersList')->with('success', 'User Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    private function validationRules()
    {
        return [
            'name' => 'required|min:3|max:100',
            'username' => 'required|min:3|max:100|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ];
    }
    private function updateValidationRules($id)
{
    return [
        'name' => 'required|min:3|max:100',
        'username' => 'required|min:3|max:100|unique:users,username,' . $id,
        'email' => 'required|email|unique:users,email,' . $id,
        'password' => 'nullable|min:8', // Make password nullable to allow for no change
    ];
}

    private function messages()
    {
        return [
            'name.required' => 'The full name is required.',
            'name.min' => 'The full name must be at least 3 characters.',
            'name.max' => 'The full name may not be greater than 100 characters.',
            'username.required' => 'The username is required.',
            'username.min' => 'The username must be at least 3 characters.',
            'username.max' => 'The username may not be greater than 100 characters.',
            'username.unique' => 'The username has already been taken.',
            'email.required' => 'The email address is required.',
            'email.email' => 'The email address must be a valid email.',
            'email.unique' => 'The email address has already been taken.',
            'password.required' => 'The password is required.',
            'password.min' => 'The password must be at least 8 characters.',
        ];
    }
    public function login()
    {
        return view('admin.login');
    }


    public function register()
    {
        return view('admin.login');
    }
    

}

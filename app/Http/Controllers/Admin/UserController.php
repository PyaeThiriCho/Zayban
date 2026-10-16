<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'DESC')->paginate(15);
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(UserRequest $request)
    {
        $file_name = time().'.'.$request->profile->extension();

        $upload = $request->profile->move(
            public_path('images/users/'),
            $file_name
        );

        $profile = "/images/users/".$file_name;

        $users = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'profile' => $profile,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('admin.users.index');
    }

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
        $user = User::find($id);
        // $roles = Role::all();
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->role = $request->role;

        if($request->hasFile('profile')){
            $file_name = time().'.'.$request->profile->extension();

            $upload = $request->profile->move(
                public_path('images/users/'),
                $file_name
            );

            if($upload){
                $user->profile = "/images/users/".$file_name;
            }
        }else{
            $user->profile = $request->old_profile;
        }

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.users.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // dd($id);
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }
}

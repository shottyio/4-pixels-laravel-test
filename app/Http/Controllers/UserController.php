<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest as Request;
use App\User;

class UserController extends Controller
{
    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $this->user->create($request->all());

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        $user = $this->user->find($id);

        return view('users.edit', compact('user'));
    }

    public function update($id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6'
        ]);

        $user = $this->user->find($id);

        $user->update(request()->all());

        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        try {
            if ($user->delete()) {
                return redirect()->route('users.index');
            }
        } catch (\Exception $e) {
            print $e->getMessage();
        }
    }
}

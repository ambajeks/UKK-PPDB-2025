<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(){ $this->middleware(['auth','can:admin']); }

    public function index(){
        $users = User::with('roles')->paginate(20);
        return view('users.index',compact('users'));
    }

    public function edit(User $user){
        $roles = Role::all();
        return view('users.edit',compact('user','roles'));
    }

    public function update(Request $r, User $user){
        $user->roles()->sync($r->roles ?? []);
        return redirect()->route('users.index')->with('success','Peran pengguna diperbarui');
    }

    public function destroy(User $user){
        $user->delete();
        return back()->with('success','User dihapus');
    }
}

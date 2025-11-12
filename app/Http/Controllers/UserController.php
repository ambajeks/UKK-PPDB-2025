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
       return view('admin.users.index', compact('users'));

    }

    public function edit(User $user){
        $roles = Role::all();
        return view('admin.users.edit',compact('user','roles'));
    }
public function update(Request $r, User $user)
{
    // Validasi role_id wajib diisi
    $r->validate([
        'role_id' => 'required|exists:roles,id',
    ]);

    // Karena cuma satu role yang boleh, maka sync dengan satu ID
    $user->roles()->sync([$r->role_id]);

    return redirect()
        ->route('admin.users.index')
        ->with('success', 'Peran pengguna berhasil diperbarui');
}
    
    public function destroy(User $user){
        $user->delete();
        return back()->with('success','User dihapus');
    }
}

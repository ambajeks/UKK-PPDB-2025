<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        $roles = ['admin','user']; // nilai diambil dari ENUM pada users di SQL Anda
        foreach($roles as $r){
            Role::firstOrCreate(['name'=>$r], ['display_name'=>ucfirst($r)]);
        }
    }
}

<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Role;
class RoleTableSeeder extends Seeder
{
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator usuaris i videos';
        $role->save();
        $role = new Role();
        $role->name = 'loaders';
        $role->description = 'pujar, etiquetar i veure videos';
        $role->save();
        $role = new Role();
        $role->name = 'user';
        $role->description = 'veure videos i puntuar';
        $role->save();
        $role = new Role();
        $role->name = 'guest';
        $role->description = 'explorar sense veure';
        $role->save();
    }
}

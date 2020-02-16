<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            'Support1',
            'Support2',
            'Support3'
        ];

        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'support']);

        $admin = User::create([
            'name' => 'Super',
            'surname' => 'Administrator',
            'email' => 'admin@test.com',
            'password' => bcrypt('password'),
        ]);

        $admin->assignRole('admin');
       
        foreach ($users as $name) {
            $user = User::create([
                'name' => $name,
                'surname' => 'User',
                'email' => strtolower($name).'@test.com',
                'password' => bcrypt('password'),
            ]);

            $user->assignRole('support');
        }
        
    }
}

<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         User::create([
            'name' => 'Crislin Nuñez',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678')
        ]);

        factory(User::class, 20)->create();
    }
}

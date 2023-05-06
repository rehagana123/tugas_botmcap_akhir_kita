<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Profile;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
  Role::create([
            'nama' => 'admin',
        ]);

        Role::create([
            'nama' => 'guest',
        ]);

        $user = User::create([
            'username' => 'Admin',
            'email' => 'kelompok@kami.com',
            'password' => bcrypt('admin1234'),
            'role_id' => 1,
        ]);

        Profile::create([
            'nama' => 'kelompok kami',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => 'jalan di penjaitan',
            'nomor_telepon' => 8427215757,
            'users_id' => $user->id
        ]);
    }
}

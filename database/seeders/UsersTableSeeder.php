<?php

namespace Database\Seeders;

use App\Models\{
    Tenant,
    User,
};

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenant = Tenant::first();

        $tenant->users()->create([
            'name' => 'Rafael Tonon',
            'email' => 'rstonon@gmail.com',
            'password' => Hash::make('123456'),
        ]);
    }
}

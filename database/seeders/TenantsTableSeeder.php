<?php

namespace Database\Seeders;

use App\Models\{
    Plan,
    Tenant,
};

use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $plan = Plan::first();

        $plan->tenants()->create([
            'cnpj' => '04048081000150',
            'name' => 'Mejjihel Cosméticos',
            'url' => 'mejjihel-cosmeticos',
            'email' => 'rstonon@gmail.com',
        ]);
    }
}

<?php

namespace Database\Seeders;

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
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(SupplierSeeder::class);
        $this->call(UnitSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(PurchaseItemSeeder::class);
        $this->call(ProjectTypeSeeder::class);
        $this->call(ProjectSeeder::class);
        $this->call(PurchaseSeeder::class);
    }
}

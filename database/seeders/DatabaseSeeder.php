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
        $this->call(AppraisalsTableSeeder::class);
        $this->call(BillsTableSeeder::class);
        $this->call(InvoicesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(WarrantiesTableSeeder::class);
    }
}

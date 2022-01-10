<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Schema::disableForeignKeyConstraints();

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(UserPermissionsTableSeeder::class);
        $this->call(DivisionsTableSeeder::class);
        $this->call(DistrictsTableSeeder::class);
        $this->call(ThanasTableSeeder::class);
        $this->call(FireStationTypesTableSeeder::class);
        $this->call(FireStationsTableSeeder::class);
        $this->call(CountriesTableSeeder::class);

        $this->call(MenusTableSeeder::class);
        $this->call(MenuActionsTableSeeder::class);
        $this->call(UserMenuActionsTableSeeder::class);
    }
}

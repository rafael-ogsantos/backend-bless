<?php

use Illuminate\Database\Seeder;

use App\Models\Property;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeed::class);
        $this->call(UserDetailsSeed::class);
        $this->call(UserSeed::class);
        factory(Property::class, 5)->create();

    }
}

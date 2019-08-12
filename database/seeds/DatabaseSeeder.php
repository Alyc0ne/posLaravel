<?php

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
        // $this->call(UsersTableSeeder::class);
        $this->call('smUserTableSeeder');
        $this->call('smUnitTableSeeder');
        $this->command->info('Seeded!');
    }
}

class smUserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('smUsers')->delete();
        DB::table('smUsers')->insert([
            'username' => 'slAdmin',
            'email' => 'slAdmin@outlook.com',
            'password' => Hash::make('1234aw'),
            'name' => 'Administrator',
            'IsAdmin' => true,
            'IsDelete' => false,
            'IsInactive' => false,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}

class smUnitTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('smUnit')->delete();
        DB::table('smUnit')->insert([
            'UnitID' => substr(uniqid(), 3),
            'UnitNo' => "UN".date("Ym")."-01",
            'UnitName' => "ชิ้น",
            'CreatedByID' => 1, //1 = admin
            'CreatedDate' => date('Y-m-d H:i:s'),
            'IsDelete' => false,
            'IsInactive' => false
        ]);
    }
}

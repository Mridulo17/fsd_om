<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'role_id' => 1,
                'employer_id' => NULL,
                'name' => 'Super User',
                'bn_name' => 'সুপার ইউজার',
                'username' => 'super',
                'mobile' => NULL,
                'phone_no' => NULL,
                'email' => 'super@gmail.com',
                'nid' => NULL,
                'address' => NULL,
                'email_verified_at' => '2021-07-06 09:39:10',
                'password' => Hash::make('pr#2021@omr'),
                'dob' => '1995-01-10',
                'status' => 'Active',
                'permission_as_role' => 'Yes',
                'remember_token' => 'Otef043PVEiD8ctq2tvJ7HoKro2MX8y4YBxO8lRh3AbfL0N9PHo9q3TUefkE',
                'created_at' => '2021-02-24 20:36:02',
                'updated_at' => '2021-09-07 12:00:58',
            ),
            1 =>
            array (
                'id' => 2,
                'role_id' => 2,
                'employer_id' => NULL,
                'name' => 'Admin',
                'bn_name' => 'এডমিন',
                'username' => 'admin',
                'mobile' => NULL,
                'phone_no' => NULL,
                'email' => 'admin@gmail.com',
                'nid' => NULL,
                'address' => NULL,
                'email_verified_at' => '2021-09-07 12:01:55',
                'password' => Hash::make('12345678'),
                'dob' => NULL,
                'status' => 'Active',
                'permission_as_role' => 'Yes',
                'remember_token' => '0aJOaooGK8i4CVKbzn20Py5eZS1gVEY7zF05cTIqhyWiBXyHGj34YvCfIZrk',
                'created_at' => '2021-09-07 12:01:55',
                'updated_at' => '2021-09-07 12:01:55',
            ),
        ));


    }
}

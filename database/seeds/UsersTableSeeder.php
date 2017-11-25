<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");

        //user 1
        DB::table('users')->insert([
            'name' => 'Allen',
            'email' => 'allen@gmail.com',
            'password' => password_hash("123123", PASSWORD_DEFAULT),
            'image_url' => 'img/default.jpg',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('profiles')->insert([
            'contact_no' => '0123123123',
            'address_1' => '12, Lorong Damai',
            'address_2' => 'Taman Seri Damai',
            'city' => 'Pahang',
            'postal_code' => '123123',
            'country' => 'Malaysia',
            'desc' => 'Hello there, I\'m user 1.',
            'owner' => '1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('jobs')->insert([
            'job_id' => '201710221550581',
            'title' => 'Computer Hardware Repair Service',
            'description' => 'Provide full range of service like network installation, PC upgrades & format etc.',
            'category' => '11',
            'price' => '500',
            'instruction' => 'Please personal message before request for service',
            'tags' => 'hardware,computer,service,network,installation,nerd,configuration,support',
            'location' => '1',
            'days_to_deliver' => '7',
            'image_path' => 'test',
            'url_link' => 'www.allenRepair.com',
            'max' => '1',
            'email' => 'Y',
            'sms' => 'Y',
            'users' => '1',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        //user 2
        DB::table('users')->insert([
            'name' => 'Bob',
            'email' => 'bob@gmail.com',
            'password' => password_hash("123123", PASSWORD_DEFAULT),
            'image_url' => 'img/default.jpg',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('jobs')->insert([
            'job_id' => '201710221550582',
            'title' => 'Translation Service',
            'description' => 'Provide any services of translation (Language: English/ Mandarin/ Malay/ Japanese/ Thai)',
            'category' => '13',
            'price' => '1200',
            'instruction' => 'Looking for serious buyer who require professional translator or services',
            'tags' => 'translate,language,english,mandarin,cantonese,japanese,thai,service',
            'location' => '2',
            'days_to_deliver' => '1',
            'image_path' => 'test',
            'url_link' => 'www.bobservice.com.sg',
            'max' => '2',
            'email' => 'Y',
            'sms' => 'Y',
            'users' => '2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('jobs')->insert([
            'job_id' => '201710221550583',
            'title' => 'Writing services',
            'description' => 'Anyone looking for blog/ creative/ legal or any other writting service? Here is the one stop solution provider!',
            'category' => '14',
            'price' => '800',
            'instruction' => 'Please personal message before request for service',
            'tags' => 'translate,writting',
            'location' => '2',
            'days_to_deliver' => '7',
            'image_path' => 'test',
            'url_link' => 'www.bobservice.com.sg',
            'max' => '5',
            'email' => 'Y',
            'sms' => 'Y',
            'users' => '2',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        //user 2
        DB::table('users')->insert([
            'name' => 'Jane Chuck',
            'email' => 'jane@gmail.com',
            'password' => password_hash("123123", PASSWORD_DEFAULT),
            'image_url' => 'img/default.jpg',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('profiles')->insert([
            'contact_no' => '0123123123',
            'address_1' => '#04-190, Apartment Desa',
            'address_2' => 'Taman Duri Desa',
            'city' => 'Kuala Lumpur',
            'postal_code' => '5200881',
            'country' => 'Malaysia',
            'desc' => 'Hello there, I\'m user 3.',
            'owner' => '3',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('jobs')->insert([
            'job_id' => '201710221550584',
            'title' => 'Professional Writing services',
            'description' => 'Provide services of writting (Language: English/ Mandarin/ Malay/ Japanese/ Thai)',
            'category' => '14',
            'price' => '800',
            'instruction' => 'Please personal message before request for service',
            'tags' => 'translate,writting,english,mandarin,cantonese,japanese,thai,service,professional',
            'location' => '1',
            'days_to_deliver' => '3',
            'image_path' => 'test',
            'url_link' => 'www.jjchuck.com.sg',
            'max' => '5',
            'email' => 'Y',
            'sms' => 'Y',
            'users' => '3',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

    }
}

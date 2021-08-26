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
        DB::table('users')->insert([
            [
                'entity_name'       => '日本マニュファクチャリングサービス株式会社',
                'position'          => '',
                'name'              => '賀川 敦志',
                'email'             => 'a_kagawa@n-ms.co.jp',
                'tel'               => '080-3154-4979',
                'password'          => Hash::make('5tiGvGjSUKtH'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '日本マニュファクチャリングサービス株式会社',
                'position'          => '',
                'name'              => '銅傳 由香',
                'email'             => 'y_doden@n-ms.co.jp',
                'tel'               => '070-1478-9465',
                'password'          => Hash::make('fnrrpiNuSHBS1'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '日本マニュファクチャリングサービス株式会社',
                'position'          => '',
                'name'              => '吉田 孝弘',
                'email'             => 't_yoshida@n-ms.co.jp',
                'tel'               => '090-1552-2661',
                'password'          => Hash::make('ZHrTg52eUezB'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}

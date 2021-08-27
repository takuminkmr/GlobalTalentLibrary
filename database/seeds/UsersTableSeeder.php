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
            ],
            [
                'entity_name'       => '日本マニュファクチャリングサービス株式会社',
                'position'          => '',
                'name'              => '松本 正登',
                'email'             => 'm_matsumoto@n-ms.co.jp',
                'tel'               => '070-3236-7305',
                'password'          => Hash::make('M9EjpPXZxFmn'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => 'nmsホールディングス株式会社',
                'position'          => '',
                'name'              => '小野 文明',
                'email'             => 'special-guest-Ya@gtl.com',
                'tel'               => '03-5333-1711',
                'password'          => Hash::make('Yqra6xFUMFra'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => 'Angel Bridge株式会社',
                'position'          => '',
                'name'              => '林 正栄',
                'email'             => 'special-guest-iH@gtl.com',
                'tel'               => '000-0000-0000',
                'password'          => Hash::make('iUAw9K4Q6wpH'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '株式会社JASHコンサルティング',
                'position'          => '',
                'name'              => '伊藤 純一',
                'email'             => 'junito@jash-consulting.com',
                'tel'               => '090-1500-8621',
                'password'          => Hash::make('J7utVmmLCKLA'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => 'フルライン株式会社',
                'position'          => '',
                'name'              => '末永 栄一',
                'email'             => 'suenaga@full-line.co.jp',
                'tel'               => '090-4597-0050',
                'password'          => Hash::make('K5gZFqFKTXFq'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '株式会社ザイマックスサラ',
                'position'          => '',
                'name'              => '岡村 洋祐',
                'email'             => 'okamura@xymax.co.jp',
                'tel'               => '03-6859-0262',
                'password'          => Hash::make('ZZzva7nr54s4'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '株式会社ザイマックスグローバルパートナー',
                'position'          => '',
                'name'              => '森 隆平',
                'email'             => 'mori@xymax.co.jp',
                'tel'               => '03-5544-6840',
                'password'          => Hash::make('x4txLUR8WhFw'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '株式会社商船三井',
                'position'          => '',
                'name'              => '小池 秋乃',
                'email'             => 'akino-a.koike@molgroup.com',
                'tel'               => '070-7597-4078',
                'password'          => Hash::make('SaHFa7dukuut'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '株式会社商船三井',
                'position'          => '',
                'name'              => '北垣 裕孝',
                'email'             => 'hiroyuki.kitagaki@molgroup.com',
                'tel'               => '070-3875-2690',
                'password'          => Hash::make('BTmbwE4zsKce'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '株式会社商船三井',
                'position'          => '',
                'name'              => '冨沢 瑠美',
                'email'             => 'rumi.tomizawa@molgroup.com',
                'tel'               => '080-9370-3972',
                'password'          => Hash::make('4FwxDNh7dsWA'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
            [
                'entity_name'       => '株式会社商船三井',
                'position'          => '',
                'name'              => '北阪 千佳子',
                'email'             => 'chikako.kitasaka@molgroup.com',
                'tel'               => '070-2473-2977',
                'password'          => Hash::make('rdSfrT4wKzeP'),
                'remember_token'    => Str::random(60),
                'created_at'        => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
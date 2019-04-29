<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            [
                'title' => 'VÀNG BẠC NHƯ TRỊNH',
                'description'=> 'Trải qua hơn 10 năm phát triền và trưởng thành , Như Trịnh tự hào là chuyên gia số 1 trong các mảng thị trường chuyên biệt.',
                'name' => 'Website trang sức',
                'address' => '11C/14 Dương Quảng Hàm - Cầu Giấy - Hà Nội',
                'phone' => '01688888888',
                'email' => 'admin123@gmail.com',
                'tax_number' => 'HGKWS123',
                'bank' => 'viettin bank',
                'facebook' => 'https://www.facebook.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ]
        ]);

    }
}

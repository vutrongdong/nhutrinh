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
                'title' => 'Website trang sức sô 1 tại Việt Nam',
                'description'=> 'Đây là đoạn mô tả về công ty, doanh nghiệp',
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

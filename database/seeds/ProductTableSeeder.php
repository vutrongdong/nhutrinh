<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'title' => 'Sản phẩm 1',
                'slug' => 'san-pham-1',
                'code' => 'SP_ABC_001',
                'image' => 'sp1.png',
                'image_path' => 'image.png',
                'price' => 1000000,
                'date' => 5,
                'note' => 'Ghi chú 1',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Sản phẩm 2',
                'slug' => 'san-pham-3',
                'code' => 'SP_ABC_002',
                'image' => 'sp2.png',
                'image_path' => 'image.png',
                'price' => 1200000,
                'date' => 6,
                'note' => 'Ghi chú 2',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Sản phẩm 3',
                'slug' => 'san-pham-3',
                'code' => 'SP_ABC_003',
                'image' => 'sp1.png',
                'image_path' => 'image.png',
                'price' => 1000000,
                'date' => 7,
                'note' => 'Ghi chú 3',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Sản phẩm 4',
                'slug' => 'san-pham-4',
                'code' => 'SP_ABC_004',
                'image' => 'sp2.png',
                'image_path' => 'image.png',
                'price' => 1200000,
                'date' => 8,
                'note' => 'Ghi chú 4',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Sản phẩm 5',
                'slug' => 'san-pham-5',
                'code' => 'SP_ABC_005',
                'image' => 'sp1.png',
                'image_path' => 'image.png',
                'price' => 1000000,
                'date' => 9,
                'note' => 'Ghi chú 5',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Sản phẩm 6',
                'slug' => 'san-pham-6',
                'code' => 'SP_ABC_006',
                'image' => 'sp2.png',
                'image_path' => 'image.png',
                'price' => 1300000,
                'date' => 6,
                'note' => 'Ghi chú 6',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Sản phẩm 7',
                'slug' => 'san-pham-7',
                'code' => 'SP_ABC_007',
                'image' => 'sp1.png',
                'image_path' => 'image.png',
                'price' => 1000000,
                'date' => 8,
                'note' => 'Ghi chú 7',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Sản phẩm 8',
                'slug' => 'san-pham-8',
                'code' => 'SP_ABC_008',
                'image' => 'sp2.png',
                'image_path' => 'image.png',
                'price' => 1200000,
                'date' => 9,
                'note' => 'Ghi chú 8',
                'active' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);

    }
}

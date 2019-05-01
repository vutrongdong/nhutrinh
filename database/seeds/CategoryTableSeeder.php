<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            [
                'title' => 'Blog',
                'slug' => 'blog',
                'parent_id' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Trang sức cưới',
                'slug' => 'trang_suc_cuoi',
                'parent_id' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vàng 24K',
                'slug' => 'vang_24k',
                'parent_id' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vàng 18K',
                'slug' => 'vang_18k',
                'parent_id' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bạc cao cấp',
                'slug' => 'bac_cao_cap',
                'parent_id' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Charme phong thủy',
                'slug' => 'charme_phong_thuy',
                'parent_id' => 0,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Danh mục bài viết 1',
                'slug' => 'danh_muc_1',
                'parent_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bông tai đính đá',
                'slug' => 'bong_tai_dinh_da',
                'parent_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bông tai ngọc trai',
                'slug' => 'bong_tai_ngoc_trai',
                'parent_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Nhẫn kim cương',
                'slug' => 'nhan_kim_cuong',
                'parent_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vàng 24K 001',
                'slug' => 'vang_24k_001',
                'parent_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vàng 24K 002',
                'slug' => 'vang_24k_002',
                'parent_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vàng 24K 003',
                'slug' => 'vang_24k_003',
                'parent_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vàng 18K 001',
                'slug' => 'vang_18k_001',
                'parent_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vàng 18K 002',
                'slug' => 'vang_18k_002',
                'parent_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Vàng 18K 003',
                'slug' => 'vang_18k_003',
                'parent_id' => 4,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bạc cao cấp 001',
                'slug' => 'bac_cao_cap_001',
                'parent_id' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bạc cao cấp 002',
                'slug' => 'bac_cao_cap_002',
                'parent_id' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bạc cao cấp 003',
                'slug' => 'bac_cao_cap_003',
                'parent_id' => 5,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Charme PT 001',
                'slug' => 'charme_pt_001',
                'parent_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Charme PT 002',
                'slug' => 'charme_pt_002',
                'parent_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Charme PT 003',
                'slug' => 'charme_pt_003',
                'parent_id' => 6,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);

    }
}

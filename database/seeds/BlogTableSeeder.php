<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blogs')->insert([
            [
                'title' => 'Bài viết 1',
                'slug' => 'bai-viet-1',
                'image' => 'image.png',
                'image_path' => 'image.png',
                'teaser' => 'tóm tắt bài viết 1',
                'content' => 'nội dung bài viết 1',
                'active' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bài viết 2',
                'slug' => 'bai-viet-2',
                'image' => 'image.png',
                'image_path' => 'image.png',
                'teaser' => 'tóm tắt bài viết 2',
                'content' => 'nội dung bài viết 2',
                'active' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bài viết 3',
                'slug' => 'bai-viet-3',
                'image' => 'image.png',
                'image_path' => 'image.png',
                'teaser' => 'tóm tắt bài viết 3',
                'content' => 'nội dung bài viết 3',
                'active' => 0,
                'category_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bài viết 4',
                'slug' => 'bai-viet-4',
                'image' => 'image.png',
                'image_path' => 'image.png',
                'teaser' => 'tóm tắt bài viết 4',
                'content' => 'nội dung bài viết 4',
                'active' => 1,
                'category_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bài viết 5',
                'slug' => 'bai-viet-5',
                'image' => 'image.png',
                'image_path' => 'image.png',
                'teaser' => 'tóm tắt bài viết 5',
                'content' => 'nội dung bài viết 5',
                'active' => 0,
                'category_id' => 2,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bài viết 6',
                'slug' => 'bai-viet-6',
                'image' => 'image.png',
                'image_path' => 'image.png',
                'teaser' => 'tóm tắt bài viết 6',
                'content' => 'nội dung bài viết 6',
                'active' => 1,
                'category_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bài viết 7',
                'slug' => 'bai-viet-7',
                'image' => 'image.png',
                'image_path' => 'image.png',
                'teaser' => 'tóm tắt bài viết 7',
                'content' => 'nội dung bài viết 7',
                'active' => 1,
                'category_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Bài viết 8',
                'slug' => 'bai-viet-8',
                'image' => 'image.png',
                'image_path' => 'image.png',
                'teaser' => 'tóm tắt bài viết 8',
                'content' => 'nội dung bài viết 8',
                'active' => 1,
                'category_id' => 3,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);

    }
}

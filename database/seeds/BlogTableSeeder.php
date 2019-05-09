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
                'title' => 'Giá Vàng, USD tiếp tục tăng mạnh 1',
                'slug' => 'bai-viet-1',
                'image' => 'blog1.jpg',
                'image_path' => 'image.png',
                'teaser' => 'Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD',
                'content' => 'nội dung bài viết 1',
                'active' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Giá Vàng, USD tiếp tục tăng mạnh 2',
                'slug' => 'bai-viet-2',
                'image' => 'blog2.jpg',
                'image_path' => 'image.png',
                'teaser' => 'Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD',
                'content' => 'nội dung bài viết 2',
                'active' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Giá Vàng, USD tiếp tục tăng mạnh 3',
                'slug' => 'bai-viet-3',
                'image' => 'blog3.jpg',
                'image_path' => 'image.png',
                'teaser' => 'Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD',
                'content' => 'nội dung bài viết 3',
                'active' => 0,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Giá Vàng, USD tiếp tục tăng mạnh 4',
                'slug' => 'bai-viet-4',
                'image' => 'blog4.jpg',
                'image_path' => 'image.png',
                'teaser' => 'Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD',
                'content' => 'nội dung bài viết 4',
                'active' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Giá Vàng, USD tiếp tục tăng mạnh 5',
                'slug' => 'bai-viet-5',
                'image' => 'blog1.jpg',
                'image_path' => 'image.png',
                'teaser' => 'Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD',
                'content' => 'nội dung bài viết 5',
                'active' => 0,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Giá Vàng, USD tiếp tục tăng mạnh 6',
                'slug' => 'bai-viet-6',
                'image' => 'blog2.jpg',
                'image_path' => 'image.png',
                'teaser' => 'Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD',
                'content' => 'nội dung bài viết 6',
                'active' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Giá Vàng, USD tiếp tục tăng mạnh 7',
                'slug' => 'bai-viet-7',
                'image' => 'blog3.jpg',
                'image_path' => 'image.png',
                'teaser' => 'Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD',
                'content' => 'nội dung bài viết 7',
                'active' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Giá Vàng, USD tiếp tục tăng mạnh 8',
                'slug' => 'bai-viet-8',
                'image' => 'blog4.jpg',
                'image_path' => 'image.png',
                'teaser' => 'Giá vàng miếng SJC tiếp tục tăng mạnh trong buổi chiều 12/8 , tiến sát mốc 34 triệu đồng/ lượng , tỏng khi giá USD trên thị trường tự do cũng vượt mốc 22.000 đồng/USD',
                'content' => 'nội dung bài viết 8',
                'active' => 1,
                'category_id' => 1,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);

    }
}

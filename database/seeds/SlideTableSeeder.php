<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SlideTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('slides')->insert([
            [
                'title' => 'Slide 1',
                'slug' => 'slide-1',
                'image' => 'slide1.jpg',
                'image_path' => 'image.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Slide 2',
                'slug' => 'slide-2',
                'image' => 'slide2.jpg',
                'image_path' => 'image.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Slide 3',
                'slug' => 'slide-3',
                'image' => 'slide3.jpg',
                'image_path' => 'image.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Slide 4',
                'slug' => 'slide-4',
                'image' => 'slide1.jpg',
                'image_path' => 'image.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Slide 5',
                'slug' => 'slide-5',
                'image' => 'slide2.jpg',
                'image_path' => 'image.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Slide 6',
                'slug' => 'slide-6',
                'image' => 'slide3.jpg',
                'image_path' => 'image.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Slide 7',
                'slug' => 'slide-7',
                'image' => 'slide1.jpg',
                'image_path' => 'image.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'title' => 'Slide 8',
                'slug' => 'slide-8',
                'image' => 'slide1.jpg',
                'image_path' => 'image.png',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);

    }
}

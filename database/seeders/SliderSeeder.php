<?php

namespace Database\Seeders;

use App\Models\Admin\Slider;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::query()->create([
            'text' => 'Slider 1',
            'description' => 'Slider 1',
            'cta' => 'Slider 1',
            'image' =>new UploadedFile(public_path('assets/images/home/slider-image.svg'), 'logo.svg'),
        ]);
        Slider::query()->create([
            'text' => 'Slider 2',
            'description' => 'Slider 2',
            'cta' => 'Slider 2',
            'image' =>new UploadedFile(public_path('assets/images/home/slider-image.svg'), 'logo.svg'),
        ]);
        Slider::query()->create([
            'text' => 'Slider 3',
            'description' => 'Slider 3',
            'cta' => 'Slider 3',
            'image' =>new UploadedFile(public_path('assets/images/home/slider-image.svg'), 'logo.svg'),
        ]);
    }
}

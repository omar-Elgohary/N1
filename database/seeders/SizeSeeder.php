<?php
namespace Database\Seeders;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    public function run()
    {
        Size::create([
            'size' => 'S',
        ]);

        Size::create([
            'size' => 'M',
        ]);

        Size::create([
            'size' => 'L',
        ]);

        Size::create([
            'size' => 'XL',
        ]);

        Size::create([
            'size' => '2XL',
        ]);

        Size::create([
            'size' => '3XL',
        ]);
    }
}

<?php
namespace Database\Seeders;
use App\Models\Extra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExtraSeeder extends Seeder
{
    public function run()
    {
        Extra::create([
            'name' => 'صوص',
        ]);

        Extra::create([
            'name' => 'بطاطس',
        ]);

        Extra::create([
            'name' => 'جبن',
        ]);

        Extra::create([
            'name' => 'خيار',
        ]);

        Extra::create([
            'name' => 'كاتشب',
        ]);
    }
}

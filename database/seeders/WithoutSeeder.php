<?php
namespace Database\Seeders;
use App\Models\Without;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WithoutSeeder extends Seeder
{
    public function run()
    {
        Without::create([
            'name' => 'بصل',
        ]);

        Without::create([
            'name' => 'طماطم',
        ]);

        Without::create([
            'name' => 'جبن',
        ]);

        Without::create([
            'name' => 'خيار',
        ]);

        Without::create([
            'name' => 'كاتشب',
        ]);
    }
}

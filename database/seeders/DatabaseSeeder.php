<?php
namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            BrancheSeeder::class,
            DepartmentSeeder::class,
            CreateUserSeeder::class,
            ExtraSeeder::class,
            WithoutSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ProductSeeder::class,
            MealSeeder::class,
            CouponSeeder::class,
            PackageSeeder::class,
            OfferSeeder::class,
        ]);
    }
}

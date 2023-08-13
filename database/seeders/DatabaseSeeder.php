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
            DepartmentSeeder::class,
            BrancheSeeder::class,
            CreateUserSeeder::class,
            ExtraSeeder::class,
            WithoutSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            RestaurentMealSeeder::class,
            ShopProductSeeder::class,
            MealSeeder::class,
            CouponSeeder::class,
            PackageSeeder::class,
            OfferSeeder::class,
            RestaurentOrderSeeder::class,
            RestaurentPurchaseSeeder::class,
            ShopOrderSeeder::class,
            ShopPurchaseSeeder::class,
            ReservationTypeSeeder::class,
            EventSeeder::class,
            EventOrderSeeder::class,
            RateSeeder::class,
            BrancheRateSeeder::class,
            CommentSeeder::class,
        ]);
    }
}

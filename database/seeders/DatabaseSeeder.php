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
            CouponSeeder::class,
            WithoutSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            ColorSeeder::class,
            SizeSeeder::class,
            RestaurentMealSeeder::class,
            ShopProductSeeder::class,
            MealSeeder::class,
            PackageSeeder::class,
            OfferSeeder::class,
            RestaurentOrderSeeder::class,
            RestaurentPurchaseSeeder::class,
            MealRateSeeder::class,
            ShopOrderSeeder::class,
            ShopPurchaseSeeder::class,
            ShopPurchaseSeeder::class,
            ProductRateSeeder::class,
            EventSeeder::class,
            EventOrderSeeder::class,
            EventRateSeeder::class,
            ReservationTypeSeeder::class,
            BrancheRateSeeder::class,
            CommentSeeder::class,
        ]);
    }
}

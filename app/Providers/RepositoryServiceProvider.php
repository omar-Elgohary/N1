<?php
namespace App\Providers;
use CouponRepository;
use PackageRepository;
use App\Repositories\SellerRepository;
use Illuminate\Support\ServiceProvider;
use App\Interfaces\CouponRepositoryInterface;
use App\Interfaces\SellerRepositoryInterface;
use App\Interfaces\PackageRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);

        $this->app->bind(CouponRepositoryInterface::class, CouponRepository::class);

        $this->app->bind(SellerRepositoryInterface::class, SellerRepository::class);
    }

    public function boot()
    {
        //
    }
}

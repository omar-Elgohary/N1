<?php
namespace App\Repositories;
use App\Interfaces\PackageRepositoryInterface;
use App\Models\Package;

class PackageRepository implements PackageRepositoryInterface
{
    public function getAllPackages()
    {
        return Package::all();
    }

}

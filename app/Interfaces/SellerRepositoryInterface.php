<?php
namespace App\Interfaces;
use Illuminate\Http\Request;

interface SellerRepositoryInterface
{
    public function editSellerInfo(Request $request, $id);
}

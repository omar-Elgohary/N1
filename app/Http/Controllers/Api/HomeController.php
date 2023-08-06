<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Models\Department;

class HomeController extends Controller
{
    use ApiResponseTrait;

    public function home()
    {
        try {
            $departments = Department::get();


            return $this->returnData(200, 'Reached Home Page Successfully', compact('departments'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

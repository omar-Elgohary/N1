<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurentProduct extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'images' => 'required',
    //         'images.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    //     ]);
      
    //     $images = [];
    //     if ($request->images){
    //         foreach($request->images as $key => $image)
    //         {
    //             $imageName = time().rand(1,99).'.'.$image->extension();  
    //             $image->move(public_path('images'), $imageName);
  
    //             $images[]['name'] = $imageName;
    //         }
    //     }
  
    //     foreach ($images as $key => $image) {
    //         Image::create($image);
    //     }
      
    //     return back()
    //             ->with('success','You have successfully upload image.')
    //             ->with('images', $images); 
    // }



    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //             'filenames' => 'required',
    //             'filenames.*' => 'image'
    //     ]);
  
    //     $files = [];
    //     if($request->hasfile('filenames'))
    //      {
    //         foreach($request->file('filenames') as $file)
    //         {
    //             $name = time().rand(1,50).'.'.$file->extension();
    //             $file->move(public_path('files'), $name);  
    //             $files[] = $name;  
    //         }
    //      }
  
    //      $file= new File();
    //      $file->filenames = $files;
    //      $file->save();
  
    //     return back()->with('success', 'Images are successfully uploaded');
    // }
}

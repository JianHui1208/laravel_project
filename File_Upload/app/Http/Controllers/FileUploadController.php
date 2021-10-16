<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
class FileUploadController extends Controller
{
    // function to store file in 'upload' folder
    public function fileStore(Request $request)
    {
        $upload_path = public_path('upload');
        $file_name = $request->file->getClientOriginalName();
        $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();
        $request->file->move($upload_path, $generated_new_name);
         
        $insert['title'] = $generated_new_name;
        $check = Photo::insertGetId($insert);
        return response()->json(['success' => 'You have successfully uploaded "' . $file_name . '"']);
    }

    public function show()
    {
        $photo = Photo::all();
        return view('view')->with('photos',$photo);
    }
}

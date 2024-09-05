<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageUploadController extends Controller
{
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            return response()->json(['url' => asset('images/' . $imageName)]);
        }
        return response()->json(['error' => 'No image uploaded'], 400);
    } //End Method

    
    public function deleteImage(Request $request)
    {
        $path = public_path('images/' . basename($request->input('path')));
        if (file_exists($path)) {
            unlink($path);

            // Check if the folder is empty and delete it
            $folderPath = dirname($path);
            if (count(glob("$folderPath/*")) === 0) {
                rmdir($folderPath);
            }

            return response()->json(['success' => 'Image and folder deleted']);
        }
        return response()->json(['error' => 'Image not found'], 404);
    } //End Method
}

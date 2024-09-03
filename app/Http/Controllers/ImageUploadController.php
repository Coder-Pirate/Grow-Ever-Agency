<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->move(public_path('images'), $file->getClientOriginalName());
            return response()->json(['link' => asset('images/' . $file->getClientOriginalName())]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    } //End Method

    public function loadImages()
    {
        $files = File::files(public_path('images'));
        $images = [];

        foreach ($files as $file) {
            $images[] = [
                'url' => asset('images/' . $file->getFilename()),
                'thumb' => asset('images/' . $file->getFilename()),
                'tag' => 'image'
            ];
        }

        return response()->json($images);
    } //End Method

    public function delete(Request $request)
    {
        $src = $request->input('src');
        $path = public_path('images/' . basename($src));

        if (File::exists($path)) {
            File::delete($path);
            return response()->json(['message' => 'Image deleted successfully.']);
        }

        return response()->json(['error' => 'Image not found.'], 404);
    } //End Method
}

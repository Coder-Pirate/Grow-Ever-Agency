<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class ImageUploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $path = $file->store('images', 'public');
            return response()->json(['link' => asset('storage/' . $path)]);
        }
        return response()->json(['error' => 'No file uploaded.'], 400);
    } //End Method

    public function loadImages()
    {
        $files = Storage::disk('public')->files('images');
        $images = [];

        foreach ($files as $file) {
            $images[] = [
                'url' => asset('storage/' . $file),
                'thumb' => asset('storage/' . $file),
                'tag' => 'image'
            ];
        }

        return response()->json($images);
    } //End Method

    public function delete(Request $request)
    {
        $src = $request->input('src');
        $path = str_replace(asset('storage'), '', $src);
        $path = ltrim($path, '/');

        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['message' => 'Image deleted successfully.']);
        }

        return response()->json(['error' => 'Image not found.'], 404);
    } //End Method


}

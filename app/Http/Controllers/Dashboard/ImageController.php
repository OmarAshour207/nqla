<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function uploadPhoto(Request $request)
    {
        $imagePath = 'uploads/temp/' . $request->get('path') . '/';
        if (!File::exists($imagePath))
            File::makeDirectory($imagePath, 0777, true, true);

        Image::make($request->image)
                ->resize($request->width, $request->height)
                ->encode('jpg')->save(public_path($imagePath . $request->image->hashName()));

        Image::make($request->image)
                ->resize(100, 100)
                ->encode('jpg')->save(public_path($imagePath . 'thumb_' . $request->image->hashName()));

        $media = Media::create([
            'name'  => $request->image->hashName(),
            'type'  => $request->get('path')
        ]);

        return $media->id;
    }

    public function removePhoto(Request $request)
    {
        if($request->get('image') != 'avatar.png') {
            if (is_numeric($request->get('image'))) {
                $media = Media::where('id', $request->get('image'))->first();
                if ($media) {
                    File::delete(public_path('uploads/temp/' . $media->type . '/' . $media->name));
                    File::delete(public_path('uploads/temp/' . $media->type . '/thumb_' . $media->name));
                    $media->delete();
                }
            } else {
                File::delete(public_path('/uploads/' . $request->path .'/'. $request->image));
                File::delete(public_path('/uploads/' . $request->path .'/thumb_'. $request->image));
            }
        }
        return response()->json([
            'success'   => true
        ]);
    }
}

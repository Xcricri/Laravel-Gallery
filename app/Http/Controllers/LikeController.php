<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Photo;

class LikeController extends Controller
{
    public function likePhoto(Request $request, $id)
    {
        $photo = Photo::find($id);

        if (!$photo) {
            return response()->json(['message' => 'Photo not found'], 404);
        }

        $photo->likes += 1;
        $photo->save();

        return response()->json(['message' => 'Photo liked successfully', 'likes' => $photo->likes], 200);
    }
}

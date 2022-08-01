<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Services\StorageService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class TinyMceEditorController extends Controller
{
    use StorageService;

    /**
     * uploadImage
     *
     * @param  mixed $request
     * @return void
     */
    public function uploadImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:png,jpg,jpeg|max:4000',
            'imageOldUrl' => 'nullable|string',
        ]);

        // return form validation error with json if error occured
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Error occured',
                'errors' => $validator->getMessageBag(),
            ], 422);
        }

        $data = $validator->validated();

        // get old image url and separate with array
        // check old image origianl path is exists or not
        $imageOldPathArray = explode('uploads/', $data['imageOldUrl']);
        array_key_exists(1, $imageOldPathArray) ? $imageOldPath = $imageOldPathArray[1] : $imageOldPath = null;

        $imagePath = $this->uploadFile($data['image'], 'tinymce', $imageOldPath);

        return response()->json([
            'success' => true,
            'message' => 'Image uploaded successfully!',
            'imageUrl' => Storage::url($imagePath),
        ]);
    }
}

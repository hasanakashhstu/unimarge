<?php
namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Throwable;

trait StorageService
{
    public function uploadFile($file, $path = '', $oldFilePath = null)
    {
        // file not exist
        try {
            if(! $file->isValid()) {
                return false;
            }
        } catch(Throwable $e) {
            return false;
        }

        // get file extension
        $extension = $file->extension();

        // set file name and upload
        $fileName     = time() . '-' . Str::random(30) . '.' . $extension;
        $path = $path . date('/Y/m/d');
        $uploadedPath = Storage::putFileAs($path, $file, $fileName);

        // delete old picture if exist
        $oldFilePath && Storage::delete($oldFilePath);

        return $uploadedPath;
    }
}
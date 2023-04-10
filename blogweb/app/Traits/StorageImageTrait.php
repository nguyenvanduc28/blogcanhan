<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
trait StorageImageTrait {
    public function storageImage($request, $fieldName, $forderName) {
        if (!$request->hasFile($fieldName))
        return null;

        $file = $request->feature_image_path;
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(20). '.' . $file->getClientOriginalExtension();
        $filePath = $request->file($fieldName)->storeAs('public/' . $forderName, $fileNameHash);
        $data = [
            'file_name' => $fileNameOrigin,
            'file_path' => Storage::url($filePath)
        ];
        return $data;
    }
}
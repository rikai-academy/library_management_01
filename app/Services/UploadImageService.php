<?php
namespace App\Services;

Class UploadImageService{

    public function upload_image($image){

        $file = $image;
        $ext = $image->extension();
        $image_result = time() . '-' . 'book.' . $ext;
        $file->move(public_path('uploads'), $image_result);

        return $image_result;
    }
}

<?php

namespace App\Traits;

trait UploadFile
{
    //
    
    public function upload($imageFile, $path){
        $imgExt = $imageFile->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        
        $imageFile->move(public_path($path), $fileName);
        return $fileName;
    }/*
    public function upload($imageFile, $path)
    {
        $imgExt = $imageFile->getClientOriginalExtension();
        $fileName = time() . '.' . $imgExt;
        
        $imageFile->move(public_path($path), $fileName);
        return $fileName;
    }*/
}

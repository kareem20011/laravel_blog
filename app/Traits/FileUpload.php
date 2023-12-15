<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

trait FileUpload {

    public function upload($file){
        $image = 'dashboard/uploads/'. time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('dashboard/uploads/'), $image);
        return $image;
    }
    
}

<?php

namespace App\Http\Helper;

trait CustomTrait
{

    /**
     *
     * @param file $file
     * @return string $fileName
     */
    public function uploadFile($file) : string{
        $fileName = time() . ".". $file->getClientOriginalExtension();
        $file->storePubliclyAs("upload",$fileName);
        return 'upload/'.$fileName;
    }
}

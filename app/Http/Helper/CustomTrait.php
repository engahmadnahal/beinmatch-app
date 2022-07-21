<?php

namespace App\Http\Helper;

use App\Jobs\UploadFileJob;
use Illuminate\Support\Facades\Storage;

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
        // UploadFileJob::dispatch($file)->onQueue('upload');
        return 'upload/'.$fileName;
    }
}

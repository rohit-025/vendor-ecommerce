<?php

namespace App\Shop\Tools;

use Illuminate\Http\UploadedFile;

trait UploadableTrait
{
    /**
     * Upload a single file in the server
     *
     * @param UploadedFile $file
     * @param null $folder
     * @param string $disk
     * @param null $filename
     * @return false|string
     */
    public function uploadOne(UploadedFile $file, $folder = null)
    {
        $fileName = uniqid() . time() . '.' . str_replace(' ', '_', $file->getClientOriginalName());

        $path = '/uploads/'.$folder;

        $file->move(public_path($path), $fileName);

        return $path."/".$fileName;
    }

    /**
     * @param UploadedFile $file
     *
     * @param string $folder
     * @param string $disk
     *
     * @return false|string
     */
    public function storeFile(UploadedFile $file, $folder = null, $disk = 'public')
    {
        return $file->store($folder, ['disk' => $disk]);
    }
}

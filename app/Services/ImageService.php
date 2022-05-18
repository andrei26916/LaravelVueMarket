<?php


namespace App\Services;


use App\Image;
use Illuminate\Support\Facades\DB;

use phpDocumentor\Reflection\File;

use function Symfony\Component\Translation\t;

class ImageService
{

    /**
     * @param int $id
     * @return mixed
     */
    public function getById(int $id)
    {
        return Image::find($id);
    }

    /**
     * @param string $name
     * @return mixed
     */
    public function getByName(string $name)
    {
        return Image::where('name', $name)->first();
    }


    /**
     * @param $image
     * @param string $type
     * @return mixed
     */
    public function upload($image, $type = 'products')
    {
        return $image->store($type);
    }


}

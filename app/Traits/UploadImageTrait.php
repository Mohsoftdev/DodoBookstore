<?php

namespace App\Traits;
use Intervention\Image\Image as Image;

trait UploadImageTrait
{
    protected $image_path = "app/public/images";
    protected $image_height = 425;
    protected $image_width = 282;

    public function uploadCoverImage($img)
    {
        $img_name = $this->imageName($img);

        Image::make($img)->resize($this->img_width, $this->image_height)->save(storage_path($this->image_path. '/' . $img_name));

        return 'images/' . $img_name;

    }

    public function imageName($image)
    {

        return time().'-'.$image->getClientOriginalName();

    }
}

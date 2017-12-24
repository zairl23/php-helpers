<?php 

namespace Ney\Helpers;

use Intervention\Image\Image as BaseImage;

class Image 
{

    public $image;

    public static function from($from)
    {
        
        $instance  = new static;

        $instance->image = BaseImage::make($from);

        return $instance;

    }

    public function paste($image, $position, $x=0, $y=0)
    {

        return $this->image->insert($image, $position, $x, $y);
    
    }
}
<?php


namespace App\Twill\Capsules\Base\Models\Behaviours;

trait HasHeading
{

    public function getHeadingAttribute($value)
    {
        if ($value) {
            return $value;
        } else {
            return $this->title;
        }
    }

}

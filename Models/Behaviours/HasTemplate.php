<?php


namespace App\Twill\Capsules\Base\Models\Behaviours;

use App\Twill\Capsules\Base\Models\Template;

trait HasTemplate {

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

}

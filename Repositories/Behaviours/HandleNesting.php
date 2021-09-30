<?php

namespace App\Twill\Capsules\Base\Repositories\Behaviours;

use Illuminate\Support\Facades\DB;

trait HandleNesting
{

    public function setNewOrder($ids)
    {
        DB::transaction(function () use ($ids) {
            $this->model::saveTreeFromIds($ids);
        }, 3);
    }

}


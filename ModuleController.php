<?php

namespace App\Twill\Capsules\Base;

use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use A17\Twill\Http\Controllers\Admin\ModuleController as TwillModuleController;
use Illuminate\Support\Facades\Config;

class ModuleController extends TwillModuleController
{
    public function __construct(Application $app, Request $request)
    {
        parent::__construct($app, $request);

        $this->defaultOrders = [$this->titleColumnKey => 'asc'];
    }

    protected function getPermalinkBaseUrl()
    {
        $appUrl = Config::get('app.url');

        if (blank(parse_url($appUrl)['scheme'] ?? null)) {
            $appUrl = $this->request->getScheme() . '://' . $appUrl;
        }

        return $appUrl . '/'
            . ($this->moduleHas('translations') && (count( config('translatable.locales') ) > 1) ? '{language}/' : '')
                . ($this->moduleHas('revisions') ? '{preview}/' : '')
                . ($this->permalinkBase ?? $this->getModulePermalinkBase())
                . (isset($this->permalinkBase) && empty($this->permalinkBase) ? '' : '/');
    }
}

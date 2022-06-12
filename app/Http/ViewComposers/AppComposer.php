<?php

namespace App\Http\ViewComposers;

use App\Models\Category;
use Illuminate\View\View;

class AppComposer
{
    public function compose(View $view) {

        $view->with('categories', Category::where('is_online',1)->get());
    }
}

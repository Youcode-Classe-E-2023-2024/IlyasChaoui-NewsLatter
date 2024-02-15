<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class table-medias extends Component
{
//    public $medias;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
//        $this->medias = $medias;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.table-medias');
    }
}

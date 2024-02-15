<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class subscribeTable extends Component
{
    /**
     * Create a new component instance.
     */
    public $emails;

    public function __construct($emails)
    {
        $this->emails = $emails;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.subscribe-table');
    }
}

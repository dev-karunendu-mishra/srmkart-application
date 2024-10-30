<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class StatusUpdateControl extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $currentState, public $updateRoute, public $record, public $statusOptions)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.status-update-control');
    }
}

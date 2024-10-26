<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AllRecords extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $records, public $columns, public $enableActionColumn, public $model, public $id = 'example')
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.all-records');
    }
}

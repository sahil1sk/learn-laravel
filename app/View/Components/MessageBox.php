<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MessageBox extends Component
{
    public $name;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return <<<'blade'
            <div>
                Inline Component:
                Data: {{ $name }} <br>
                Slot Data: {{ $slot }} <br>
                Title Slot: {{ $title }}
            </div>
        blade;
    }
}

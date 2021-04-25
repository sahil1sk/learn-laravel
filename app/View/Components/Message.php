<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Message extends Component
{
    public $type;
    public $message;
    public $page;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $message, $page)
    {
        $this->type = $type;
        $this->message = $message;
        $this->page = $page;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.message');
    }
}

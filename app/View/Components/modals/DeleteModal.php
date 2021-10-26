<?php

namespace App\View\Components\modals;

use Illuminate\View\Component;

class DeleteModal extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $key,
        public $itemName,
        public $id
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modals.delete-modal');
    }
}

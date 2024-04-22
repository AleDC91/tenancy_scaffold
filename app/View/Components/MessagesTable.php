<?php

namespace App\View\Components;

use App\Models\Message;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MessagesTable extends Component
{
    /**
     * Create a new component instance.
     */

     public $messages;
    public function __construct()
    {
        $this->messages = Message::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.messages-table', ['messages' => $this->messages]);
    }
}

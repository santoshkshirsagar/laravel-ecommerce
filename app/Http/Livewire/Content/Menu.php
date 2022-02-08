<?php

namespace App\Http\Livewire\Content;

use Livewire\Component;
use App\Models\ContentBlock;

class Menu extends Component
{
    public $blocks;
    
    public function mount()
    {
        $this->blocks=ContentBlock::get();
    }
    public function render()
    {
        return view('livewire.content.menu');
    }
}

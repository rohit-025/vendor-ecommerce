<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QuickLook extends Component
{
    // protected $listeners = ['overview' => 'show'];
    
    // public $product;

    // public $show = false;

    // public function show($product)
    // {
    //     // dd(1);
    //     $this->product = $product;

    //     $this->emit('toggleQuickLookModal');
    // }

    public function hide(){
        $this->show = false;
    }

    
    public function render()
    { 
        return view('livewire.quick-look');
    }
}

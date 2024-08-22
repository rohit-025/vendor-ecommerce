<?php

namespace App\Http\Livewire;

use App\Shop\Carts\CustomCart;
use App\Shop\Categories\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    protected $listeners = ['itemAdded' => 'update'];


    public $count;

    public $categories;

    public function update(){
        $this->render();
    }

    public function render()
    {
        if(Auth::check())
        $this->count = CustomCart::where('customer_id',Auth::id())->count();

        $this->categories = Category::where('status',1)->where('parent_id',null)->get();

        return view('livewire.header');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;

class CartIconComponent extends Component
{
    protected $listeners = ['refreshComponent' => '$refresh'];
    public function render()
    {
        return view('livewire.cart-icon-component');
    }
}

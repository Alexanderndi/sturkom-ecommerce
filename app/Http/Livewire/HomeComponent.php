<?php

namespace App\Http\Livewire;

use App\Models\HomeSlidder;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $slidders = HomeSlidder::where('status',1)->get();
        return view('livewire.home-component', ['slidders'=>$slidders]);
    }
}

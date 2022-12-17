<?php

namespace App\Http\Livewire;

use App\Models\HomeSlidder;
use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $slidders = HomeSlidder::where('status',1)->get();
        $latest_products = Product::orderBy('created_at', 'DESC')->get()->take(10);
        return view('livewire.home-component', ['slidders'=>$slidders, 'latest_products'=>$latest_products]);
    }
}

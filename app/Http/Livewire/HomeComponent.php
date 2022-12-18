<?php

namespace App\Http\Livewire;

use App\Models\HomeSlidder;
use App\Models\Product;
use Livewire\Component;
use Cart;

class HomeComponent extends Component
{
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('\App\Models\Product');
        session()->flash('success_message', "Item added into Cart");
        $this->emitTo('cart-icon-component', 'refreshComponent');
        return redirect()->route('shop.cart');
    }
    public function render()
    {
        $slidders = HomeSlidder::where('status',1)->get();
        $latest_products = Product::orderBy('created_at', 'DESC')->get()->take(10);
        $featured_products = Product::where('featured', 1)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component', ['slidders'=>$slidders, 'latest_products'=>$latest_products, 'featured_products'=>$featured_products]);
    }
}

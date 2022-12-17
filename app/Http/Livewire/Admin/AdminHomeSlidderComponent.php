<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlidder;
use Livewire\Component;

class AdminHomeSlidderComponent extends Component
{
    public $slidder_id;

    public function deleteSlidder()
    {
        $slidder = HomeSlidder::find($this->slidder_id);
        unlink('assets/imgs/slidders/' . $slidder->image);
        $slidder->delete();
        session()->flash('message', 'Slidder has been deleted Successfully!');
    }
    public function render()
    {
        $slidders = HomeSlidder::orderBy('created_at', 'DESC')->get();
        return view('livewire.admin.admin-home-slidder-component', ['slidders'=>$slidders]);
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlidder;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSlidderComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $status;
    public $image;
    public $link;

    public function addSlidder()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'status' => 'required',
            'image' => 'required',
            'link' => 'required'
        ]);

        $slidder = new HomeSlidder();
        $slidder->top_title = $this->top_title;
        $slidder->title = $this->title;
        $slidder->sub_title = $this->sub_title;
        $slidder->offer = $this->offer;
        $slidder->status = $this->status;
        $slidder->link = $this->link;
        $imageName = Carbon::now()->timestamp .'.'.$this->image->extension();
        $this->image->storeAs('slidders', $imageName);
        $slidder->image = $imageName;
        $slidder->save();
        session()->flash('message', 'Slidder has been added');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-home-slidder-component');
    }
}

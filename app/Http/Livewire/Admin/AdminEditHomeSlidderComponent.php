<?php

namespace App\Http\Livewire\Admin;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HomeSlidder;
use Livewire\WithFileUploads;

class AdminEditHomeSlidderComponent extends Component
{
    use WithFileUploads;
    public $top_title;
    public $title;
    public $sub_title;
    public $offer;
    public $status;
    public $image;
    public $link;
    public $slidder_id;
    public $newimage;

    public function mount($slidder_id)
    {
        $slidder = HomeSlidder::find($slidder_id);
        $this->top_title = $slidder->top_title;
        $this->title = $slidder->title;
        $this->sub_title = $slidder->sub_title;
        $this->offer = $slidder->offer;
        $this->status = $slidder->status;
        $this->link = $slidder->link;
        $this->image = $slidder->image;
        $this->slidder_id = $slidder->id;
    }

    public function updateSlidder()
    {
        $this->validate([
            'top_title' => 'required',
            'title' => 'required',
            'sub_title' => 'required',
            'offer' => 'required',
            'status' => 'required',
            'link' => 'required'
        ]);

        $slidder = HomeSlidder::find($this->slidder_id);
        $slidder->top_title = $this->top_title;
        $slidder->title = $this->title;
        $slidder->sub_title = $this->sub_title;
        $slidder->offer = $this->offer;
        $slidder->status = $this->status;
        $slidder->link = $this->link;
        if($this->newimage)
        {
            unlink('assets/imgs/slidders/' . $slidder->image);
            $imageName = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('sliders', $imageName);
            $slidder->newimage = $imageName;
        }
        $slidder->save();
        session()->flash('message', 'Slidder has been updated');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slidder-component');
    }
}

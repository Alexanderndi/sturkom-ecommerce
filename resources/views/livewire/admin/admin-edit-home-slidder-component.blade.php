<div>
    <style>
        nav svg{
            height: 20px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="/" rel="nofollow">Home</a>
                    <span></span> Shop
                    <span></span> Edit Slidder
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    Edit Slidder
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.home.slidder') }}" class="btn btn-success float-end">All Slidders</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                            @endif
                            <form wire:submit.prevent="updateSlidder">
                                <div class="md-3 mt-3">
                                    <label for="top_title" class="form-label">Top Title</label>
                                    <input type="text" class="form-control" placeholder="Enter slidder top title" wire:model="top_title" />
                                    @error('top_title')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="md-3 mt-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" placeholder="Enter slidder title" wire:model="title"/>
                                    @error('title')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="md-3 mt-3">
                                    <label for="sub_title" class="form-label">Sub Title</label>
                                    <input type="text" class="form-control" placeholder="Enter slidder sub title" wire:model="sub_title"/>
                                    @error('sub_title')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="md-3 mt-3">
                                    <label for="offer" class="form-label">Offer</label>
                                    <input type="text" class="form-control" placeholder="Enter slidder offer" wire:model="offer"/>
                                    @error('offer')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="md-3 mt-3">
                                    <label for="link" class="form-label">Link</label>
                                    <input type="text" class="form-control" placeholder="Enter slidder link" wire:model="link"/>
                                    @error('link')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="md-3 mt-3">
                                    <label for="status" class="form-label">Slidder Status</label>
                                    <select class="form-select" wire:model="status">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                    @error('status')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                <div class="md-3 mt-3">
                                    <label for="newimage" class="form-label">Image</label>
                                    <input type="file" class="form-control" wire:model="newimage"/>
                                    @if ($newimage)
                                        <img src="{{$image->temporaryUrl()}}" width="100" />
                                    @else
                                        <img src="{{asset('assets/imgs/slidders')}}/{{$image}}" width="100">
                                    @endif
                                    @error('image')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary float-end">Update Slidder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>

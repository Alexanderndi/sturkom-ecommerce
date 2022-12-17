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
                    <span></span> All Slidders
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    All Slidders
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ route('admin.home.slidder.add') }}" class="btn btn-success float-end">
                                        Add New Slidder
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @if(Session::has('message'))
                                <div class="alert alert-success" role="alert">{{Session::get('message')}}</div>
                            @endif
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Top Title</th>
                                        <th>Title</th>
                                        <th>Sub Title</th>
                                        <th>Offer</th>
                                        <th>Link</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($slidders as $slidder)
                                        <tr>
                                            <td>{{++$i}}</td>
                                            <td><img src="{{ asset('assets/imgs/sliders')}}/{{ $slidder->image}}" width="80" /></td>
                                            <td>{{ $slidder->top_title}}</td>
                                            <td>{{ $slidder->title}}</td>
                                            <td>{{ $slidder->sub_title}}</td>
                                            <td>{{ $slidder->offer}}</td>
                                            <td>{{ $slidder->link}}</td>
                                            <td>{{ $slidder->status == 1 ? 'Active': 'Inactive'}}</td>
                                            <td>
                                                <a href="{{ route('admin.home.slidder.edit', ['slidder_id'=>$slidder->id ])}}" class="text-info">Edit</a>
                                                <a href="#" class="text-danger" onclick="deleteConfirmation({{$slidder->id}})" style="margin-left: 20px;">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
    </main>
</div>

<div class="modal" id="deleteConfirmation">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body pb-30 pt-30">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h4 class="pb-3">Do you want to DELETE this record?</h4>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#deleteConfirmation">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="deleteSlidder()">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        function deleteConfirmation(id)
        {
            @this.set('slidder_id',id);
            $('#deleteConfirmation').modal('show');
        }

        function deleteSlidder()
        {
            @this.call('deleteSlidder');
            $('#deleteConfirmation').modal('hide');
        }
    </script>
@endpush

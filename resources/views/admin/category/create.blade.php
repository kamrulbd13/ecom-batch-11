@extends('admin.master')
@section('body')
    <div class="col-lg-12 col-md-12">
        <div class="card mt-3">
            <div class="card-header border-bottom bg-light-lighter ">
                <h3 class="card-title " >New Category</h3>
            </div>
            <div class="card-body">
                    <p class=" text-center text-success">{{session('message')}}</p>
                <div class="row">
                    <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="col-lg-12">
                            <div class="p-2">
                                <div class="form-group">

                                    <input type="text" class="form-control" name="name" placeholder="Name" type="text">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image" placeholder="Image" type="password">
                                </div>
                                <div class="text-center">
                                    <a href="{{route('categories.index')}}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary" id='swal-success'>Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

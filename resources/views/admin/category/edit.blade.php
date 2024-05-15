@extends('admin.master')
@section('body')
    <div class="col-lg-12 col-md-12">
        <div class="card mt-3">
            <div class="card-header border-bottom bg-light-lighter ">
                <h3 class="card-title " >New Category</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <form action="{{route('categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                       @method('PUT')
                        @csrf
                        <div class="col-lg-12">
                            <div class="p-2">
                                <div class="form-group">

                                    <input type="text" class="form-control" name="name" value="{{$category->name}}" placeholder="Name" type="text">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image"  placeholder="Image">
                                    <img class="mt-2 rounded-2" src="{{asset($category->image)}}" alt="" style="width: 50px; height: 50px;">
                                </div>

                                <div class="text-center">
                                    <a href="{{route('categories.index')}}" class="btn btn-danger">Cancel</a>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('admin.master')
@section('body')
    <div class="col-lg-12 col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h3 class="card-title">New Sub-Category</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <form action="{{route('subCategories.store')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="col-lg-12">
                            <div class="p-2">
                                <div class="form-group">
                                    <label class="form-label">Expiration Date</label>
                                                <select class="form-control select2 form-select" name="category_id" data-placeholder="Category">
                                                    <option label="Choose one"></option>
                                                    @foreach($categories as $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                    @endforeach
                                                </select>
                                </div>
                                <div class="form-group">

                                    <input type="text" class="form-control" name="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image" placeholder="Image">
                                </div>
                                <a href="{{route('subCategories.index')}}" class="btn btn-danger">Cancel</a>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

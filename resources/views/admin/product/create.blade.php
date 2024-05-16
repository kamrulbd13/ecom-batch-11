@extends('admin.master')
@section('body')
    <div class="col-lg-12 col-md-12">
        <div class="card mt-3">
            <div class="card-header border-bottom bg-light-lighter ">
                <h3 class="card-title text-info " >New Product</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                       @csrf
                        <div class="col-lg-12">
                            <div class="form-group">
                                <select class="form-select" name="brand_id" id="">
                                    <option value="">Select Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col col-md-6">
                                        <div class="form-group">
                                            <select class="form-select" name="category_id" id="">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <select class="form-select" name="subCategory_id" id="">
                                            <option value="">Select Sub-Category</option>
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Product Name" >
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="code" placeholder="code" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="color" placeholder="color" >
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="size" placeholder="size" >
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="price" placeholder="Price" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="qty" placeholder="Quantity" >
                                    </div>
                                </div>
                            </div>
                                <div class="form-group">
                                    <textarea type="text" class="form-control" name="description" placeholder="Description"></textarea>
                                </div>

                                <div class="form-group">
                                    <div class="col-sm-12 col-md-4">
                                        <input type="file" class="dropify form-control" name="image" data-height="180" />
                                    </div>

                                </div>
                            <div class="form-group">
                                <input class="form-control" type="file" name="other_image[]" accept=" image/jpeg, image/png, " multiple />
                            </div>
                                <div class="text-center">
                                    <a href="{{route('product.index')}}" class="btn btn-danger">Cancel</a>
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

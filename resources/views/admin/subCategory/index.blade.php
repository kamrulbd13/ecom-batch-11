@extends('admin.master')
@section('body')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Sub Category Info</h3>
                    <a href="{{route('subCategories.create')}}" class="card-title btn btn-primary-gradient">Add New</a>
                </div>
                <div class="card-body">
                    <p class="text-muted">Using the most basic table markup.</p>
                    <div class="table-responsive">
                        <table class="table  border text-nowrap text-md-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $sl=1;
                            @endphp
                            @foreach($subCategories as $subCategory)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$subCategory->category->name}}</td>
                                    <td>{{$subCategory->name}}</td>
                                    <td>
                                        <img src="{{ asset($subCategory->image_path )}}" alt="{{$subCategory->name}}" height="50px" width="50px" class="rounded-2">
                                    </td>
                                    <td>
                                        {{$subCategory->status ? 'Active' : 'Inactive' }}
                                    </td>
                                    <td class="d-flex justify-content-center">

                                        <a href="{{route('subCategories.edit', $subCategory->id)}}" class="btn btn-primary me-2">Edit</a>





                                        @if($subCategory->status==1)
                                            <a href="{{route('subCategories.show', $subCategory->id)}}" class="btn btn-warning me-2">Inactive</a>
                                        @else
                                            <a href="{{route('subCategories.show', $subCategory->id)}}" class="btn btn-info me-2">Active</a>

                                        @endif

                                        <form action="{{route('subCategories.destroy',$subCategory->id)}}" method="POSt">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
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
    <!-- End Row -->

@endsection

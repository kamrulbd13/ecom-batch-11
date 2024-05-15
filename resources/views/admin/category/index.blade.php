@extends('admin.master')
@section('body')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Simple Table</h3>
                    <a href="{{route('categories.create')}}" class="card-title btn-primary-gradient btn-sm p-2">Add New</a>
                </div>
                <div class="card-body">
                    <p class=" text-center text-success " role="alert">
                        {{session('message')}}
                    </p>
                    <div class="table-responsive">
                        <table class="table  border text-nowrap text-md-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
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
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>
                                        <img src="{{ asset($category->image)}}" alt="{{$category->name}}" style="height: 50px; width: 50px;">
                                    </td>
                                    <td>
                                        {{$category->status ? 'Active' : 'Inactive'}}
                                    </td>
                                    <td class="d-flex justify-content-center">

                                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-primary me-2">Edit</a>

                                      @if($category->status==1)
                                            <a href="{{route('categories.show', $category->id)}}" class="btn btn-info me-2">Active</a>
                                        @else
                                            <a href="{{route('categories.show', $category->id)}}" class="btn btn-warning me-2">Inactive</a>
                                        @endif
                                            <form action="{{route('categories.destroy',$category->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete..')">Delete</button>
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

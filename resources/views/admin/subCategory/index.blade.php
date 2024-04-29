@extends('admin.master')
@section('body')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Simple Table</h3>
                    <a href="{{route('categories.create')}}" class="card-title">Add New</a>
                </div>
                <div class="card-body">
                    <p class="text-muted">Using the most basic table markup.</p>
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
                                        <img src="{{ asset($category->image )}}" alt="{{$category->name}}">
                                    </td>
                                    <td></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="" class="btn btn-primary me-2">Edit</a>
                                        <form action="" method="POSt">
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

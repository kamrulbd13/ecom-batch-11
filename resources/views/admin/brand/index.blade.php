@extends('admin.master')
@section('body')

    <!-- Row -->
    <div class="row row-sm">
        <div class="col-lg-12">
            <div class="card custom-card">
                <div class="card-header border-bottom justify-content-between">
                    <h3 class="card-title">Simple Table</h3>
                    <a href="{{route('brand.create')}}" class="card-title btn btn-primary-gradient btn-sm">Add New</a>
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
                            @foreach($brands as $brand)
                                <tr>
                                    <td>{{$sl++}}</td>
                                    <td>{{$brand->name}}</td>
                                    <td>
                                        <img src="{{ asset($brand->image )}}" alt="{{$brand->name}}" width="50px" height="50px" class="rounded-2">
                                    </td>
                                    <td>
                                        {{$brand->status==1 ? 'Active' : 'Inactive'}}
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="" class="btn btn-info me-2">View</a>
                                        <a href="{{route('brand.edit',$brand->id)}}" class="btn btn-primary me-2">Edit</a>

                                      @if($brand->status==1)

                                            <a href="{{route('brand.show',$brand->id)}}" class="btn btn-warning me-2">Inactive</a>
                                        @else
                                            <a href="{{route('brand.show',$brand->id)}}" class="btn btn-success me-2">Active</a>

                                          @endif
                                        <form action="{{route('brand.destroy', $brand->id)}}" method="POSt">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure!')">Delete</button>
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

@extends('admin.layout.master')
@section('category')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-center">
                <div class="col-3">
                    <h5><a href="" class="text-decoration-none text-success">Cateogry List</a></h5>
                </div>
                <div class="col-8">
                    <form class="float-right" action="{{url('search-categories')}}" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                            <div>
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                        <a href="{{url('categories/create')}}" class="btn btn-primary mt-3">+ Add New</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            @if (Session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="">
                </button>
            </div>
            @endif

            @if (Session('delete'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{Session('delete')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="">
                    </button>
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <img src="{{asset('storage/images/categories/'.$category->image)}}" alt="" width="100px" class="img-fluid">
                                </td>
                                <td style="width: 30%">
                                    <form action="{{url('categories/'.$category->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{route('categories.edit',$category->id)}}" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" type="submit">
                                            Edit
                                        </a>
                                        <button class="btn btn-danger" onclick="return confirm('Are you sure want to delete?')" data-toggle="tooltip" data-placement="top" title="Delete" type="submit">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

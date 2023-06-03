@extends('admin.layout.master')
@section('test')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-center">
                <div class="col-3">
                    <h5><a href="" class="text-decoration-none text-success">Test List</a></h5>
                </div>
                <div class="col-8">
                    <form class="float-right" action="" method="get">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search...">
                            <div>
                                <button class="btn btn-primary">Search</button>
                            </div>
                        </div>
                        <a href="{{url('tests/create')}}" class="btn btn-primary mt-3">+ Add New</a>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Deleted At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>test name</td>
                            <td>00:00:00</td>
                            <td>
                                <form action="" method="post">
                                    <a href="" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                        Edit
                                    </a>
                                    <button class="btn btn-danger" onclick="" data-toggle="tooltip" data-placement="top" title="Delete">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('admin.layout.master')
@section('test')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Test Edit Form</strong>
            <a href="{{url('tests')}}" class="btn btn-primary btn-sm ms-auto">Back</a>
        </div>
        <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label for="name">Test Name</label>
                <input class="form-control" name="name" id="name" type="text" placeholder="Enter test name" value="">
                <strong class="invalid-feedback">error will appear here</strong>
            </div>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit">
                <i class="bi bi-send-fill"></i> Submit
            </button>
            <button class="btn btn-sm btn-danger" type="reset">
                <i class="bi bi-x-circle"></i> Reset
            </button>
        </div>
        </form>
    </div>
</div>

@endsection

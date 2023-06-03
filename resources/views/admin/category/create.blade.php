@extends('admin.layout.master')
@section('category')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong>Category Create Form</strong>
                <a href="{{ url('categories') }}" class="btn btn-primary btn-sm ms-auto">Back</a>
            </div>
            <form action="{{ url('categories') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text"
                            placeholder="Enter Category Name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Photo</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">
                        @error('image')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                        Submit
                    </button>
                    <button class="btn btn-sm btn-danger" type="reset">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@extends('admin.layout.master')
@section('Category')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong>Category Edit Form</strong>
                <a href="{{ url('categories') }}" class="btn btn-primary btn-sm float-right">Back</a>
            </div>
            <form action="{{route('categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input class="form-control @error('name') is-invalid @enderror" name="name" id="name" type="text"
                            placeholder="Enter Category Name" value="{{$category->name ?? old('name')}}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="image">Photo</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="image">

                        <img src="{{asset('storage/images/categories/'.$category->image)}}" alt=""
                        width="100px" class="img-fluid ms-2 mt-2 border border-1 border-secondary">

                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer">
                    <button class="btn btn-sm btn-primary" type="submit">
                         Update
                    </button>
                    <button class="btn btn-sm btn-danger" type="reset">
                        Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

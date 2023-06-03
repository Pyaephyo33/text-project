@extends('admin.layout.master')
@section('Item')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <strong>Item Edit Form</strong>
                <a href="{{url('items')}}" class="btn btn-primary btn-sm float-right">Back</a>
            </div>
            <form action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="row">
                        <div class="col md-6">
                            <h4 class="fw-bold my-3">Item Information</h4>
                            <div class="form-group">
                                <label for="name">Item Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    id="name" type="text" placeholder="Enter Category Name"
                                    value="{{$item->name ?? old('name')}}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    <option value="{{$item->category_id}}" hidden>{{$item->category->name}}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" name="price" id="price"
                                    class="form-control @error('price') is-invalid @enderror" placeholder="Enter Price"
                                    value="{{ $item->price ?? old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">Price Required!</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <textarea name="description" id="description" rows="3"
                                    class="form-control @error('description') is-invalid @enderror" value="{{ $item->description ?? old('description') }}"></textarea>
                                @error('description')
                                    <div class="invalid-feedback">Description Required!</div>
                                @enderror
                            </div>

                            <label for="">Select Category Condition</label>
                            <div class="form-group">
                                <select class="form-select my-2 @error('item_condition') is-invalid @enderror"
                                    aria-label="Default select example" id="item_condition" name="item_condition"
                                    value="{{ $item->item_condition ?? old('item_condition') }}">
                                    <option value="" hidden>Select Category</option>
                                    <option value="new">New</option>
                                    <option value="used">Used</option>
                                    <option value="good-hand">Good Second Hand</option>
                                </select>
                                @error('item_condition')
                                    <div class="invalid-feedback">Item Condition Required!</div>
                                @enderror
                            </div>

                            <label for="">Select Item Type</label>
                            <div class="form-group">
                                <select class="form-select my-2 @error('item_type') is-invalid @enderror"
                                    aria-label="Default select example" name="item_type" id="item_type"
                                    value="{{ $item->item_type ?? old('item_type') }}">
                                    <option value="" hidden>Select Type</option>
                                    <option value="sell">For Sell</option>
                                    <option value="buy">For Buy</option>
                                    <option value="exchange">For Exchange</option>
                                </select>
                                @error('item_conditions')
                                    <div class="invalid-feedback">Item Condition Required!</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input type="file" class="form-control" name="image" id="image">
                                <img src="{{asset('storage/images/items/'. $item->image)}}" alt="" width="100px" class="img-fluid ms-2 mt-2 rounded">
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <div class="col-md-6">
                            <h4 class="fw-bold my-3">Owner Information</h4>
                            <div class="form-group">
                                <label for="owner_name">Owner Name</label>
                                <input class="form-control @error('owner_name') is-invalid @enderror" name="owner_name"
                                    id="owner_name" type="text" placeholder="Enter Onwer Name"
                                    value="{{ $item->owner_name ?? old('owner_name') }}">
                                @error('owner_name')
                                    <div class="invalid-feedback">Owner Name Required!</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="contact">Contact</label>
                                <input class="form-control @error('contact') is-invalid @enderror" name="contact"
                                    id="contact" type="text" placeholder="Enter Contact Number"
                                    value="{{ $item->contact ?? old('contact') }}">
                                @error('contact')
                                    <div class="invalid-feedback">Contact Number Required!</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="address">Address</label>
                                <textarea name="address" id="address" rows="3" class="form-control @error('address') is-invalid @enderror"
                                    value="{{ $item->address ?? old('address') }}"></textarea>
                                @error('contact')
                                    <div class="invalid-feedback">Address Required!</div>
                                @enderror
                            </div>

                            <div class="form-group my-3">
                                <div class="mapouter">
                                    <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no"
                                            marginheight="0" marginwidth="0"
                                            src="https://maps.google.com/maps?width=300&amp;height=250&amp;hl=en&amp;q=yangon&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                                            href="https://capcuttemplate.org/">Capcut Template</a></div>
                                    <style>
                                        .mapouter {
                                            position: relative;
                                            text-align: right;
                                            width: 300px;
                                            height: 250px;
                                        }

                                        .gmap_canvas {
                                            overflow: hidden;
                                            background: none !important;
                                            width: 300px;
                                            height: 250px;
                                        }

                                        .gmap_iframe {
                                            width: 300px !important;
                                            height: 250px !important;
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
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

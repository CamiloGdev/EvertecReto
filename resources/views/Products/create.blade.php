@extends('layouts.main', ['activePage'=>'products','titlePage'=>'New product'])
@section('content')
<div id="app" class="content">
	<div class="container-fluid">
		<div class="row">
			<div class=col-md-12>
				<form action="{{ route('products.store')}}" method="post" class="form-horisontal">
					@csrf
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title">Product</h4>
							<p class="card-category">Enter data</p>
						</div>
            <div class="card-body">
              {{-- @if ($errors->any())
                <div class="alert alert-danger">
                  <ul>
                    @foreach ($errors->all() as $error)
                      <li> {{$error}} </li>
                    @endforeach
                  </ul>
                </div>
              @endif --}}

              <div class="row">
                <div class=col-md-7>
                  <div class="row">
                    <label for="ref" class="col-sm-4 col-form-label">Reference</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="ref" placeholder="Enter the product ref." value="{{ old('ref') }}" autofocus>
                      @if ($errors->has('ref'))
                        <span class="error text-danger" for="input-ref">{{$errors->first('ref')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <label for="name" class="col-sm-4 col-form-label">Product name</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" name="name" placeholder="Enter product name" value="{{ old('name') }}">
                      @if ($errors->has('name'))
                        <span class="error text-danger" for="input-name">{{$errors->first('name')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <label for="price" class="col-sm-4 col-form-label">Price</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="price" placeholder="Enter product price" value="{{ old('price') }}">
                      @if ($errors->has('price'))
                        <span class="error text-danger" for="input-price">{{$errors->first('price')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="row">
                    <label for="quantity" class="col-sm-4 col-form-label">Quantity</label>
                    <div class="col-sm-8">
                      <input type="number" class="form-control" name="quantity" placeholder="Enter the number of products" value="{{ old('quantity') }}">
                      @if ($errors->has('quantity'))
                        <span class="error text-danger" for="input-quantity">{{$errors->first('quantity')}}</span>
                      @endif
                    </div>
                  </div>
                  <div class="row mt-5">
                    <label for="description" class="col-sm-4 col-form-label">Product description</label>
                    <div class="col-sm-8">
                      <textarea class="form-control" name="description" placeholder="Enter product description" rows="8">{{ old('description') }}</textarea>
                        @if ($errors->has('description'))
                          <span class="error text-danger" for="textarea-description">{{$errors->first('description')}}</span>
                        @endif
                    </div>
                  </div>
                </div>
                <div class=col-md-5>
                  <div class="card">
                    <div class="card-header">
                      <h4 class="card-title">Product images</h4>
                    </div>
<!--                    <div class="card-body">
                      <span class="float-end">
                          <button @click="$emit('add-image')" type="button" class="btn btn-sm btn-success">add</button>
                          <button @click="$emit('remove-image')" type="button" class="btn btn-sm btn-danger">remove</button>
                          <button @click="$emit('remove-all-images')" type="button" class="btn btn-sm btn-danger">remove all</button>
                      </span>
                    </div>-->
                    <input-file field-label="{{ trans('admin.products.fields.image') }}" field-name="images"></input-file>
                    @error('images')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <div class="button-container">
                  <a href="{{ route('products.index') }}" class="btn mr-3">Cancel</a>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

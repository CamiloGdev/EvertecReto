@extends('layouts.main', ['activePage'=>'products','titlePage'=>'Edit product'])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class=col-md-12>
				<form action="{{route('products.update', $product->id)}}" method="post" class="form-horisontal">
					@csrf
					@method("PUT")
					<div class="card">
						<div class="card-header card-header-primary">
							<h4 class="card-title">Product</h4>
							<p class="card-category">Edit data</p>
						</div>
						<div class="card-body">
							<div class="row">
								<label for="name" class="col-sm-2 col-form-label">Reference</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="ref" value="{{ old('ref', $product->ref) }}" autofocus>
									@if ($errors->has('ref'))
										<span class="error text-danger" for="input-name">{{$errors->first('ref')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="name" class="col-sm-2 col-form-label">Product name</label>
								<div class="col-sm-5">
									<input type="text" class="form-control" name="name" value="{{ old('name', $product->name) }}">
									@if ($errors->has('name'))
										<span class="error text-danger" for="input-name">{{$errors->first('name')}}</span>
									@endif
								</div>
							</div>
							<div class="row">
								<label for="price" class="col-sm-2 col-form-label">Price</label>
								<div class="col-sm-5">
									<input type="number" class="form-control" name="price" value="{{ old('price', $product->price) }}">
									@if ($errors->has('price'))
										<span class="error text-danger" for="input-price">{{$errors->first('price')}}</span>
									@endif
								</div>
							</div>
              <div class="row">
                <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-5">
                  <input type="number" class="form-control" name="quantity" value="{{ old('quantity', $product->quantity) }}">
                  @if ($errors->has('quantity'))
                    <span class="error text-danger" for="input-quantity">{{$errors->first('quantity')}}</span>
                  @endif
                </div>
              </div>
              <div class="row mt-5">
                <label for="description" class="col-sm-2 col-form-label">Product description</label>
                <div class="col-sm-5">
                  <textarea class="form-control" name="description" rows="8">{{ old('quantity', $product->description) }}</textarea>
                  @if ($errors->has('description'))
                    <span class="error text-danger" for="textarea-description">{{$errors->first('description')}}</span>
                  @endif
                </div>
              </div>
						<div class="card-footer ml-auto mr-auto">
              <div class="button-container">
                <a href="{{ route('products.show', $product->id) }}" class="btn mr-3">Cancel</a>
							  <button type="submit" class="btn btn-primary">Update</button>
              </div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

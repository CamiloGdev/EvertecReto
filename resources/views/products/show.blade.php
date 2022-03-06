@extends('layouts.main', ['activePage' => 'products', 'titlePage' => 'Product details'])
@section('content')
<div class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header card-header-primary">
						<div class="card-title">Products</div>
						<p class="card-category">Detailed view of product {{ $product->name }}</p>
					</div>
					<!--body-->
					<div class="card-body">
						@if (session('success'))
							<div class="alert alert-success" role="success">
								{{ session('success') }}
							</div>
						@endif
						<div class="row">

							{{-- Card Product --}}
							<div class="col-md-6">
								<div class="card card-user">
									<div class="card-body">
										<p class="card-text">
											<div class="author">
												<a href="#">
													<img src="{{ asset('img/default-avatar.png') }}" alt="image" class="avatar">
													<h5 class="title mt-3">{{ $product->name }}</h5>
												</a>
												<p class="description">
													{{ $product->ref }} <br>
													{{ $product->price }} <br>
													{{ $product->quantity }}
												</p>
											</div>
										</p>
                    <div class="card-description">
                      {{ $product->description }}
                    </div>
									</div>
									<div class="card-footer">
										<div class="button-container">
											<a href="{{ route('products.index') }}" class="btn btn-sm mr-3">Back</a>
											<a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
											{{-- <button class="btn btn-sm btn-primary">Edit</button> --}}
										</div>
									</div>
								</div>
							</div>
							{{-- End Card product --}}

              {{-- Card Product --}}
              <div class="col-md-6">
                <div class="card card-user">
                  <div class="card-body">
                    <p class="card-text">
                    <div class="author">
                      <a href="#">
                        <img src="{{ asset('img/default-avatar.png') }}" alt="image" class="avatar">
                        <h5 class="title mt-3">{{ $product->name }}</h5>
                      </a>
                      <p class="description">
                        {{ $product->ref }} <br>
                        {{ $product->price }} <br>
                        {{ $product->quantity }}
                      </p>
                    </div>
                    </p>
                    <div class="card-description">
                      {{ $product->description }}
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="button-container">
                      <a href="{{ route('products.index') }}" class="btn btn-sm mr-3">Back</a>
                      <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                      {{-- <button class="btn btn-sm btn-primary">Edit</button> --}}
                    </div>
                  </div>
                </div>
              </div>
              {{-- End Card product --}}

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

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

                            {{-- Card Images --}}
							<div class="col-md-6">
								<div class="card card-user">
									<div class="card-header">
										<h4 class="card-title">Product images</h4>
									</div>
<!--									Crossfade
									<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
										<div class="carousel-inner">
											@foreach($product->images as $image)
											<div class="carousel-item active">
												<img src="{{ $image->url() }}" class="d-block w-100" alt="...">
											</div>
											@endforeach
										</div>
										<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
											<span class="carousel-control-prev-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Previous</span>
										</button>
										<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
											<span class="carousel-control-next-icon" aria-hidden="true"></span>
											<span class="visually-hidden">Next</span>
										</button>
									</div>
									End Crossfade-->
									<div class="card-body">
										@foreach($product->images as $image)
											<img class="img-fluid" style="width: 150px;" src="{{ $image->url() }}">
										@endforeach
									</div>
								</div>
							</div>
                            {{-- End Card Images --}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

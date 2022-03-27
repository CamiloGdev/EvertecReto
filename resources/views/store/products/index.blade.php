@extends('layouts.main', ['activePage' => 'store', 'titlePage' => 'Store'])

@section('content')
    <div class="content" id="app">

        <products-list></products-list>

{{--        <div class="container-fluid">--}}

            {{--<nav class="navbar navbar-expand-lg bg-white">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <a class="navbar-brand" href="#">Search</a>

                    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                        <form class="form-inline ml-auto">
                            <div class="form-group no-border">
                                <input
                                        type="search"
                                        class="form-control"
                                        style="width: 300px"
                                        placeholder="Search by name, product reference..."
                                        v-model="consult"
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </nav>--}}

            {{--<div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-header card-header-primary">
                                    <h4 class="card-title">Store</h4>
                                    <p class="card-category">List of products</p>
                                </div>

                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-12 text-right">
                                        </div>
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="text-primary">
                                            <th>ID</th>
                                            <th>REF</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            </thead>
                                            <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td>{{ $product->id }}</td>
                                                    <td>{{ $product->ref }}</td>
                                                    <td>{{ $product->name }}</td>
                                                    <td>{{ $product->description }}</td>
                                                    <td>{{ $product->price }}</td>
                                                    <td>{{ $product->quantity }}</td>

                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="card-footer mr-auto">
                                    {{ $products->links() }}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            {{--<section>
                <div class="container-fluid d-flex justify-content-center">
                    @foreach ($products as $product)
                        <div class="row">
                            <div class="card" style="width: 15rem;">
                                <img class="card-img-top" src="https://images.unsplash.com/photo-1517303650219-83c8b1788c4c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=bd4c162d27ea317ff8c67255e955e3c8&auto=format&fit=crop&w=2691&q=80" alt="Card image cap">
                                <div class="card-body pt-0">
                                    <div class="text-center">
                                        <h5 class="h3">{{ $product->name }}</h5>
                                        <h5 class="h3">Price</h5>
                                        <div class="h5 font-weight-300">$ {{ $product->price }}</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{{ $product->description }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>--}}

{{--        </div>--}}

    </div>
@endsection

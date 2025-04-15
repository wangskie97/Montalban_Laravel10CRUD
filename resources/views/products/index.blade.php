@extends('products.layouts')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2>
                Laravel 10 CRUD – (Joshua T. Montalban)
                <a class="btn btn-primary float-end" href="{{ route('products.create') }}"> Create New Product</a>
            </h2>
        </div>
        <div class="card-body">

            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form class= "d-flex align-items-center flex-nowrap" action="/products">
                <input name="q" class="form-control" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-sm btn-info">Search</button>
                </form>


            <table class="table table-bordered">

                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($products as $key => $product)
                <tr>

                    <td align="center">{{ $products->firstItem() + $key }}</td>
                    <td align="center">{{ $product->name }}</td>
                    <td align="right">&#8369;{{ $product->price }}</td>
                    <td align="center">{{ $product->description }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                        <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>

            {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}

            {{-- {!! $products->links() !!} --}}

        </div>
    </div>

@endsection

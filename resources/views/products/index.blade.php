@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <h1 class="my-4">Products</h1>
                <a class="btn btn-info" href="{{ route('products.create') }}">New Product</a>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($products as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>${{ $product->price }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                {{-- Delete always will be a Form with method POST --}}
                                <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="d-inline">
                                    <input type="submit" class="btn btn-danger" value="Delete" onclick="confirm('Are you sure about this?')"/>
                                    @method('DELETE')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </thead>

                </table>

            </div>
            <!-- /.col-lg-12 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection

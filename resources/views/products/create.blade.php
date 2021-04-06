@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <h1 class="my-4">New Product</h1>

                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

                    <div class="my-2">
                        <label for="nameInput" class="d-block">Name:</label>
                        <input type="text" class="form-control" name="name" id="nameInput" value=""/>
                    </div>

                    <div class="my-2">
                        <label for="priceInput" class="d-block">Price ($):</label>
                        <input type="text" class="form-control" name="price" id="priceInput" value=""/>
                    </div>

                    <div class="my-2">
                        <label for="descInput" class="d-block">Description:</label>
                        <textarea class="form-control" name="description" id="descInput"></textarea>
                    </div>

                    <div class="my-2">
                        <label for="catInput" class="d-block">Category:</label>
                        <select id="catInput" name="category_id" class="form-control">
                            <option selected disabled>Pick Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="my-2">
                        <label for="photo" class="d-block">Photo:</label>
                        <input type="file" name="photo" id="photo" />
                    </div>

                    <div class="my-2">
                        <input type="submit" class="btn btn-primary" value="Save"/>
                    </div>

                    @csrf
                </form>
            </div>
            <!-- /.col-lg-12 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection

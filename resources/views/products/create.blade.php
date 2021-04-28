@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <h1 class="my-4">New Product</h1>

                {{-- To make it errors visible. We have to write something like this.
                    Erros automatically filled in variable by `session`. If something goes wrong.
                --}}
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{--
                The user will be very angry when after validation failed the form will be blank after
                filling this. So session has a method named `old()` here we use this function to show
                his/her old value.
               --}}

                <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">

                    <div class="my-2">
                        <label for="nameInput" class="d-block">Name:</label>
                        <input type="text" class="form-control" name="name" id="nameInput" value="{{ old('name') }}"/>
                    </div>

                    <div class="my-2">
                        <label for="priceInput" class="d-block">Price ($):</label>
                        <input type="text" class="form-control" name="price" id="priceInput" value="{{ old('price') }}"/>
                    </div>

                    <div class="my-2">
                        <label for="descInput" class="d-block">Description:</label>
                        <textarea class="form-control" name="description" id="descInput">{{ old('description') }}</textarea>
                    </div>

                    <div class="my-2">
                        <label for="catInput" class="d-block">Category:</label>
                        <select id="catInput" name="category_id" class="form-control">
                            <option disabled @if(old('category_id') === null) selected @endif>Choose category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if ($category->id === (int) old('category_id')) selected @endif>
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

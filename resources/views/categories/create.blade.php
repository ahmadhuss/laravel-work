@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <h1 class="my-4">New Category</h1>

                <form method="POST" action="{{ route('categories.store') }}">
                    <label for="nameInput" class="d-block">Name:</label>
                    <input type="text" class="form-control" name="name" id="nameInput" value=""/>
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

@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-lg-12">

                <h1 class="my-4">Categories</h1>
                <a class="btn btn-info" href="{{ route('categories.create') }}">New Category</a>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                                    {{-- Delete always will be a Form with method POST --}}
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}" class="d-inline">
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

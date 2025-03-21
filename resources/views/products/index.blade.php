@extends('products.layout')

     

@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2 style="text-align:center;">Shopping Products with crud operations</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>

            </div>
            <br/><br/>

        </div>

    </div>

    

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

     

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Image</th>

            <th>Name</th>

            <th>Price</th>

            <th>Details</th>

            <th width="250px">Action</th>

        </tr>

        @foreach ($products as $product)

        <tr>

            <td>{{ ++$i }}</td>

            <td><img src="/images/{{ $product->image }}" width="100px"></td>

            <td>{{ $product->name }}</td>

            <td>{{ $product->price }}</td>

            <td>{{ $product->detail }}</td>

            <td>

                <form action="{{ route('products.destroy',$product->id) }}" method="POST">

     

                    <a class="btn btn-info btn-sm" href="{{ route('products.show',$product->id) }}">Show</a>

      

                    <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}">Edit</a>

     

                    @csrf

                    @method('DELETE')

        

                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>


                </form>

            </td>

        </tr>

        @endforeach

    </table>

    

    {!! $products->links() !!}

        

@endsection
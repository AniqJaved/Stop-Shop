@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>

                    </tr>
                    </thead>
                    <tbody>
                    @if($products)
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td><img height="50" src="{{$product->photo ? $product->photo :  'https://source.unsplash.com/50x50/?nature,water'}}" alt=""></td>
                                <td><a href="{{route('product.edit',$product->id)}}">{{$product->name}}</a></td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->price}}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            {!! Form::open(['method'=>'POST','action'=>'ProductController@store','files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('price','Price:') !!}
                {!! Form::text('price',null,['class'=>'form-control']) !!}
            </div>
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="photo">Upolad</label>
                <input type="file" class="form-control" name="photo">
            </div>
            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description',null,['class'=>'form-control','rows'=>3]) !!}
            </div>



            {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}













{{--            <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">--}}
{{--                {{ csrf_field() }}--}}
{{--                <div class="form-group">--}}
{{--                    <label for="name">Name</label>--}}
{{--                    <input type="text" name="name" class="form-control" value="{{ old('name') }}">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="image">Price</label>--}}
{{--                    <input type="number" name="price" class="form-control" value="{{ old('price') }}">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="image">Image</label>--}}
{{--                    <input type="file" name="image" class="form-control">--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="description">Description</label>--}}
{{--                    <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <button class="form-control btn btn-success">Save Product</button>--}}
{{--                </div>--}}
{{--            </form>--}}
        </div>
    </div>
@endsection
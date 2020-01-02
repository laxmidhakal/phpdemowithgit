@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                    <!-- Button trigger modal -->
                    
                    <a href="{{URL::to('/')}}/home/category">Go Back</a>
                    <form action="{{URL::to('/')}}/home/category/{{$id}}/update" method="POST">
                        @foreach($categories as $category)
                        <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
                       
                         <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" value="{{$category->name}}">
                        </div>
                        <button type="submit">Update</button>
                        @endforeach
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
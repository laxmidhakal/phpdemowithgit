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
                    
                    <a href="{{URL::to('/')}}/home/item">Go Back</a>
                    <form action="{{URL::to('/')}}/home/item/{{$id}}/update" method="POST">

                        @foreach($items as $item)
                        <input type="hidden" name="_token" class="token" value="{{ csrf_token() }}">
                           <div class="form-group">
                    <label for="category_id">Select </label>
                    <select name="category_id" id="category_id">
                      
                      @foreach($categories as $cat)
                       <option value="{{$cat->id}}">{{$cat->name}}</option>
                      @endforeach
                    </select>
                   
                  </div>
                       
                         <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter item name" value="{{$item->name}}">
                        </div>
                        <div class="form-group">
                          <label for="sale_price">sale_price</label>
                          <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="Enter sale price" value="{{$item->sale_price}}">
                        </div>
                        <button type="submit" name="submit">Update</button>
                        @endforeach
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
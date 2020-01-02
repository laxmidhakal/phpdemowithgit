@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"></h3>
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Add Category
</button>
 
      </div>
     
      <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1"  data-backdrop="static" data-keyboard="false"role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Item</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="POST" action="{{URL::to('/')}}/home/item/store">
                {{csrf_field()}}
                <!-- <input type="" name="_token" value="{{csrf_token()}}"> -->
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-group">
                    <label for="category_id">Select </label>
                    <select name="category_id" id="category_id">
                      <option value="">--Select Category</option>
                      @foreach($categories as $category)
                      <option value="{{$category->id}}">{{$category->name}}</option>
                      @endforeach
                    </select>
                   
                  </div>
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name">
                  </div>
                  <div class="form-group">
                    <label for="sale_price">sale_price</label>
                    <input type="number" class="form-control" id="sale_price" name="sale_price" placeholder="Enter sale price">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
      <!-- /.card-header -->
      <div class="card-body">
        <div class="form-group  col-md-6" >
          <form action="{{URL::to('/')}}/home/item/search" method="POST" role="search">
            {{ csrf_field() }}

            <div class="input-group">
              <input type="text" class="form-control" name="search"
              placeholder="Search items"> <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                  <ion-icon size="small" name="md-search" ></ion-icon>
                </button>
              </span>
            </div>
          </form>
        </div>
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Selling Price</th>
              <th>Created By</th>
              <th>Created At</th>
              <th>Action</th>
              
              <th>Category</th>
            </tr>
          </thead>
          <tbody>
            @foreach($items as $item)
            <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>Rs: {{$item->sale_price}}</td>
              
              
              <td>
                {{$item->user->name}}
              </td>
              <td>{{date('D, j M Y', strtotime($item->created_at))}}</td>
               <td><a href="{{URL::to('/')}}/home/item/{{$item->id}}/show"><i class="icon ion-md-eye"></i></a>
                |<a href="{{URL::to('/')}}/home/item/{{$item->id}}/edit"><ion-icon size="small" name="md-create"></ion-icon></a>| <a  onclick="return myFunction();" href="{{URL::to('/')}}/home/item/{{$item->id}}/delete"><ion-icon size="small" name="md-trash" color="danger"></ion-icon></a></td>
              
            

              <td >{{$item->category->name}}</td>


             
            </tr>
            @endforeach
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
  <!-- /.col -->
  <!-- /.col -->
</div>
@endsection

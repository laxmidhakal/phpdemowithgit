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
                  <h3 class="card-title">Add Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{URL::to('/')}}/home/category/store">
                  {{csrf_field()}}
                  <!-- <input type="" name="_token" value="{{csrf_token()}}"> -->
                  <div class="card-body">
                    <div class="form-group">
                      <label for="name">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name">
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
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Created By</th>
              <th>Created At</th>
              <th>View</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
             @foreach($categories as $category)
            <tr>
              <td>{{$category->id}}</td>
              <td><a href="{{URL::to('/')}}/home/category/{{$category->id}}">{{$category->name}}</a></td>
              <td>{{$category->user->name}}</td>
              <td>{{date('D, j M Y', strtotime($category->created_at))}}</td>
              <td><a href="{{URL::to('/')}}/home/category/{{$category->id}}/show"><i class="icon ion-md-eye"></i></a></td>
              <td>  <a href="{{URL::to('/')}}/home/category/{{$category->id}}/edit"><ion-icon size="small" name="md-create"></ion-icon></a> </td>
              <td>  <a  onclick="return myFunction();" href="{{URL::to('/')}}/home/category/{{$category->id}}/delete"><ion-icon size="small" name="md-trash" color="danger"></ion-icon></a> </td>

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

@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"></h3>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
          Add Customer
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
                  <h3 class="card-title">Add Customer</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="POST" action="{{URL::to('/')}}/home/customer/store">
                {{csrf_field()}}
                <!-- <input type="" name="_token" value="{{csrf_token()}}"> -->
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Customer">
                  </div>
                  <div class="form-group">
                    <label for="business_name">business_name</label>
                    <input type="text" class="form-control" id="business_name" name="business_name" placeholder="Enter business_name">
                  </div>
                  <div class="form-group">
                    
                    <label for="address">address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                  </div>
                  <div class="form-group">
                    
                    <label for="phone">phone</label>
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Enter phone">
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
        <table class="table table-bordered" id="myTable">
          <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Customer</th>
              <th>Business Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Created By</th>
              <th>Created At</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $customer)
            <tr>
              <td>{{$customer->id}}</td>
              <td><a href="{{URL::to('/')}}/home/customer/{{$customer->id}}">{{$customer->name}}</a></td>
              
              <td>{{$customer->business_name}}</td>
              <td>{{$customer->phone}}</td>
              <td>{{$customer->address}}</td>
              
              <td>
                {{$customer->user->name}}
              </td>
              <td>{{date('D, j M Y', strtotime($customer->created_at))}}</td>
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

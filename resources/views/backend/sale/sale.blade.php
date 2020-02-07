@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
        <form action="{{URL::to('/search')}}" method="POST" role="search">
          {{ csrf_field() }}
          <div class="input-group">
            <input type="text" class="form-control" name="q"
            placeholder="Search users"> <span class="input-group-btn">
              <button type="submit" class="btn btn-default">
                <ion-icon size="small" name="md-search" color="danger"></ion-icon>


              </button>
            </span>
          </div>
        </form>
      </div>
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Add Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->

        <form role="form" method="POST" action="{{URL::to('/')}}/home/sale/store">
          {{csrf_field()}}
          <!-- <input type="" name="_token" value="{{csrf_token()}}"> -->
          <div class="card-body">
            <div class="row">
              <div class="form-group col-md-3">
                <label for="customer_id">Customer</label>
                <select name="customer_id" id="customer_id" class="form-control">
                  <option >--Select Custmer</option>
                  @foreach($customers as $customer)
                  <option value="{{$customer->id}}">{{$customer->name}}</option>
                  @endforeach
                </select>

              </div>
                <div class="form-group  col-md-3">
                  <label for="item_id">Item</label>
                  <select name="item_id" id="item_id" class="form-control">
                    <option >--Select Item</option>
                    @foreach($items as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                  </select>
                  <input type="text" name="item_p" class="form-control" id="item_p">
                  <img id="loaderDiv" src="{{URL::to('/')}}/images/giphy.gif" style="display:none;"/>
                </div>
              
              

                <div class="form-group  col-md-2" >
                  <label for="net_sale_price">Price</label>
                  <input type="text" name="net_sale_price" class="form-control" id="net_sale_price">
                </div>
                 <div class="form-group  col-md-1">
                  <label for="date">Date</label>
                  <input type="text" name="date" class="form-control" id="date">
                </div>
                <div class="form-group  col-md-2">
                  <label for="is_paid">Due</label>
                  <input type="checkbox" name="is_paid" class="form-control" id="is_paid">
                </div>
              
              
               
                <div class="  col-md-1">
                  <button type="submit" class="btn btn-primary">Submit</button>

                </div>


             
            </div>


          </div>
          <!-- /.card-body -->
          <div class="card-footer">
          </div>
        </form>
      </div>
      <!-- Modal -->

      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>CustomerName</th>
              <th>Item</th>
              <th>Net</th>
              <th>Date</th>
              <th>Created By</th>
              <th>Created At</th>

            </tr>
          </thead>
          <tbody>
            @foreach($sales as $sale)
            <tr>
              <td>{{$sale->id}}</td>
              <td>{{$sale->customer->name}}</td>
              <td> {{$sale->item->name}}</td>
              <td>Rs:{{$sale->net_sale_price}}</td>
              <td>{{$sale->date}}</td>
              <td>
                {{$item->user->name}}
              </td>
              <td>{{date('D, j M Y', strtotime($item->created_at))}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>

      </div>
      <div class="card-body">
    
    </div>
  </div>
  <!-- /.col -->
  <!-- /.col -->
</div>
@endsection

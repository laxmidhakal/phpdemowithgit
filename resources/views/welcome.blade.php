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
                <select name="customer_id" id="customer_id">
                  <option >--Select Custmer</option>
                 <option value="">laxmi</option>
                </select>

              </div>
                <div class="form-group  col-md-3">
                  <label for="item_id">Item</label>
                  <select name="item_id" id="item_id">
                    <option >--Select Item</option>
                   
                  </select>
                  
                </div>
              
              

                <div class="form-group  col-md-2" >
                  <label for="net_sale_price">Price</label>
                  <input type="text" name="net_sale_price" class="form-control" id="net_sale_price">
                </div>
               
              
              
                <div class="form-group  col-md-3">
                  <label for="date">Date</label>
                  <input type="text" name="date" class="form-control" id="date">
                </div>
                 <div class="form-group  col-md-1">
                  <label for="is_paid">Due</label>
                  <input type="checkbox" name="is_paid" class="" id="is_paid">
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
      
      
    </div>
  </div>
  <!-- /.col -->
  <!-- /.col -->
</div>
@endsection

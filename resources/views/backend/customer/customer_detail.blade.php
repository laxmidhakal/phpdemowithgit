@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Bordered Table</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table class="table table-bordered">
          <thead>                  
            <tr>
              <th style="width: 10px">#</th>
              <th>Name</th>
              <th>Selling Price</th>
              <th>Created By</th>
              <th>Created At</th>
              <th style="width: 80px">Total</th>
             
            </tr>
          </thead>
          <tbody>
            @php
            $total = 0;
            @endphp
            @foreach($catedetail as $customerdetail)
            <tr>
              <td>{{$customerdetail->id}}</td>
              <td>{{$customerdetail->item->name}}</td>
              <td>Rs: {{$customerdetail->net_sale_price}}</td>
              <td>
                {{$customerdetail->user->name}}
              </td>
              <td>{{date('D, j M Y', strtotime($customerdetail->created_at))}}</td>
                @php
                $total += $customerdetail->net_sale_price;
                @endphp
                <td> {{$total}}</td>


              
            
              
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

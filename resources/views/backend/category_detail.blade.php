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
              <th style="width: 80px">Label</th>
            </tr>
          </thead>
          <tbody>
            @foreach($catedetail as $itemdetail)
            <tr>
              <td>{{$itemdetail->id}}</td>
              <td>{{$itemdetail->name}}</td>
              <td>Rs: {{$itemdetail->sale_price}}</td>
              <td>
                {{$itemdetail->user->name}}
              </td>
              <td>{{date('D, j M Y', strtotime($itemdetail->created_at))}}</td>
              <td>S | E | D</td>
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

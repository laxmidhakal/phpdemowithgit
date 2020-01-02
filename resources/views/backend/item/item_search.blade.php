@extends('main')

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header ">
        <h3 class="card-title">Search</h3>

      </div>

      <!-- Modal -->

      <!-- /.card-header -->
      <div class="card-body col-md-6 ">
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
      <div class="card-body">
        @if(isset($items))
        <p> The Search results for your query <b> {{ $search }} </b> are :</p>
        <h2>Sample User items</h2>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Name</th>
              <th>Sale price</th>
              <th>Category</th>
              <th>Created By</th>
              <th>Created at</th>

            </tr>
          </thead>
          <tbody>
            @foreach($items as $user)
            <tr>
              <td>{{$user->name}}</td>
              <td>Rs:{{$user->sale_price}}</td>
              <td>{{$user->category->name}}</td>
              <td>{{$user->user->name}}</td>
              <td>{{date('D, j M Y', strtotime($user->created_at))}}</td>

            </tr>
            @endforeach
          </tbody>
        </table>
        @elseif(isset($message))
        <p>{{ $message }}</p>

        @endif

      </div>
    </div>
  </div>
  <!-- /.col -->
  <!-- /.col -->
</div>
@endsection

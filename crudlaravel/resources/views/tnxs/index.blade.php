@extends('layouts.app')

@section('content')

    <!-- Guest view -->

    @if(Auth::guest())

      <div class="text-center">
        <h1>Transactions CRUD</h1>
      </div>

      <div class="text-center">
        <p>You are a <strong>Guest</strong>, please login below</p>
        <a class="btn btn-success" href="{{ route('login') }}">Go to Login</a>
      </div>

    @endif

    <!-- User view -->

    @if(Auth::check())

      <div>
        <h1>Transactions CRUD</h1>
      </div>

      <div class="pull-right">
        <a class="btn btn-success" href="{{ route('tnxs.create') }}">Create New Transaction</a>
      </div>

      @if ($message = Session::get('success'))
      <div class="alert alert-success">
        <p>{{ $message }}</p>
      </div>
      @endif

      <table class="table table-bordered">
        <tr>
          <th>No</th>
          <th>Type</th>
          <th>Origin</th>
          <th>Description</th>
          <th>Amount</th>
          <th width="280px">Action</th>
        </tr>
      @foreach ($tnxs as $key => $tnx)
        <tr>
          <td>{{ ++$i }}</td>
          <td>{{ $tnx->type }}</td>
          <td>{{ $tnx->origin }}</td>
          <td>{{ $tnx->description }}</td>
          <td>{{ $tnx->amount }}</td>
          <td>
            <a class="btn btn-info" href="{{ route('tnxs.show',$tnx->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('tnxs.edit',$tnx->id) }}">Edit</a>
            {!! Form::open(['method' => 'DELETE','route' => ['tnxs.destroy', $tnx->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
          </td>
        </tr>
      @endforeach
      </table>

      {!! $tnxs->render() !!}

    @endif

@endsection

@extends('cmemories.layout')
     
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cinememories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cmemories.create') }}"> Create New cmemorie</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Type</th>
            <th>Statut</th>
            <th>Episode</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($cmemories as $cmemorie)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/image/{{ $cmemorie->image }}" width="100px"></td>
            <td>{{ $cmemorie->name }}</td>
            <td>{{ $cmemorie->type }}</td>
            <td>{{ $cmemorie->statut }}</td>
            <td>{{ $cmemorie->episode }}</td>
            <td>
                <form action="{{ route('cmemories.destroy',$cmemorie->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('cmemories.show',$cmemorie->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('cmemories.edit',$cmemorie->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $cmemories->links() !!}
        
@endsection
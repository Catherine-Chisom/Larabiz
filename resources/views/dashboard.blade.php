@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Dashboard') }}  </div>
            <span class="ml-auto pull-right text-"><a href="/listings/create" class="btn btn-success btn-xs">Add Listing</a></span>

            <div class="card-body">
                <h3>Your Listings</h3> 
                @if(count($listings))
                <table class="table table-bordered table-striped table-condensed">                    
                <tr>
                    <th>Company</th>
                    <th></th>
                    <th></th>
                </tr>
                    @foreach($listings as $listing)
                    <tr>
                    <td>{{$listing->name}}</td>
                    <td><a class="pull-right    btn btn-default" href="/listings/{{$listing->id}}/edit">Edit</a></td>
                    <td>
                        {!! Form::open(['action' => ['ListingsController@destroy', $listing->id], 'method' => 'POST', 'class' => 'pull-left', 'onsubmit' => 'return confirm("Are you sure?")']) !!}
                         {{Form::hidden('_method', 'DELETE')}}
                         {{Form::bsSubmit('delete', ['class' => 'btn btn-danger'])}}
                        {!! Form::close() !!}
                    </td>
                    </tr>
                    @endforeach
                </table>
                @endif
                
        </div>
    </div>
</div>

@endsection

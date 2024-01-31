@extends('layouts.companylayout')

@section('content')

<table class="table text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">#</th>
            <th class="border-top-0">Name</th>
            <th class="border-top-0">Location</th>
            <th class="border-top-0">E-mail</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        
            @foreach ($companies as $item)
<tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->location}}</td>
            <td>{{$item->email}}</td>
            <td> <a class="btn btn-success mx-2" href=""> Edit</a></td>
            <td>
                <a href=" {{ url('companies/create') }}" class="text-danger">DELETE</a>
            </td>
        </tr>
                
            @endforeach
            
    </tbody>
</table>
@endsection
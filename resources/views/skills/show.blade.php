@extends('layouts.skillslayout')

@section('skills')

<table class="table text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">#</th>
            <th class="border-top-0">Name</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        
            @foreach ($skills as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td> <a class="btn btn-success mx-2" href=" {{ url('skills/' .$item->id. '/edit') }}"> Edit</a></td>
                <td>
                    <a onclick="return confirm('Are you sure You want to delete it?')" class="btn btn-danger mx-2" href=" {{ url('skills/' .$item->id. '/delete') }}">DELETE</a>
                </td>
            </tr>
                
            @endforeach
            
    </tbody>
</table>
@endsection
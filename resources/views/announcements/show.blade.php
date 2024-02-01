@extends('layouts.announcementlayout')

@section('announcements')

<table class="table text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0"></th>
            <th class="border-top-0">#</th>
            <th class="border-top-0">Title</th>
            <th class="border-top-0">Post required</th>
            <th class="border-top-0">description</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        
            @foreach ($announcements as $item)
            <tr>
                <td> <img style="width: 60px;height:50px;" src="{{ asset($item->img) }}" alt="img"> </td>
                <td>{{$item->id}}</td>
                <td>{{$item->title}}</td>
                <td>{{$item->post}}</td>
                <td>{{$item->description}}</td>
                <td> <a class="btn btn-success mx-2" href=" {{ url('announcements/' .$item->id. '/edit') }}"> Edit</a></td>
                <td>
                    <a onclick="return confirm('Are you sure You want to delete it?')" class="btn btn-danger mx-2" href=" {{ url('announcements/' .$item->id. '/delete') }}">DELETE</a>
                </td>
            </tr>
                
            @endforeach
            
    </tbody>
</table>
@endsection
@extends('layouts.announcementlayout')

@section('announcements')

<table class="table text-nowrap">
    <thead>
        <tr>
            <th class="border-top-0">Announcement Title</th>
            <th class="border-top-0">User Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            @foreach($user->announcements as $announcement)
                <tr>
                    <td>{{ $announcement->title }}</td>
                    <td>{{ $user->name }}</td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

@endsection

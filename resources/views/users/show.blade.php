@extends('layouts.app')
@section('userProfile')
    <div class="container rounded bg-white mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">{{ $user->name }}</span><span
                        class="text-black-50">{{ $user->email }}</span><span> </span></div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <div class="row mt-2">
                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Update Profile Or Add
                            skills</a>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Name</label> <span class="form-control">
                                {{ $user->name }}</span></div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><span class="form-control">
                                068593906</span></div>
                        <div class="col-md-12"><label class="labels">Address Line 1</label><span class="form-control">10BE ,
                                Lotun towen , England</span></div>
                        <div class="col-md-12"><label class="labels">Email</label><span class="form-control">
                                {{ $user->email }}</span></div>

                        <div class="col-md-12"><label class="labels">Skills</label><span class="form-control">
                                @foreach ($user->skills as $item)
                                    {{ $item->name }} ,
                                @endforeach
                            </span></div>
                        <div class=" mt-2">
                            <a class="btn btn-primary" href="{{ url('users/create') }}">Add skills</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('layouts.app')
@section('userProfile')
    <div class="container rounded bg-white mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5"
                        width="150px"
                        src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span
                        class="font-weight-bold">{{ $user->name }}</span><span
                        class="text-black-50">{{ $user->email }}</span><span>
                    </span></div>
            </div>
            <div class="col-md-5 border-right">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Profile Settings</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6"><label class="labels">Name</label><input type="text" name="name"
                                    class="form-control" placeholder="first name" value="{{ $user->name }}"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                    class="form-control" placeholder="enter phone number" value="0685554456"></div>
                            <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text"
                                    class="form-control" placeholder="enter address line 2"
                                    value="10BE , Lotun towen , England"></div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="email" name="email"
                                    class="form-control" placeholder="enter email id" value="{{ $user->email }}"></div>
                            <div class="col-md-12"><label class="labels">Skills</label>
                                <select class="js-example-basic-multiple" name="skills[]" id="select"
                                    multiple="multiple">
                                    @foreach ($skills as $item)
                                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="submit">Save
                                Profile</button></div>
                    </div>
                </form>
            </div>

        </div>
    </div>
    </div>
    </div>
@endsection

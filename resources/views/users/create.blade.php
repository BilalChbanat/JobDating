@extends('layouts.app')
@section('userProfile')
    <div class="container rounded bg-white mb-5">
        <div class="row">
            <div class="col-md-3 border-right">

            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Add skill</h4>
                    </div>
                    <div class="row mt-2">
                        <a class="nav-link" href="{{ url('users/e') }}">Back to profile
                        </a>
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="form-group"><label class="labels">Skills</label>
                        <form class="d-flex flex-column" action="{{ route('users.addSkills') }}" method="POST">

                            @csrf
                            <input name="user_id" type="hidden" value="{{ Auth::User()->id }}">
                            <select class="js-example-basic-multiple" name="skills[]" id="select" multiple="multiple">
                                @foreach ($skills as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <button class="col-lg-2 btn btn-success mt-4" type="submit">ADD</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

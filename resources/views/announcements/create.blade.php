<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tiny.cloud/1/fhs9rnni88hr58gzeurtvemnquyj1fvmgwcs7cvmvwpgu94u/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <meta name="robots" content="noindex,nofollow">
    <title>Job Dating</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    @vite(['resources/css/style.min.css', 'resources/js/app.js'])
</head>

<body>
    <!-- <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div> -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin5">
            @include('layouts.header')
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            @include('layouts.aside')
        </aside>
        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{session('status')}}
                            </div>
                        @endif
                        <div class="white-box">
                            <h3 class="box-title">Announcements</h3>
                            <a href="{{ url('announcements')}}" class="text-muted">Back to dashboard</a>
                            <form action="{{ url('announcements/create') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Title</label>
                                    <input type="text" class="form-control" id="name" placeholder="Announcements Title" name="title" value="{{ old('title') }}">
                                    @error('name') <span class="text-danger"> {{$message}} </span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Post required</label>
                                    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter post you looking for" name="post" value="{{ old('post') }}">
                                    @error('email') <span class="text-danger"> {{$message}} </span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputGroupFile03"> Drop Your images here</label>
                                    <input type="file" name="img" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload" value="{{ old('img') }}">
                                    @error('email') <span class="text-danger"> {{$message}} </span> @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Location</label>
                                    <textarea name="description" id="myeditorinstance" cols="30" rows="10"> {{ old('description') }} </textarea>
                                    @error('location') <span class="text-danger"> {{$message}} </span> @enderror
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
    });
</script>

</body>

</html>
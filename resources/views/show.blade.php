
@extends('layouts.app')

@section('content')
    


<body data-new-gr-c-s-check-loaded="14.1094.0" data-gr-ext-installed="" cz-shortcut-listen="true">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div> --}}
        </div>
    </nav>
    <div class="container-fluid pt-4">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="d-flex justify-content-between border-bottom mb-5">
                    <div>
                        <h3> we are in show post : {{ $post->id }}</h3>
                    </div>

                    <div>
                        <a href="{{url('/')}}" class="text-decoration-none btn btn-info">Back</a>
                    </div>
                </div>
                <div class="">
                    <h4>post Title : {{ $post->title }} </h4>
                </div>
                <div class="">
                    <h5>posted by : {{isset($post->user)?$post->user->name : 'Not Found' }} </h5>
                    

                </div>
                <hr>
                <div class="">
                    <p> created_at :{{ $post->created_at }} </p>
                </div>


            </div>
        </div>
    </div>

    <script src="js/bootstrap.min.js"></script>

    <iframe src="chrome-extension://ijejnggjjphlenbhmjhhgcdpehhacaal/audio-devices.html" allow="microphone"
        style="display: none;"></iframe><input type="file" id="" name="file" style="display: none;">
    <div data-v-f3fb3dc8="">
        <div data-v-f3fb3dc8="" class="container_selected_area" style="cursor: crosshair;"></div>
        <div data-v-f3fb3dc8="" class="area" style="left: 0px; top: 0px; width: 0px; height: 0px;"></div>
    </div>
    <div id="scrnli_recorder_root"></div>
</body>
@endsection

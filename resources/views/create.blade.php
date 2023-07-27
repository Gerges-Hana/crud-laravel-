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
                <div class="col-md-6 offset-md-3">
                    <div class="d-flex justify-content-between border-bottom mb-5">
                        <div>
                            <h3>Add new post</h3>
                        </div>
                        <div>
                            <a href="{{ url('/') }}" class="text-decoration-none">Back</a>
                        </div>
                    </div>

                    <!-- errorrs  -->


                    <form action="{{ route('posts.store') }}"" method="POST">
                        @csrf



                        {{-- error mesg  --}}
                        <!-- /resources/views/post/create.blade.php -->


                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- error mesg  --}}

                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title">
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Body</label>
                            <textarea class="form-control" id="body" name="body" rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="body" class="form-label">Post Creator</label>
                            <select name="select" id="" class="form-control">

                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    




                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
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
        <link rel="stylesheet" type="text/css" href="chrome-extension://liecbddmkiiihnedobmlmillhodjkdmb/css/blur.css"
            class="loom-blur-styles">
        <div id="scrnli_recorder_root"></div>
    </body>
@endsection

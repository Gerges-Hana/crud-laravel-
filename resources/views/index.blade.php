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
                            <h3>All posts</h3>
                        </div>
                        <div>
                            <a href="{{ route('posts.create') }}" class="btn btn-sm btn-success">Add new post</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Posted By</th>
                                <th scope="col">Published At</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($posts as $post)
                                <tr>
                                    {{-- test post model class  --}}
                                    {{-- <td>{{ $post->user->name }}</td> --}}
                                    {{-- test post model class  --}}

                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ isset($post->user) ? $post->user->name : 'Not Found' }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td>
                                        <a href="/posts/{{ $post->id }}" class="btn btn-sm btn-primary">Show</a>
                                        <a href="/posts/{{ $post->id }}/edit"  class="btn btn-sm btn-secondary">Edit</a>

                                         

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{$posts}}
                </div>
            </div>
        </div>


        {{-- modal delet alert  --}}

        <div class="modal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Delete Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>you want to delete this post ??</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                        <button type="button" class="btn btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>

        {{-- modal delet alert  --}}



        <script src="js/bootstrap.min.js"></script>

        <script>
            const delete = document.getElementById('delete')
            const myInput = document.getElementById('myInput')

            delete.addEventListener('shown.bs.modal', () => {
                myInput.focus()


            })
        </script>


        <div id="scrnli_recorder_root"></div>

        <iframe src="chrome-extension://ijejnggjjphlenbhmjhhgcdpehhacaal/audio-devices.html" allow="microphone"
            style="display: none;"></iframe><input type="file" id="" name="file" style="display: none;">
        <div data-v-f3fb3dc8="">
            <div data-v-f3fb3dc8="" class="container_selected_area" style="cursor: crosshair;"></div>
            <div data-v-f3fb3dc8="" class="area" style="left: 0px; top: 0px; width: 0px; height: 0px;"></div>
        </div>
    </body>
@endsection

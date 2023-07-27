<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use App\Models\post;
use App\Models\User;
use Illuminate\Support\Facades\Auth\viaRemember;

class PostController extends Controller
{
    public function index()
    {

        // $allPosts=[
        //     [
        //         'id'=>1,
        //         'title'=>'MVC',
        //         'posted_by'=>'gerges',
        //         'created_at'=>'2020-04-03'
        //     ],
        //     [
        //         'id'=>2,
        //         'title'=>'js',
        //         'posted_by'=>'hana',
        //         'created_at'=>'2020-06-03'
        //     ],
        //     [
        //         'id'=>3,
        //         'title'=>'css',
        //         'posted_by'=>'farg',
        //         'created_at'=>'2020-08-03'
        //     ],
        // ];
        // $posts = post::all();
        $laravel = post::where('title', 'css')->get();
        // dd($posts,$laravel);
        $posts = post::paginate(2);


        return view('index', compact('posts'));
        // return view('index', ['posts' => $posts] ,compact('paginatPost'));
        // return 'my name is gergee';
    }

    public function show($postId)
    {
        // return 'my name is gerges ';
        // dd($postId);

        //    $post= post::where('id',$postId)->first();
        $post = post::find($postId);


        return view('show', ['post' => $post]);
    }


    public function create()
    {
        $users = User::all();
        // dd($user);

        return view('create', [
            'users' => $users,
        ]);
    }



    public function store(StorePostRequest $request)
    {
        // dd($_POST);

        // dd($request->title);
        // dd($request->body);
        $data = request()->all();
        $title = $data['title'];
        $body = $data['body'];
        $select = $data['select'];
        // dd($data);
        // dd($title, $body, $select);

        // $request->validate([

        //     'title'=>['required','min:3'],
        //     'body'=>['required','min:5'],
        // ],[
        //     'title.required'=>'يعم متقرفناش لازما تكتب العنوان ',
        //     'title.min'=>'شكلك غاوي تعب اقل حاجه 3 حروف يعم ...',
        // ]
        // );


        post::create([
            'title' => $title,
            'description' => $body,
            'user_id' => $select,
        ]);
        return  redirect()->route(route: 'posts.index');
    }




    public function edit($postId)
    {
        $post = post::find($postId);


        return view('edit', ['post' => $post]);
    }




    public function update($postId)
    {

        $data = request()->all();
        // dd($data);
        $title = $data['title'];
        $body = $data['body'];
        $select = $data['select'];

        // dd($title, $body, $select);

        post::find($postId)
            ->update([
                'title' => $title,
                'description' => $body,
                'user_id' => $select,
            ]);



        return  redirect()->route(route: 'posts.index');
    }


    public function destroy($postId)
    {
        // dd($postId);
        post::find($postId)
            ->delete();

        return  redirect('/');
    }
}

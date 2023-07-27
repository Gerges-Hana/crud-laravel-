<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\post;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;

class PostApiController extends Controller
{
    //

    public function index()
    {


        $posts = post::all();
        // return $posts;
// هنا ببعت كل الداتا اللي موجوده عندي للكلاس دا علشان لما احتاجها ما اككرهاش
        // return PostResource::collection($posts);

        // transformation
        // الطريقه دي بستخدمها علشان اقلل حجم الداتا اللي هاتظهر معايا علشان احل مشكله وقت reqوحجم الملف
        // =======================
        $posts = post::all();
        $response =[];
        foreach($posts as $post){
            $response[]=[
                'id'=>$post->id,
                'title'=>$post->title
            ];
        }
        return $response;

        // =======================


    }

    public function show($postId)
    {
        $post = post::find($postId);
        // دا لو انت عاوز ترجع عنصر واحد بس من غيبر تكرار ب recources
        // return new PostResource($post);
        return  $post;
    }



    public function store(StorePostRequest $request )
    {

        $data = request()->all();
        $title = $data['title'];
        $body = $data['body'];
        $select = $data['select'];


      $post=  post::create([
            'title'=> $title,
            'description'=> $body,
            'user_id'=> $select,
            // 'slug'=> Str::slug($title) ,
        ]);
        return $post  ;
        // return redirect()->back();



        // ========================
        // public function store(Request $req)
        // {
        //     $req->validate([
        //         'name' => 'required',
        //         'user-name' => 'required|unique:delivery_guys,userName',
        //         'national-id' => 'required',
        //         'phone' => 'required',
        //         'password' => 'required',
        //         'email' => 'required|unique:delivery_guys',
        //     ]);

        //     $guy = $req->all();

        //     DeliveryGuy::create([
        //         'companyId' => $guy['company-id'],
        //         'name' => $guy['name'],
        //         'userName' => $guy['user-name'],
        //         'nationalId' => $guy['national-id'],
        //         'phone' => $guy['phone'],
        //         'salary' => $guy['salary'],
        //         'password' => $guy['password'],
        //         'motorCycleNumber' => $guy['motor-num'],
        //         'email' => $guy['email'],
        //     ]);

        //     return response()->json(['message' => 'Delivery guy has been added successfully'], 200);
        // }
        // ========================




    }






    public function update($postId){

        $data = request()->all();
        // dd($data);
        $title = $data['title'];
        $body = $data['body'];
        $select = $data['select'];

        // dd($title, $body, $select);

        post::find($postId)
        ->update([
            'title'=> $title,
            'description'=> $body,
            'user_id'=> $select,
        ]);
        // return  redirect()->route(route:'posts.index') ;

    }


    public function destroy($postId){
// dd($postId);
}
}

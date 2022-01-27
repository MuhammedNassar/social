<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\postModel;
use App\Models\commentModel;
use App\Models\userModel;
class InstagramController extends Controller
{

public function index()
{
    // select posts.*,users.name,users.image as UserImg , follows.followed_by
    //   from  posts INNER JOIN users on users.id= posts.user_id inner JOIN follows on users.id=follows.user_id
        $postInfo = postModel::join("users", "users.id", "=", "posts.user_id")->join("follows","follows.user_id","=","users.id")->where("follows.followed_by",auth()->user()->id)->select("posts.*", "users.name", "users.image as UserImg ","follows.followed_by")->get();
        //dd($postInfo);
       $postCommentsInfo = commentModel::join("posts", "comments.post_id", "=", "posts.id")->join("users","users.id","=","comments.user_id")->select("comments.*","users.name","users.image as userImg")->Limit(5)->get();
       $user=userModel::inRandomOrder()->Limit(5)->get();
       //dd($postCommentsInfo);
        // dd($user);
        return view("index", ['post' => $postInfo ,'comment'=>$postCommentsInfo,'sugg' => $user]);


}

public function doOperation(Request $request)
{

      $data = $request->validate(['text' => "required|max:100", "post_id" => "required"]);
        $data['user_id'] = auth()->user()->id;

        $op =    commentModel::create($data);
        dd($data);
        if ($op) {
            return redirect(url("/"));
        } else {
            return redirect(url("/"));
        }
}
}

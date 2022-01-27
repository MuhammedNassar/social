<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\postModel;
use App\Models\followModel;
use App\Models\commentModel;

class postController extends Controller
{


    public function createPost(Request $request)
    {

        if (empty($request->Follow)) {
            # code...

            $data = $request->validate([
                'desc' => 'required|max:100',
                'image' => 'required', 'user_id' => 'required|numeric'
            ]);
            $imageName = rand() . time() . '.' . $request->image->extension();
            $request->image->move(public_path('Uploads'), $imageName);
            $data['image'] = $imageName;
            $data['user_id'] = $request->user_id;
            // dd($data);
            $op = postModel::create($data);
            if ($op) {
                return redirect(url("/User/profile/" . $request->id));
            }
        } else {
            $op = followModel::where('user_id', $request->Follow)->where('followed_by', auth()->user()->id)->get();
            if (count($op) > 0) {

                followModel::where('followed_by', auth()->user()->id)->where('user_id', $request->Follow)->delete();
            } else {
                followModel::create(["user_id" => $request->Follow, "followed_by" => auth()->user()->id]);
            }
            return redirect(url("/User/profile/" . $request->Follow));
        }
    }
    public function showPost($id)
    {

        $postInfo = postModel::join("users", "users.id", "=", "posts.user_id")->where("posts.id", $id)->select("posts.*", "users.name", "users.image as UserImg")->get();
        $postCommentsInfo = commentModel::join("users", "users.id", "=", "comments.user_id")->where("comments.post_id", $id)->select("comments.*", "users.name", "users.image as UserImg")->get();

        // dd($postInfo);
        return view("post", ['post' => $postInfo, 'comment' => $postCommentsInfo]);
    }
    public function commentPost(Request $request)
    {
        $data = $request->validate(['text' => "required|max:100", "post_id" => "required"]);
        $data['user_id'] = auth()->user()->id;

        $op =    commentModel::create($data);
        if ($op) {
            return redirect(url(("/User/profile/post/" . $request->post_id)));
        } else {
            return redirect(url(("/User/profile/post/" . $request->post_id)));
        }
    }
}

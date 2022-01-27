<?php

namespace App\Http\Controllers;

use App\Models\userModel;
use App\Models\postModel;
use App\Models\followModel;
use Illuminate\Http\Request;

class userController extends Controller
{

    public function create()
    {
        return view('signup');
    }

    public function createPost(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:5|max:100',
            'email' => 'required|email|',
            'password' => 'required|min:6|max:50'
        ]);
        $image = $this->Uploader($request);
        $data['image'] = $image;
        $data["password"] = bcrypt($data["password"]);
        userModel::create($data);
        return redirect(url('/user/login'));
    }

    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        auth()->logout();
        return redirect(url('/User/login'));
    }
    public function loginPost(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:5|max:100'
            ]
        );
        if (auth()->attempt($data)) {
            return redirect(url('/'));
        } else {
            $Message = "Invalid EMail or Password";
            session()->flash('Message', $Message);
            return redirect(url('/User/login'));
        }
        dd($data);
    }

    public function index()
    {
        if (auth()->check()) {
            return redirect(url('/User/login'));
        } else {
            return view('index');
        }
    }

    public function profile($id)
    {
        if (auth()->check()) {
            $data = userModel::where('id', $id)->get();
            $post = postModel::where('user_id', $id)->get();
            $followers = followModel::where('user_id', $id)->get();
            $following = followModel::where('followed_by', $id)->get();
            $isFollowed = followModel::where('followed_by', auth()->user()->id)->get();
            $comment = postModel::get();;
            return view('profile', ['data' => $data, 'post' => $post, 'followers' => $followers, 'following' => $following, 'isFollowed' => $isFollowed]);
        } else {
            return redirect(url('/User/login'));
        }
    }


    public  function Uploader(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = rand() . time() . '.' . $request->image->extension();
        $request->image->move(public_path('../../Uploads'), $imageName);
        /* Store $imageName name in DATABASE from HERE */
        return $imageName;
    }
}

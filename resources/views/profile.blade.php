<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../styles.css" rel="stylesheet">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
<style>
    .my-custom-scrollbar {
position: relative;
height: 200px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<header>
<div class="container">
    <div class="profile">
        <div class="profile-image">
            <a href="">
            <img height="150px" width="150px" src="{{ '../../Uploads/'.$data[0]->image}}" alt=""></a>
        </div>
        <div class="profile-user-settings">

            <h2 class="profile-user-name">{{$data[0]->name}}</h2>

            @if (auth()->user()->id != request('id'))
            <form action="{{url("/User/profile/".auth()->user()->id)}}" method="post">
                @csrf
                <input type="hidden" value="{{request('id')}}" name="Follow">

                <button class="btn btn-primary">
                    @if(count($isFollowed) > 0)
                     Unfollow
                    @else Follow
                    @endif
                </button>

            </form>
              @endif

              <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>
        </div>
        <div class="profile-stats">
            <ul>
                <li><span class="profile-stat-count">{{ count($post) }}</span> posts</li>
                <li><span class="profile-stat-count">{{ count($followers) }}</span >
                    Followers
                  </button></li>
                <li><span class="profile-stat-count">{{ count($following) }}</span> following</li>
            </ul>
        </div>
        <div class="profile-bio">
        </div>

    </div>
    @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<a href="{{url("/")}}"> <h3> Scroll time line </h3> </a>

    <!-- End of profile section -->
@if (auth()->user()->id == request('id'))
<div class="container" style="text-align: center">
    <form action="{{url("/User/profile/".auth()->user()->id)}}" method="POST" enctype="multipart/form-data" style="text-align: center">
    <div class="form-group" >
        @csrf
         <input type="hidden" name="user_id" value="{{auth()->user()->id }}">
        <input class="form-control-sm" id="formFileSm" type="file" name ="image">
        <br>
        <textarea name="desc"  cols="60" rows="3"></textarea>
        <br>
        <button type="submit">POST</button>


      </div>
    </form>
</div>
@endif

<hr>
</div>
<!-- End of container -->

</header>

<main>

<div class="container col-md-8">

    <div class="gallery">
        @if(count($isFollowed) > 0)
@foreach ($post as $raw)


        <div class="gallery-item" tabindex="0">

          <a href="{{url("/User/profile/post/".$raw["id"])}}">
              <img src="../../uploads/{{$raw->image}}" class="gallery-image" title="{{ $raw->desc }}" >
            </a>

            <div class="gallery-item-type">



            </div>

            <div class="gallery-item-info">

                <ul>
                    <a href="{{url("/User/profile/post/".$raw["id"])}}"></a>
                    <li class="gallery-item-comments"><span class="visually-hidden"></span><i class="fas fa-comment" aria-hidden="true"></i><a href="{{url("/User/profile/post/".$raw["id"])}}">See Moree</a></li>
                </ul>

            </div>

        </div>
        @endforeach
    </div>
    <!-- End of gallery -->

    <div class="loader"></div>

</div>
@endif

<!-- End of container -->

</main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

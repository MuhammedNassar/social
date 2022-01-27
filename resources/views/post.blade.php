<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="../../styles.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post details</title>
</head>
<body>

    <div class="container mt-5 mb-5">
        <a href="{{url("/")}}"> <h3> Scroll time line </h3> </a>

        <hr>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center"> <img src="{{url('/Uploads/'.$post[0]["UserImg"])}}" width="50" class="rounded-circle">
                            <div class="d-flex flex-column ml-2"> <span class="font-weight-bold"> <strong style="padding-left: 10px"> {{ $post[0]['name']}} </strong></span>  </div>
                        </div>
                        <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2"><small>{{$post[0]["date"]}}</small></small> <i class="fa fa-ellipsis-h"></i> </div>
                    </div> <img src="{{url('/Uploads/'.$post[0]["image"])}}" class="img-fluid">

                    <div class="p-2">
                        <p class="text-justify">{{$post[0]["desc"]}}</p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row icons d-flex align-items-center"> </div>
                            <div class="d-flex flex-row muted-color " style="text-align: left; align-items-left"> <span> Total comment : {{count($comment)}}</span>  </div>
                        </div>
                        <hr>

                        <div class="comments">
{{-- ########################################################### --}}
                        @foreach ($comment as $raw )
                            <div  class="d-flex flex-row mb-2"> <img src="{{url('/Uploads/'.$raw["UserImg"])}}" width="40px" height="40px" style="border-radius: 10%" class="rounded-image">
                                <div class="d-flex flex-column ml-2"> <span class="name" style="font-weight: bold">{{$raw["name"]}}}</span> <small class="comment-text">{{$raw["text"]}}</small>

                                </div>
                             </div>
                             <hr>
                             @endforeach
{{-- ########################################################### --}}
                         <form action="{{url("/User/profile/post/{id}")}}" method="POST">
                            @csrf
                            <div class="comment-input">
                                <input type="hidden" name="post_id" value="{{request('id')}}">
                                <input type="text" name ="text" class="form-control">
                                <div class="fonts"> <button type="submit">Comment!!</button> </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

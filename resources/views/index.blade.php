<html lang="en">

<head>

    <meta http-equiv="content-type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">

    <title>Social Demo</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="../public/assets/css/bootstrap.css" rel="stylesheet">
    <link href="../public/styles.css" rel="stylesheet">

    <!--[if lt IE 9]>

      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <![endif]-->

    <link href="../public/assets/css/facebook.css" rel="stylesheet">

</head>



<body>



    <div class="wrapper">

        <div class="box">

            <div class="row ">

                <div class="column col-sm-12 col-xs-12" id="main">
                    <!-- top nav -->
                    <div class="navbar navbar-blue navbar-static-top">

                        <div class="navbar-header">

                            <button class="navbar-toggle" type="button" data-toggle="collapse"
                                data-target=".navbar-collapse">

                                <span class="sr-only">Toggle</span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                                <span class="icon-bar"></span>

                            </button>
                        </div>

                        <nav class="collapse navbar-collapse" role="navigation">


                            <ul class="nav navbar-nav">
                                <li>
                                    <a href="{{ url('/')}}"><i class="glyphicon glyphicon-home"></i> Home</a>
                                </li>
                                <li>
                                    <a href="{{ url('/User/profile/'.auth()->user()->id) }}" role="button" data-toggle="modal"><i
                                            class="glyphicon glyphicon-plus"></i> Post</a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                            class="glyphicon glyphicon-user"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ url('/User/profile/'.auth()->user()->id) }}">My Profile</a></li>
                                        <li><a href="{{ url('/User/Signout') }}">Sign Out</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- /top nav -->
                    <div class="padding" style="padding-top: 100px">
                        <div class="col-md-8" style="align-content: center;">

                            <div class="row" style="justify-content: center;">

                                <div class="col-6">
                                    @foreach ($post as $raw)

                                        <div class="panel panel-default" style="width: 90% ;align-items: center">
                                            <div class="panel-heading">
                                                <a href="{{url("User/profile/post/".$raw['id'])}}"> <span>See More..</span></a>
                                            </div>
                                            <div class="panel-body" >
                                                <div style="display: block ;margin: auto;">
                                                    <img src="{{ url('/Uploads/'.$raw['image']) }}" style="text-align: center"
                                                    height="250px" width="250px">

                                                </div>

                                                <div class="clearfix"></div>
                                                <hr>
                                                {{ $raw['desc'] }}
                                            </div>

                                            <hr>
                                            {{-- @dd($raw["id"].''); --}}

                                            @foreach ($comment as $rawCom)
                                                {{-- @dd($rawCom["post_id"]); --}}
                                                @if ($raw['id'] == $rawCom['post_id'])
                                                    {{-- @dd($raw["id"].''.$rawCom["post_id"]); --}}
                                                    <div>
                                                        <div class="d-flex flex-row mb-2">
                                                            <span
                                                                    class="name"
                                                                    style="font-weight: bold">{{ $rawCom['name'] }}</span>

                                                            <img
                                                                src="{{ url('/Uploads/'.$rawCom['userImg']) }}"
                                                                width="40px" height="40px" style="border-radius: 10%"
                                                                class="rounded-image">
                                                            <div class="d-flex flex-column ml-2">                                                                 <small
                                                                    class="comment-text">{{ $rawCom['text'] }}</small>

                                                            </div>
                                                        </div>
                                                        {{-- ########################################################### --}}
<hr>
                                                    </div>
                                                @endif
                                            @endforeach
                                            <form action="{{ url('/') }}" method="POST">
                                                @csrf
                                                <div class="comment-input">
                                                    <input type="hidden" name="post_id" value="{{ $raw['id'] }}">
                                                    <input type="text" name="comment" class="form-control">
                                                    <div class="fonts"> <button
                                                            type="submit">Comment!!</button> </div>
                                                </div>
                                            </form>
                                        </div>

                                    @endforeach

                                </div>
                                {{-- <div class="comments">
                                {{-- ########################################################### --}}

                            </div>
                            <div class="col-4"></div>
                        </div>
                        <!--/row-->
                    </div><!-- /col-9 -->


                    <div class="col-sm-2" style="align-content: center;">

                        <!-- content -->
                        <div class="row" style="justify-content: center;">
                            <!-- main col left -->
                            <!-- main col right -->
                            <div class="col-4">

                                <div class="panel panel-default" style="width: 120%">

                                    <div class="panel-heading">Suggestions
                                    </div>
                                    @foreach ($sugg as $user )

                                  <div class="panel-body">

                                        <div class="" style="display: inline-block">
                                            <img
                                            src="{{ url('/Uploads/'.$user['image']) }}"
                                            width="40px" height="40px" style="border-radius: 10%"
                                            class="rounded-image">
                                            <h5><a href="{{ url('/User/profile/'.$user['id']) }}" class="profile-link">{{ $user["name"] }}</a></h5>

                                          </div>
                                    <hr>

                                    </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>

                    </div>
                    <!--/row-->
                </div>
            </div><!-- /padding -->
        </div>
        <!-- /main -->
    </div>


    <!--post modal-->

    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('[data-toggle=offcanvas]').click(function() {

                $(this).toggleClass('visible-xs text-center');

                $(this).find('i').toggleClass('glyphicon-chevron-right glyphicon-chevron-left');

                $('.row-offcanvas').toggleClass('active');

                $('#lg-menu').toggleClass('hidden-xs').toggleClass('visible-xs');

                $('#xs-menu').toggleClass('visible-xs').toggleClass('hidden-xs');

                $('#btnShow').toggle();

            });

        });
    </script>
</body>

</html>

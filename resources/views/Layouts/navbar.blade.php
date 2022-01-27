
<nav class="navbar navbar-expand-lg navbar-light " style="background-color: #ff8eb7">
    <div class="container-fluid">
        <a href="/Waseet/home/index.php" class="logo d-flex align-items-center">
            <img src="../Design/WLogo.jpg" alt="" height="60" width="60">
            <span></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/waseet/home/index.php">Home</a>
                </li>

                <a class="nav-link active" aria-current="page" href="/Waseet/home/login.php">Signin/Register</a>

                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        My Account
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="">Profile</a></li>

                        <li>
                        <li><a class="dropdown-item" href="/Waseet/Ads/myAds.php">My ADS</a></li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="/waseet/home/logout.php">SignOut</a></li>
                    </ul>
                </li> --}}


            </ul>
            <div class="container input-group ml" style="width: 40%">
                <span class="input-group-text" id="basic-addon1">@</span>
                <input type="text" class="form-control me-3" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                <span class="input-group-text" id="basic-addon1">#</span>
                <input type="password" class="form-control me-3" placeholder="password" aria-label="password" aria-describedby="basic-addon1">
              </div>
        </div>
    </div>
</nav>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

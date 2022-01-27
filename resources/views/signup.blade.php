@include('Layouts.header');
@include('Layouts.navbar');


<main>
    <div class="container">

        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Create Account</li>


        </ol>
        <div class="card mb-4">
         <div class="card-body">

                <form action="{{ url('/User/create')}}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        @csrf
                        <label for="exampleInputName">username</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" aria-describedby=""
                            placeholder="Enter Title">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">email</label>
                        <input class="form-control" placeholder="Enter Title" name="email">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputName">password</label>
                        <input type="password" class="form-control"  name="password" aria-describedby="">
                    </div>


                <div class="mb-3">
                    <label for="formFile" class="form-label">Choose a Picture </label>
                    <input class="form-control" type="file" id="image" name="image">
                </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</main>




@include('Layouts.footer');

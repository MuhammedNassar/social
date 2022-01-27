
@include('Layouts.header');
{{-- @include('Layouts.navbar'); --}}
<div class="container">

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Login to your Account  </li>


    </ol>
    <div class="card mb-4">
     <div class="card-body">
<form   action='{{ url("/User/login")}}' method="POST">

@csrf
<div class="form-group">
  <label for="exampleInputEmail1">Email address</label>
  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
</div>
<div class="form-group">
  <label for="exampleInputPassword1">Password</label>
  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
</div>

<div class="form-group">
  <p class="form-check-label" for="exampleCheck1">
    <a href="{{ url('/User/create') }}">creat new account</a>
  </p>
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</div>
</div>

@include('Layouts.footer');

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">


            <form action="{{route('admin.login.post')}}" method="post">

            @csrf

            <h3 class="mb-5">Sign in</h3>

            <div class="form-outline mb-4">
              <input type="email" id="typeEmailX-2" name="email" class="form-control form-control-lg" required>
              <label class="form-label" for="typeEmailX-2">Email</label>
              @error('email')
              <div class="alert alert-danger">{{ $message}}</div>
              @enderror
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2" name="password" class="form-control form-control-lg" required>
              <label class="form-label" for="typePasswordX-2">Password</label>
              @error('password')
              <div class="alert alert-danger">{{ $message}}</div>
              @enderror
            </div>

            

            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

            <hr class="my-4">

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin 2 - Login</title>
  <link rel="stylesheet" href="form_style/form.css" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="{{ route('login.action') }}" method="POST" class="sign-in-form">
                @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Email Address...">
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-user">Login</button>
                <p class="social-text">Or Sign in with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
            <form action="{{ route('register.save') }}" method="POST" class="sign-up-form">
                <h2 class="title">Sign up</h2>
                @csrf
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input name="name" type="text" class="form-control form-control-user @error('name')is-invalid @enderror" id="exampleInputName"placeholder="Username"/>
                    @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input name="email" type="email" class="form-control form-control-user @error('email')is-invalid @enderror" id="exampleInputEmail" placeholder="Email" />
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input  name="password" type="password" class="form-control form-control-user @error('password')is-invalid @enderror" id="exampleInputPassword" placeholder="Password" />
                    @error('password')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input  name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation')is-invalid @enderror" id="exampleRepeatPassword" placeholder="Repeat Password"/>
                    @error('password_confirmation')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="btn">Sign up</button>
                <p class="social-text">Or Sign up with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>New here ?</h3>
                <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                ex ratione. Aliquid!
                </p>
                <button class="btn transparent" id="sign-up-btn">
                Sign up
                </button>
            </div>
            <img src="form_style/img/signup.png" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                laboriosam ad deleniti.
                </p>
                <button class="btn transparent" id="sign-in-btn">
                Sign in
                </button>
            </div>
            <img src="form_style/img/login.png" class="image" alt="" />
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="chart-area-demo.js"></script>
<script src="chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>
<script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
    });
</script>
</body>
</html>
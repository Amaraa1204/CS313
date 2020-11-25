<head>
    <link rel="stylesheet" type="text/css" href="{{ asset('loginsignup.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap" rel="stylesheet">
    <meta charset="utf8">
</head>
<body>

    <div class="container" id="container">
        <div class="form-container sign-up-container">
             <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <p id="create">Create Account</p>

                <input id="user_name" type="text" placeholder="Username" name="user_name" required />
                <input id="first_name" type="text" placeholder="First name" name="first_name" required />
                <input id="last_name" type="text" placeholder="Last name" name="last_name" required />
                <input id="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email" name="email"
                required value="{{ old('email') }}"/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="picture-upload">
                <p id="photo-p">Photo:</p>

                <label class="upload" for="photo">Choose file</label>
                <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" name="photo" value="{{ old('photo') }}" required autocomplete="photo" id="upload-photo" style="opacity: 0;" multiple>
                </div>
                <input id="password" type="password" placeholder="Password" name="password" required class="form-control @error('password') is-invalid @enderror" autocomplete="new-password"/>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input id="password-confirm" type="password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                <button type="submit" class="nes-btn is-primary">Sign Up</button>
                <!--<input type="hidden" name="_token" value="{{ Session::token() }}">-->
            </form>
        </div>

        <div class="form-container sign-in-container">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <h1>Нэвтрэх</h1>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <!--<a href="#">Forgot your password?</a>-->
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
                @endif
                Remember me
                 <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <button class="nes-btn is-primary">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>
                        To keep connected with us please login with your personal info
                    </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        const signUpButton = document.getElementById('signUp');
        const signInButton = document.getElementById('signIn');
        const container = document.getElementById('container');

        signUpButton.addEventListener('click', () => {
            container.classList.add('right-panel-active');
        });

        signInButton.addEventListener('click', () => {
            container.classList.remove('right-panel-active');
        });
    </script>
</body>
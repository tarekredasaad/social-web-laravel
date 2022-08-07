<!DOCTYPE html>
<html lang="en">
   <head>
   @include('layout.pagecss')
    </head>
<body style="font-family: tohoma; background-color:#d0d8e4;">
<div  id="blue_bar">
        <div style="width: 800px; ">
            MyBook &nbsp &nbsp
           
        </div>
    </div>
    <div class="container">
    <div class="container">
    @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<form class="signup form" action="" method="POST">
	<h4 class="text-center"> </h4>
    <div class="form-group">
	<input class="form-control" type="text" name="first_user" placeholder="First name" autocomplete="off" require>
	<input class="form-control" type="text" name="last_user" placeholder="Last name" autocomplete="off" required>
	
    <input class="form-control" type="password" name="pass" placeholder="Password" autocomplete="new-password" required>
	<input class="form-control" type="password" name="pass2" placeholder="Password again" autocomplete="new-password" required>
	<input class="form-control" type="email" name="email" placeholder="Email" required>
    <label>Gender</label>
    <select name="gender" id="">
        <option ><?php echo '...' ; ?></option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
    </select>
    </div>
	<input class="btn btn-success btn-block" type="submit" name="signup" value="signup">

</form>
    </div>
</body>
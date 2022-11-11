@extends('../authTemplate/main')

@section('title', "Login")
@section('content')
   <div class="card-body login-card-body">
      @if (session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>{{ session('loginError') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

      <p class="login-box-msg">Sign in to start your session</p>

      <form action="{{ route('authLogin') }}" method="POST">
        @method('post')
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" name="email" id="email" autofocus required value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock" id="lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1">
        <a href="forgot-password.html">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.login-card-body -->
@endsection

 @push('scripts')
  <script>
    let lock = document.getElementById('lock')
    lock.addEventListener('click', function(){
      let inputPass = document.querySelector('input[name="password"]')
      let attrPass = inputPass.getAttribute('type')
      if (attrPass == 'password'){
        inputPass.setAttribute('type', 'text')
        lock.classList.remove('fa-lock')
        lock.classList.add('fa-lock-open')
      }else{
        inputPass.setAttribute('type', 'password')
        lock.classList.add('fa-lock')
        lock.classList.remove('fa-lock-open')
      }
    })
  </script>
 @endpush

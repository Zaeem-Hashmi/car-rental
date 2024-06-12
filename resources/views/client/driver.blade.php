@extends('client.layouts.index')

@section('container')
    <!-- Start: Registration Form with Photo -->
    <section class="register-photo" style="margin-top: 100px;">
        <!-- Start: Form Container -->
        <div class="form-container">
            <!-- Start: Image -->
            <div class="image-holder"></div>
            <!-- End: Image -->
            <form action="register" method="POST">
                @csrf

                <h2 class="text-center" style="margin-top: -18px;"><strong>Create</strong> an account.</h2>
                <p class="text-center" style="margin-top: 1px;">Partner with us to drive your own livelihood and more.<br>
                </p>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <input type="number" name="role_id" value="2" hidden>
                <div class="mb-3">
                    <input type="email" name="email" placeholder="Email"
                        class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="text" name="username" placeholder="Username"
                        class="form-control @error('username') is-invalid @enderror" required
                        value="{{ old('username') }}">
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password" placeholder="Password"
                        class="form-control @error('password') is-invalid @enderror" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <input type="password" name="password_confirmation" placeholder="Password (repeat)"
                        class="form-control @error('confirm_password') is-invalid @enderror" required>
                    @error('confirm_password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" required>I agree to the license
                            terms.</label>
                    </div>
                </div>
                <div class="mb-3">
                    <input class="btn btn-primary d-block w-100" type="submit" name="signUp-button"
                        style="background: rgb(254,209,54);" value="Sign Up">
                </div>
                <a class="already" href="/login">Already have an account? Login here.</a>
            </form>
        </div>

        <!-- End: Form Container -->
    </section>
    <!-- End: Registration Form with Photo -->
@endsection

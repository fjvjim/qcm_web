@extends('/log_layout')

@section('contain')
<section id="form"><!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form"><!--login form-->
                    <h2>Login to your account</h2>
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Adresse e-mail" value="{{ @old('email') }}" required="required"/>
                        </div>
                        <div class="form-groupe">
                            <input type="password" name="password" placeholder="Mot de passe" value="{{ @old('password') }}" required="required"/>
                        </div>
                        <button type="submit" class="btn btn-default">Connecter</button>
                    </form>
                </div><!--/login form-->
            </div>

        </div>
    </div>
</section>
@endsection

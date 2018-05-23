@extends('frontend.layouts')

@section('content')
    <div class="content">
        <!--login-->
        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile">
                        @if (session('messages_session'))
                            <div class="alert alert-success">
                                <strong>Success!</strong> {!! session('messages_session') !!}
                            </div>

                        @endif
                    <h3>Đăng nhập</h3>
                    <form  method="post"  action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}" style="padding-top: 20px; ">
                            <div class=" col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Nhập Email"  autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row {{ $errors->has('email') ? ' has-error' : '' }}" style="padding-top: 20px; ">
                            <div class=" col-md-12">
                                <input id="password" type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Nhập mật khẩu"  autofocus>
                                @if ($errors->has('password'))
                                    <span class="help-block">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </form>
                </div>
                <div class="forg">
                    <a href="{{ route('password.request') }}" class="forg-left">Forgot Password</a>
                    <a href="{{ route('register') }}" class="forg-right">Register</a>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--login-->
    </div>
    <div class="columns-container" style="margin-top:10px;">

</div>
@endsection





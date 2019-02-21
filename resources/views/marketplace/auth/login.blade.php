@extends('marketplace.layouts.app')
@section('title', 'Login')
@section('content')
<div class="log-page">
    <div class="login-page d-flex">
        <div class="container box1">
            <div class="d-flex justify-content-between  flex-wrap login-block">
                <div class="flex-column sign-in-block">
                    <div class="flip">
                        <div class="signFrom">
                            <h3>Have an account ?</h3>
                            <div class="text-box-design text-box-design1">
                                <input type="text" class="txt-box" placeholder="Email Address" readOnly />
                            </div>
                            <div class="text-box-design text-box-design1">
                                <input type="password" class="txt-box" placeholder="Password" readOnly />
                            </div>
                            <div class="text-box-design">
                                <button type="button" class="btn sig-btn"> Sign In</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-column sign-up-block">
                    <div class="flip">
                        <div class="signFrom txt-box-2">
                            <h3>Haven't an account ?</h3>
                            <div class="text-box-design text-box-design1">
                                <input type="text" class="txt-box2" placeholder="Given Name" readOnly />
                            </div>
                            <div class="text-box-design text-box-design1">
                                <input type="text" class="txt-box2" placeholder="Family Name" readOnly />
                            </div>
                            <div class="text-box-design text-box-design1">
                                <input type="text" class="txt-box2" placeholder="Email Address" readOnly />
                            </div>
                            <div class="text-box-design text-box-design1">
                                <input type="text" class="txt-box2" placeholder="Password" readOnly />
                            </div>
                            <div class="text-box-design text-box-design1">
                                <input type="text" class="txt-box2" placeholder="Confirm Password" readOnly />
                            </div>
                            <div class="text-box-design">
                                <button type="button" class="btn sig-up-btn"> Sign Up</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="signFormsDiv">
                <div class="signFormInputs login">
                    {{ Form::open(['route' => 'member.login', 'method' => 'post', 'id' => 'loginForm']) }}
                        <img src="images/logo copy 3.png" />
                        <div class="table_cell mt-5 ml-5">
                            <h2>Sign In</h2>
                            <div class="text-box-design mt-5">
                                {{ Form::text('email', null, ['class' => 'txt-box3', 'placeholder' => 'Email Address']) }}
                                <span class="error email"></span>
                            </div>
                            <div class=" text-box-design">
                                {{ Form::password('password', ['class' => 'txt-box3', 'placeholder' => 'Passwqord']) }}
                                <span class="error password"></span>
                            </div>
                            <div class="">
                                <button type="button" class="sign-in-button" id="loginBtn">Enter</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="signFormInputs signUp">
                    {{ Form::open(['route' => 'member.register', 'method' => 'post', 'id' => 'registerForm']) }}
                        <img src="images/logo copy 3.png" />
                        <div class="table_cell  mt-5 ml-5">
                            <h2>Sign Up</h2>
                            <div class="text-box-design mt-5">
                                {{ Form::text('given_name', null, ['class' => 'txt-box3', 'placeholder' => 'Given Name']) }}
                                <span class="error given_name"></span>
                            </div>
                            <div class="text-box-design ">
                                {{ Form::text('family_name', null, ['class' => 'txt-box3', 'placeholder' => 'Family Name']) }}
                                <span class="error family_name"></span>
                            </div>
                            <div class="text-box-design">
                                {{ Form::text('email', null, ['class' => 'txt-box3', 'placeholder' => 'Email Address']) }}
                                <span class="error email"></span>
                            </div>
                            <div class="text-box-design">
                                {{ Form::password('password', ['class' => 'txt-box3', 'placeholder' => 'Passwqord']) }}
                                <span class="error password"></span>
                            </div>
                            <div class="text-box-design">
                                {{ Form::password('password_confirmation', ['class' => 'txt-box3', 'placeholder' => 'Confirm Passwqord']) }}
                                <span class="error password_confirmation"></span>
                            </div>
                            <div class="">
                                <button type="button" id="registerBtn" class="sign-up-button">Create an account</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
$(function() {
    $(".flip").click(function () {
        $('span.error').empty().hide();
        $(".box1").toggleClass("loginTrans");
    });

    // login the user
    $(document).on('click', '#loginBtn', function(e) {
        e.preventDefault();
        startLoader();
        $('span.error').empty().hide();
        $.ajax({
            url: $('#loginForm').attr('action'),
            data: $('#loginForm').serialize(),
            type: 'post',
            success: function(data) {
                window.location.href = data.redirectTo;
            }
        });
    });

    // signup the user
    $(document).on('click', '#registerBtn', function(e) {
        e.preventDefault();
        startLoader();
        $('span.error').empty().hide();
        $.ajax({
            url: $('#registerForm').attr('action'),
            data: $('#registerForm').serialize(),
            type: 'post',
            success: function(data) {
                window.location.href = data.redirectTo;
            }
        });
    });
});
</script>
@endsection
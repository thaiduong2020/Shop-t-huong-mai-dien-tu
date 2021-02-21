<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <!-- Bootstrap CSS -->

    <!-- Style -->

    <title>Đăng nhập</title>
    <style>
        body {
            background:url(/storage/image/hoa-mai.png) #900 ;
  font-family: "Roboto", sans-serif;
  background-color: #fff; }

p {
  color: #b3b3b3;
  font-weight: 300; }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: "Roboto", sans-serif; }

a {
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }
  a:hover {
    text-decoration: none !important; }

.content {
  padding: 7rem 0; }

h2 {
  font-size: 20px; }

.half, .half .container > .row {
  height: 100vh;
  min-height: 700px; }

.half .bg {
  height: 200px; }
  @media (max-width: 991.98px) {
    .half .bg {
      height: 200px; } }

.half .contents {
  background: #f6f7fc; }

.half .contents, .half .bg {
  width: 100%; }
  @media (max-width: 1199.98px) {
    .half .contents, .half .bg {
      width: 100%; } }
  .half .contents .form-control, .half .bg .form-control {
    border: none;
    border-radius: 4px;
    height: 54px;
    background: #efefef; }
    .half .contents .form-control:active, .half .contents .form-control:focus, .half .bg .form-control:active, .half .bg .form-control:focus {
      outline: none;
      -webkit-box-shadow: none;
      box-shadow: none; }

.half .bg {
  background-size: cover;
  background-position: center; }

.half a {
  color: #888;
  text-decoration: underline; }

.half .btn {
  height: 54px;
  padding-left: 30px;
  padding-right: 30px; }

.half .forgot-pass {
  position: relative;
  top: 2px;
  font-size: 14px; }

.form-block {
  background: #fff;
  padding: 40px;
  margin-top: -300px; }
  @media (max-width: 991.98px) {
    .form-block {
      padding: 25px; } }

.control {
  display: block;
  position: relative;
  padding-left: 30px;
  margin-bottom: 15px;
  cursor: pointer;
  font-size: 14px; }
  .control .caption {
    position: relative;
    top: .2rem;
    color: #888; }

.control input {
  position: absolute;
  z-index: -1;
  opacity: 0; }

.control__indicator {
  position: absolute;
  top: 2px;
  left: 0;
  height: 20px;
  width: 20px;
  background: #e6e6e6;
  border-radius: 4px; }

.control--radio .control__indicator {
  border-radius: 50%; }

.control:hover input ~ .control__indicator,
.control input:focus ~ .control__indicator {
  background: #ccc; }

.control input:checked ~ .control__indicator {
  background: #fb771a; }

.control:hover input:not([disabled]):checked ~ .control__indicator,
.control input:checked:focus ~ .control__indicator {
  background: #fb8633; }

.control input:disabled ~ .control__indicator {
  background: #e6e6e6;
  opacity: 0.9;
  pointer-events: none; }

.control__indicator:after {
  font-family: 'icomoon';
  content: '\e5ca';
  position: absolute;
  display: none;
  font-size: 16px;
  -webkit-transition: .3s all ease;
  -o-transition: .3s all ease;
  transition: .3s all ease; }

.control input:checked ~ .control__indicator:after {
  display: block;
  color: #fff; }

.control--checkbox .control__indicator:after {
  top: 50%;
  left: 50%;
  margin-top: -1px;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%); }

.control--checkbox input:disabled ~ .control__indicator:after {
  border-color: #7b7b7b; }

.control--checkbox input:disabled:checked ~ .control__indicator {
  background-color: #7e0cf5;
  opacity: .2; }

    </style>
  </head>
  <body style="background-color: #900;">
    @if (Auth::check())
<script>window.location = "{{ route('home') }}";</script>
@endif

  <div class="half">
    <div class="bg order-1 order-md-2"></div>
    <div class="contents order-2 order-md-1" style="    margin: 16em 32em; width: 35% !important;">

        <div class="form-block">
            <div class="text-center mb-5">
            <h3>Đăng nhập </h3>
            <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
            </div>
            @if (session('check'))
            <div class="alert alert-danger">
                {{session('check')}}
            </div>
            @endif
            <form  action="{{ route('dangnhap') }}" method="POST">
                @csrf
              <div class="form-group first">
                <label for="username">Tài khoản</label>
                <input type="text" class="form-control"  value="{{ old('email') }}" name="email">
                @if ($errors->has('email'))
                    <div class="alert alert-danger">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
              </div>
              <div class="form-group last mb-3">
                <label for="password">Mật khẩu</label>
                <input type="password" class="form-control"  name="password">
                @if ($errors->has('password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                    @endif
              </div>

              <div class="d-sm-flex mb-5 align-items-center">
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="{{ route('getdangky')}} " class="forgot-pass" id="checkregis">Tạo tài khoản mới </a></span>
              </div>

              <input type="submit" value="Đăng nhập" class="btn btn-block btn-primary">

            </form>
                      </div>
    </div>


  </div>


  <script>
      $(document).ready(function(){
          $('#register').hide();
          $('#checkregis').click(function(){
            $('#register').show()
            $('#login').hide();
          })
      })
  </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>

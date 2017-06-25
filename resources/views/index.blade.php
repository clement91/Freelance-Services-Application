<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>fsa | Freelance Services Application</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('vendors/Bootstrap//bootstrap.css') }}" rel="stylesheet" type="text/css">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Hire Freelance Services
                </div>

                <div class="m-b-md custom-n-txt">
                    Find online freelancers to help you get things done. Any Size. Any Time.
                </div>

                <div class="m-b-md">
                    <input type="text" class="form-control txt-ffs" placeholder="Find freelance services here ..." id="txt-ffs" name="txt-ffs">
                    <br/>
                    <div class="loptions-group hide">
                      <div class="form-group">
                        <div class="custom-n-txt col-sm-2">
                          Category:
                        </div>
                        <div class="col-sm-4">
                            <div class="dropdown pull-left">
                              <button class="btn btn-default dropdown-toggle custom-dropdown" type="button" id="btn-category" name="btn-category" data-toggle="dropdown" style="width:100%"
                                aria-haspopup="true" aria-expanded="true">
                                <span class="caret pull-right dropdown-custom-caret"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="btn-category">
                                <li><a href="#" class="dropdown-items">Graphic & Design</a></li>
                                <li><a href="#" class="dropdown-items">Writing & Translation</a></li>
                                <li><a href="#" class="dropdown-items">Video & Animation</a></li>
                                <li><a href="#" class="dropdown-items">Business</a></li>
                              </ul>
                            </div>
                        </div>

                        <div class="custom-n-txt col-sm-2">
                          Location:
                        </div>
                        <div class="col-sm-4">
                            <div class="dropdown pull-left">
                              <button class="btn btn-default dropdown-toggle custom-dropdown" type="button" id="btn-category" name="btn-category" data-toggle="dropdown" style="width:100%"
                                aria-haspopup="true" aria-expanded="true">
                                <span class="caret pull-right dropdown-custom-caret"></span>
                              </button>
                              <ul class="dropdown-menu" aria-labelledby="btn-category">
                                <li><a href="#" class="dropdown-items">Malaysia</a></li>
                                <li><a href="#" class="dropdown-items">Singapore</a></li>
                                <li><a href="#" class="dropdown-items">Thailand</a></li>
                                <li><a href="#" class="dropdown-items">Australia</a></li>
                              </ul>
                            </div>
                        </div>

                      </div>

                      <div class="m-b-md col-sm-offset-6 col-sm-10">
                        <a href="#" id="loptions" class="loptions">- Less Options</a>
                      </div>
                    </div>
                    <div class="moptions-group col-sm-offset-6 col-sm-10">
                      <a href="#" id="moptions" class="moptions">+ More Options</a>
                    </div>
                </div>

                <div class="form-group">
                  <div class="col-sm-offset-1 col-sm-10">
                      <input type="button" class="btn btn-warning btn-lg" id="btn-hiw" value="How It Works">
                      &nbsp;&nbsp;
                      <input type="button" class="btn btn-success btn-lg" id="btn-register" value="Register">
                  </div>
                </div>
        </div>

        <!-- Core JavaScript -->
        <script src="{{ asset('vendors/jQuery/jquery.js') }}"></script>
        <script src="{{ asset('vendors/Bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset('js/index.js') }}"></script>

    </body>
</html>

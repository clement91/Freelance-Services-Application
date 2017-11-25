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

        <!-- vendors css -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{ asset('vendors/css/agency/css/themify-icons.css') }}">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
        <!-- Google fonts - Roboto Condensed for headings, Open Sans for copy-->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,700%7COpen+Sans:300,400,700">
        <!-- theme stylesheet-->
        <link rel="stylesheet" href="{{ asset('vendors/css/agency/css/style.default.css') }}" id="theme-stylesheet">
        <!-- Custom stylesheet - for your changes-->
        <link rel="stylesheet" href="{{ asset('vendors/css/agency/css/custom.css') }}">
        <!-- Favicon-->
        <link rel="shortcut icon" href="{{ asset('vendors/img/agency/img/favicon.png') }}">

    </head>
    {{--
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

        <!--Core JavaScript-->
        <script src="{{ asset('vendors/jQuery/jquery.js') }}"></script>
        <script src="{{ asset('vendors/Bootstrap/bootstrap.js') }}"></script>
        <script src="{{ asset('js/index.js') }}"></script>

    </body>
    --}}
    <body data-spy="scroll" data-target="#navigation" data-offset="120">
      <!-- intro-->
      <section id="intro" class="intro image-background">
        <div class="overlay"></div>

        <div style="z-index:3" class="top-right links">
            @if (Auth::check())
                <a href="{{ url('/dashboard') }}">Dashboard</a>
            @else
                <a href="{{ url('/login') }}">Login</a>
                <a href="{{ url('/register') }}">Register</a>
            @endif
        </div>

        <div class="content">
          <div class="container clearfix">
            <div class="row">
              <div class="col-md-8 col-md-offset-2 col-sm-12">
                <p class="roboto">Welcome to fsa project</p>
                <h1>Hire<br /><span class="bold">Freelance Services</span></h1>
                <p class="roboto">Find online freelancers to help you get things done. Any Size. Any Time.
                  {{--
                    <a href="http://bootstrapious.com" class="external">Bootstrapious.com</a>
                  --}}
                </p>
              </div>
            </div>
          </div>
        </div>
        <a href="#about" class="icon faa-float animated scroll-to"><i class="fa fa-angle-double-down"></i></a>
      </section>
      <!-- navbar-->
      <header class="header">
        <div class="sticky-wrapper">
          <div role="navigation" class="navbar navbar-default">
            <div class="container">
              <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target=".navbar-collapse" class="navbar-toggle"><span class="icon-bar">
                </span><span class="icon-bar"></span><span class="icon-bar"></span></button>
                <a href="#intro" class="navbar-brand scroll-to">
                  <!--<img src="{{ asset('vendors/img/agency/img/logo.png') }}" alt="">-->
                </a>
              </div>
              <div id="navigation" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#intro">Home</a></li>
                  <li><a href="#about">About </a></li>
                  <li><a href="#services">Services</a></li>
                  <!--
                  <li><a href="#portfolio">Portfolio</a></li>
                  <li><a href="#text">Text</a></li>
                  <li><a href="#team">Team</a></li>
                  -->
                  <li><a href="#contact">Contact</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </header>
      <!-- /.navbar-->
      <!-- about us-->
      <section id="about">
        <div class="container clearfix">
          <div class="row margin-bottom">
            <div class="col-md-6 margin-bottom">
              <h2 class="heading">About us</h2>
              <p class="lead">Hire freelance service like how you book a hotel.</p>
              <p style="text-align: justify;">
                Living in the era of technology, easy access internet allows people to stay connected anywhere and anytime.
                Hence, introduce a new platform providing a great opportunity connecting people together.
                Everyone could have a dream to start-ups their own businesses online, introduce their own unique
                services and products which able to earn an extra income in their leisure.
                Also, sharing their knowledge and skills around the world.
              </p>
              <div class="row">
                <div class="col-sm-6">
                  <ul>
                    <li>Stay connected together</li>
                    <li>Easily Setup</li>
                    <li>Sharing your passion</li>
                  </ul>
                </div>
                <div class="col-sm-6">
                  <ul>
                    <li>Earn extra income</li>
                    <li>Sharing knowledge</li>
                    <li>Sharing skillsets</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-6 margin-bottom">
              <p><img src="{{ asset('vendors/img/agency/img/template-homepage.png') }}" alt="" style="width: 90%;" class="img-responsive"></p>
            </div>
          </div>
          <div class="row">
            {{--
            <div class="col-sm-6">
              <h5><i class="fa fa-arrows"></i>Effects present letters inquiry no an removed or friends.</h5>
              <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming.</p>
            </div>
            <div class="col-sm-6">
              <h5> <i class="fa fa-image"></i>Effects present letters inquiry no an removed or friends.</h5>
              <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming.</p>
            </div>
            --}}
          </div>

          <div class="container clearfix">
            <br/>
            <p class="lead text-center">Don't wait any longer, start your search now.</p>
            <div class="row text-center">
              <div class="col-md-2"></div>
              <!--
              <input type="text" class="form-control txt-ffs" placeholder="Find freelance services here ..." id="txt-ffs" name="txt-ffs"
                style="width: 70%;height: 45px;border-radius: 8px;">
              -->
            </div>
            <br/>
            <div class="form-group text-center">
              <div class="col-sm-offset-1 col-sm-10">
                  <input type="button" class="btn btn-warning btn-lg" id="btn-hiw" value="How It Works">
                  &nbsp;&nbsp;
                  <input type="button" class="btn btn-success btn-lg" id="btn-register" value="Register">
              </div>
            </div>
          </div>

        </div>

      </section>
      <!-- services-->
      <section id="services" class="section-gray">
        <div class="container clearfix">
          <div class="row services">
            <div class="col-md-12">
              <h2 class="heading">Services</h2>
              <div class="row">
                <div class="col-sm-4">
                  <div class="box box-services">
                    <div class="icon"><i class="ti-desktop"></i></div>
                    <h4 class="heading">Webdesign</h4>
                    <p>Hire the best web designer and developer here to maximize your business creativity and productivity.</p>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="box box-services">
                    <div class="icon"><i class="ti-printer"></i></div>
                    <h4 class="heading">Writting & Translation</h4>
                    <p>Increase your efficiency by hiring professional writter and translator.</p>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="box box-services">
                    <div class="icon"><i class="ti-search"></i></div>
                    <h4 class="heading">Custom logo & Banner</h4>
                    <p>Aim to focus on the edges got it excellence products. </p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="box box-services">
                    <div class="icon"><i class="ti-comments"></i></div>
                    <h4 class="heading">Data Entry</h4>
                    <p>Speed up the daily routine process by hiring great entries here.</p>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="box box-services">
                    <div class="icon"><i class="ti-email"></i></div>
                    <h4 class="heading">Lessons</h4>
                    <p>Find any lesson range that you need. From culinary to music, choose based on your need.</p>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="box box-services">
                    <div class="icon"><i class="ti-email"></i></div>
                    <h4 class="heading">Others & More.</h4>
                    <p>Can't find what you're looking for? Tell us what you need.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- portfolio-->
      <section id="portfolio" class="no-padding-bottom hide">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading">Portfolio</h2>
              <p class="text-center">You can make also a portfolio or image gallery.</p>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <div class="row no-space">
            <div class="col-sm-4 col-md-3">
              <div class="box"><a href="#" title=""><img src="{{ asset('vendors/img/agency/img/portfolio-1.jpg') }}" alt="" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-4 col-md-3">
              <div class="box"><a href="#" title=""><img src="{{ asset('vendors/img/agency/img/portfolio-7.jpg') }}" alt="" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-4 col-md-3">
              <div class="box"><a href="#" title=""><img src="{{ asset('vendors/img/agency/img/portfolio-3.jpg') }}" alt="" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-4 col-md-3">
              <div class="box"><a href="#" title=""><img src="{{ asset('vendors/img/agency/img/portfolio-5.jpg') }}" alt="" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-4 col-md-3">
              <div class="box"><a href="#" title=""><img src="{{ asset('vendors/img/agency/img/portfolio-4.jpg') }}" alt="" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-4 col-md-3">
              <div class="box"><a href="#" title=""><img src="{{ asset('vendors/img/agency/img/portfolio-6.jpg') }}" alt="" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-4 col-md-3">
              <div class="box"><a href="#" title=""><img src="{{ asset('vendors/img/agency/img/portfolio-2.jpg') }}" alt="" class="img-responsive"></a></div>
            </div>
            <div class="col-sm-4 col-md-3">
              <div class="box"><a href="#" title=""><img src="{{ asset('vendors/img/agency/img/portfolio-8.jpg') }}" alt="" class="img-responsive"></a></div>
            </div>
          </div>
        </div>
      </section>
      <!-- text-->
      <section id="text" class="section-gray hide">
        <div class="container clearfix">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading">Text page</h2>
              <div class="row">
                <div class="col-sm-6">
                  <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh. </p>
                  <p>Betrayed cheerful declared end and. Questions we additions is extremely incommode. Next half add call them eat face. Age lived smile six defer bed their few. Had admitting concluded too behaviour him she. Of death to or to being other. </p>
                </div>
                <div class="col-sm-6">
                  <p>Effects present letters inquiry no an removed or friends. Desire behind latter me though in. Supposing shameless am he engrossed up additions. My possible peculiar together to. Desire so better am cannot he up before points. Remember mistaken opinions it pleasure of debating. Court front maids forty if aware their at. Chicken use are pressed removed. </p>
                  <p>Saw yet kindness too replying whatever marianne. Old sentiments resolution admiration unaffected its mrs literature. Behaviour new set existence dashwoods. It satisfied to mr commanded consisted disposing engrossed. Tall snug do of till on easy. Form not calm new fail. </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- team-->
      {{--
      <section id="team">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading">Our team</h2>
              <div class="row"></div>
              <!-- team-member-->
              <div class="col-md-3 col-sm-6">
                <div class="team-member">
                  <div class="image"><a href="#"><img src="{{ asset('vendors/img/agency/img/person-1.jpg') }}" alt="" class="img-responsive"></a></div>
                  <h3><a href="#">Han Solo</a></h3>
                  <p class="role">Founder</p>
                  <div class="social">
                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                  </div>
                  <div class="text">
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                  </div>
                </div>
              </div>
              <!-- team-member col end-->
              <!-- team-member-->
              <div class="col-md-3 col-sm-6">
                <div class="team-member">
                  <div class="image"><a href="#"><img src="{{ asset('vendors/img/agency/img/person-2.jpg') }}" alt="" class="img-responsive"></a></div>
                  <h3><a href="#">Luke Skywalker</a></h3>
                  <p class="role">CTO</p>
                  <div class="social">
                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                  </div>
                  <div class="text">
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                  </div>
                </div>
              </div>
              <!-- team-member col end-->
              <!-- team-member-->
              <div class="col-md-3 col-sm-6">
                <div class="team-member">
                  <div class="image"><a href="#"><img src="{{ asset('vendors/img/agency/img/person-3.jpg') }}" alt="" class="img-responsive"></a></div>
                  <h3><a href="#">Princess Leia</a></h3>
                  <p class="role">Team Leader</p>
                  <div class="social">
                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                  </div>
                  <div class="text">
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                  </div>
                </div>
              </div>
              <!-- team-member col end-->
              <!-- team-member-->
              <div class="col-md-3 col-sm-6">
                <div class="team-member">
                  <div class="image"><a href="#"><img src="{{ asset('vendors/img/agency/img/person-4.jpg') }}" alt="" class="img-responsive"></a></div>
                  <h3><a href="#">Jabba Hut</a></h3>
                  <p class="role">Lead Developer</p>
                  <div class="social">
                    <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                    <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                  </div>
                  <div class="text">
                    <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
                  </div>
                </div>
              </div>
              <!-- team-member col end-->
            </div>
          </div>
        </div>
      </section>
        --}}
      <!-- map-->
      <section id="map"></section>
      <section id="contact">
        <div class="container clearfix">
          <div class="row">
            <div class="col-md-12">
              <h2 class="heading">Contact</h2>
              <div class="row">
                <div class="col-md-6">
                  <form id="contact-form" method="post" action="contact.php" class="contact-form form">
                    <div class="controls">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="name">Your firstname *</label>
                            <input type="text" name="name" id="name" placeholder="Enter your firstname" required="required" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label for="surname">Your lastname *</label>
                            <input type="text" name="surname" id="surname" placeholder="Enter your  lastname" required="required" class="form-control">
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email">Your email *</label>
                        <input type="email" name="email" id="email" placeholder="Enter your  email" required="required" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="message">Your message for us *</label>
                        <textarea rows="4" name="message" id="message" placeholder="Enter your message" required="required" class="form-control"></textarea>
                      </div>
                      <div class="text-center">
                        <input type="submit" value="Send message" class="btn btn-primary btn-block">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-md-6">
                  <!--
                  <p>Effects present letters inquiry no an removed or friends. Desire behind latter me though in. Supposing shameless am he engrossed up additions. My possible peculiar together to. Desire so better am cannot he up before points. Remember mistaken opinions it pleasure of debating. Court front maids forty if aware their at. Chicken use are pressed removed. </p>
                  <p>Able an hope of body. Any nay shyness article matters own removal nothing his forming. Gay own additions education satisfied the perpetual. If he cause manor happy. Without farther she exposed saw man led. Along on happy could cease green oh. </p>
                  -->
                  <p class="lead">Drop us an email, let us know your feedback, we would love to hear from you!</p>
                  <p class=" lead pull-right"><b>Thanks! @fsa_Team</b></p>
                  <br/><br/>
                  <p class="social"><a href="#" title="" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" title="" class="twitter"><i class="fa fa-twitter"></i></a><a href="#" title="" class="gplus"><i class="fa fa-google-plus"></i></a><a href="#" title="" class="instagram"><i class="fa fa-instagram"></i></a><a href="#" title="" class="email"><i class="fa fa-envelope"></i></a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer>
        <div class="container">
          <div class="row copyright">
            <div class="col-md-6">
              <p class="roboto">&copy;2017 fsa | Freelance Services Application</p>
            </div>
            <div class="col-md-6">
              <!--
              <p class="credit roboto"><a href="https://bootstrapious.com/tutorials">Bootstrapious</a></p>
               Please do not remove the backlink to us unless you support the development at https://bootstrapious.com/donate.
               It is part of the license conditions. Thanks for understanding :)
             -->
            </div>
          </div>
        </div>
      </footer>

      <!-- Javascript files-->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
      <script src="{{ asset('vendors/js/agency/js/jquery.sticky.js') }}"></script>
      <script src="{{ asset('vendors/js/agency/js/jquery.scrollTo.min.js') }}"></script>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;amp;sensor=false"></script>
      <script src="{{ asset('vendors/js/agency/js/gmaps.js') }}"></script>
      <script src="{{ asset('vendors/js/agency/js/jquery.cookie.js') }}"></script>
      <script src="{{ asset('vendors/js/agency/js/front.js') }}"></script>

    </body>

</html>

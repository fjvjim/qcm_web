<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Home | E-Shopper</title>
        <link href="<?php echo url('css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo url('css/font-awesome.min.css') ?>" rel="stylesheet">
        <link href="<?php echo url('css/animate.css') ?>" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ URL::asset('css/responsive.css') }}" rel="stylesheet">

    </head>
    <body>
        <header id="header">
            <div class="header_top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="mainmenu pull-left">
                                <ul class="nav navbar-nav collapse navbar-collapse">
                                    <li><a href="{{ url('admin/question') }}" <?php if ($adMenu==1 && $idMenu==0):?>class="active"<?php endif?>>Questionnaire</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="mainmenu pull-right">
                                <ul class="nav navbar-nav">
                                    @if ($isLogin && $type == "2")
                                        <li><a href="{{ url('/logout') }}">Deconnecter</a></li>
                                    @else
                                    <li><a href="{{ url('/login') }}" <?php if ($idMenu==3):?>class="active"<?php endif;?>>Connecter</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
            @yield('contain')
        </div>
        <footer id="footer">
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>
                        <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="{{ URL::asset('js/jquery.js') }}"></script>
        <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ URL::asset('js/main.js') }}"></script>
    </body>
</html>

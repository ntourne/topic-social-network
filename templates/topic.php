<!DOCTYPE html>
<html lang="en" ng-app="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hellou</title>

    <!-- Bootstrap -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

    <div class="container">

        <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b>hello</b>u</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <form action="#" accept-charset="utf-8" method="get" class="navbar-form navbar-left" role="search">
                        <div class="form-group">
                            <input type="text" name="q" class="form-control q" placeholder="Search topics, categories and people">
                        </div>
                    </form>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#home">Home</a></li>
                        <li class="dropdown">
                            <a href="#profile" class="dropdown-toggle" data-toggle="dropdown">Notifications <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Notification #1</a></li>
                                <li><a href="#">Notification #2</a></li>
                                <li><a href="#">Notification #3</a></li>
                                <li><a href="#">Notification #4</a></li>
                                <li><a href="#">Notification #5</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#profile" class="dropdown-toggle" data-toggle="dropdown">Nicol&aacute;s <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">My Account</a></li>
                                <li><a href="#">Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Logout</a></li>
                            </ul>
                        </li>
                        <li><button type="button" class="btn btn-default navbar-btn"><span class="glyphicon glyphicon-check"></span> Create topic</button></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>


        <?php /*
        <div class="jumbotron">
            <h1>Jumbotron heading</h1>
            <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
            <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>
        </div>
        */ ?>

        <?php
            $topics = array();
            $topics[] = array("cat1" => "Sports", "cat2" => "Champions League", "title" => "Quien se va a llevar la copa?", "desc" => "La proxima semana tendremos la gran final del mejor torneo del mundo. Quien es su favorito?",
                                "author" => "Quique Wolff", "people_follow" => 10);
            $topics[] = array("cat1" => "Sports", "cat2" => "Copa Libertadores", "title" => "San Lorenzo a cuartos de final. Este es el a&ntilde;o donde se lleva la copa?", "desc" => "La proxima semana tendremos la gran final del mejor torneo del mundo. Quien es su favorito?",
                "author" => "ESPN", "people_follow" => 10);
            $topics[] = array("cat1" => "Sports", "cat2" => "Champions League", "title" => "Quien se va a llevar la copa?", "desc" => "La proxima semana tendremos la gran final del mejor torneo del mundo. Quien es su favorito?",
                "author" => "ESPN", "people_follow" => 10);
            $topics[] = array("cat1" => "Sports", "cat2" => "Copa Libertadores", "title" => "San Lorenzo a cuartos de final. Este es el a&ntilde;o donde se lleva la copa?", "desc" => "La proxima semana tendremos la gran final del mejor torneo del mundo. Quien es su favorito?",
                "author" => "ESPN", "people_follow" => 10);
            $topics[] = array("cat1" => "Sports", "cat2" => "Champions League", "title" => "Quien se va a llevar la copa?", "desc" => "La proxima semana tendremos la gran final del mejor torneo del mundo. Quien es su favorito?",
                "author" => "ESPN", "people_follow" => 10);
            $topics[] = array("cat1" => "Sports", "cat2" => "Copa Libertadores", "title" => "San Lorenzo a cuartos de final. Este es el a&ntilde;o donde se lleva la copa?", "desc" => "La proxima semana tendremos la gran final del mejor torneo del mundo. Quien es su favorito?",
                "author" => "ESPN", "people_follow" => 10);
            $topics[] = array("cat1" => "Sports", "cat2" => "Champions League", "title" => "Quien se va a llevar la copa?", "desc" => "La proxima semana tendremos la gran final del mejor torneo del mundo. Quien es su favorito?",
                "author" => "ESPN", "people_follow" => 10);
            $topics[] = array("cat1" => "Sports", "cat2" => "Copa Libertadores", "title" => "San Lorenzo a cuartos de final. Este es el a&ntilde;o donde se lleva la copa?", "desc" => "La proxima semana tendremos la gran final del mejor torneo del mundo. Quien es su favorito?",
                "author" => "ESPN", "people_follow" => 10);
        ?>

        <?php /*
        <div class="menu page">
            <div class="container">
                <a href="#" class="active">Topics</a>
                <a href="#">Suggestions</a>
            </div>
        </div>
        */ ?>


        <div class="row page">

            <?php /*
            <div class="col-lg-12 page-content">
                <div ng-controller="TopicsCtrl">
                    <li ng-repeat="topic in topics">
                        <b>{{topic.title}}</b> {{topic.desc}}
                    </li>
                </div>
            </div>
            */ ?>

            <div class="col-lg-8 page-content">

                <div class="topics-menu">
                    <a href="#" class="active">Topics</a>
                    <a href="#">Browse</a>
                    <a href="#">Favorites</a>
                    <a href="#">Suggestions</a>
                </div>

                <ul class="media-list topic-list">
                    <?php
                        foreach($topics as $topic):
                    ?>
                        <li class="media">
                            <div class="media-body">
                                <div class="categories">
                                    <a href="#"><?php echo $topic['cat1'] ?></a> &raquo; <a href="#"><?php echo $topic['cat2'] ?></a></a>
                                    <div class="ago">20 min ago</div>
                                </div>
                                <h4 class="media-heading title"><a href="#"><?php echo $topic['title'] ?></a></h4>
                                <div class="author"><?php echo $topic['author'] ?>, Periodista de ESPN y ex-futbolista</div>
                                <div class="desc">
                                    <?php echo $topic['desc'] ?>
                                    <?php echo $topic['desc'] ?>
                                </div>
                                <div class="info">
                                    <?php /*
                                    <span class="glyphicon glyphicon-heart-empty"></span>
                                    <span class="glyphicon glyphicon-comment"></span>
                                    */ ?>
                                    <a href="#">Like</a> <span class="separator">-</span> <a href="#">Comment</a> <span class="separator">-</span> <a href="#">Share</a> <span class="separator">-</span> <b><?php echo $topic['people_follow'] ?></b> people talking about this</div>
                            </div>
                        </li>
                    <?php
                        endforeach
                    ?>

                </ul>
            </div>
            <div class="col-lg-4">

            </div>
        </div>


        <div class="footer">
            <p>&copy; Company 2014</p>
        </div>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.1/angular.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/app.js"></script>

</body>
</html>
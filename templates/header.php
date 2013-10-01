<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="res/bootstrap/dist/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="res/css/quiz.css" />
    <title>The Web Acronym Test</title>
    <?php if ($quiz->session->get('num') === 0 ): ?>
        <script type="text/javascript" src="res/js/start.js"></script>
    <?php elseif (! $quiz->session->get('last')) : ?>
        <script type="text/javascript" src="res/js/form.js"></script>
    <?php endif; ?>
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="res/bootstrap/dist/assets/js/html5shiv.js"></script>
      <script src="res/bootstrap/dist/assets/js/respond.min.js"></script>
    <![endif]-->
    
</head>
<body>
    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Simple Quiz</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="/">Home</a></li>
<!--            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>-->
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Admin</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
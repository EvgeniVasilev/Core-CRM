<?php
function get_keywords()
{
    if (isset($_REQUEST['keywords']) and $_REQUEST['keywords'] !== 'empty') {
        return $_REQUEST['keywords'];
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Oreda CRM</title>
    <link rel="stylesheet" href="./bower_components/bootstrap/dist/css/bootstrap.css"/>
    <link rel="stylesheet" href="./custom/css/main.css">
    <script src="./bower_components/jquery/dist/jquery.js"></script>
    <script src="./bower_components/bootstrap/dist/js/bootstrap.js"></script>
    <style type="text/css">
        .padded {
            padding: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-default flat">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./index.php">Orenda CRM</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="new_cstm.php">New Customer<span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <form method="post" action="search.php" class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" name="keywords" class="form-control" placeholder="Search"
                           value="<?php echo get_keywords(); ?>">
                </div>
                <button type="submit" class="btn btn-default">
                    Submit
                </button>
            </form>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="container-fluid">

<?php
require_once ('data.php');

// Turn on output buffering
ob_start();
?>
<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="utf-8">
    <title>Kahvakuulatreenit @Verkamestari</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./css/bootstrap.ubuntu.css" media="all">
    <link rel="stylesheet" href="./css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/styles.css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="./js/html5shiv.js"></script>
      <script src="./js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="#" class="navbar-brand"><i class="fa fa-home fa-lg"></i></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
<?php
foreach ($data as $key => $val) {
?>
            <li>
              <a data-toggle="collapse" data-target=".navbar-collapse" class="anchor" href="#<?php echo $val['ref'];?>"><?php echo $val['name'];?></a>
            </li>
<?php
}
?>
          </ul>

        </div>
      </div>
    </div>


    <div class="container">

      <div class="page-header" id="banner">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="hidden-xs">Kahvakuulatreenit</h1>
            <h1 class="hidden-sm hidden-md hidden-lg">Kahvakuula-<br />treenit</h1>
            <p class="lead">@Verkamestari</p>
          </div>
          <div class="col-lg-6" style="padding: 15px 15px 0 15px;">
            <img class="hidden-xs" src="kuula_ja_hanskat.jpg" alt="kahvakuula ja hanskat" style="width:400px;padding-top:30px;" />
            <img class="hidden-sm hidden-md hidden-lg" src="kahvakuula.jpg" alt="kahvakuula" style="width:280px;" />
          </div>
        </div>
      </div>

      <!-- Treenit
      ================================================== -->
      <div class="bs-docs-section">

<?php
foreach ($data as $key => $category) {
?>
        <div class="page-header">
          <h2 id="<?php echo $category['ref'];?>"><?php echo $category['name']; ?></h2>
        </div>

        <div class="panel-group" id="accordion<?php echo $category['ref']; ?>">
<?php
  foreach ($category['data'] as $exKey => $exercise) {
?>
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion<?php echo $exercise['ref']; ?>" href="#collapse<?php echo $exercise['ref']; ?>">
                  <i class="fa fa-caret-right"></i>&nbsp; <span class="workoutTitle"><?php echo $exercise['name']; ?></span>
                </a>
                <a href="#" data-target="<?php echo $exercise['ref'];?>" class="hidden-xs printMe small pull-right">Tulosta</a>
              </h4>
            </div>
            <div id="collapse<?php echo $exercise['ref'];?>" class="panel-collapse collapse">
              <div class="panel-body">
                <table class="table table-striped table-hover ">
                  <tbody>
<?php
    foreach ($exercise['data'] as $exMove) {
?>
                    <tr>
<?php
      if (count($exMove) == 1) {
?>
                      <td colspan="3"><?php echo $exMove[0]; ?></td>
<?php
      }
      else if (count($exMove) == 2) {
        if (empty($exMove[0])) {
?>
                      <td style="width:10px;">&nbsp;</td>
                      <td style="width:10px;"><i class="fa fa-angle-right"></i></td>
                      <td><?php echo $exMove[1]; ?></td>
<?php
        }
        else {
?>
                      <td style="width:30px;"><?php echo $exMove[0]; ?></td>
                      <td style="width:10px;"><i class="fa fa-times"></i></td>
                      <td><?php echo $exMove[1]; ?></td>
<?php
      }
    }
?>
                    </tr>
<?php
    } // exercise
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
<?php
  }
?>
        </div>
<?php
} // category
?>
      </div>


      <footer>
        <div class="row">
          <div class="col-lg-12">
            <p>Päivitetty viimeksi: <?php echo date("d.m.Y H:i"); ?> (<a href="mailto:jurintal@gmail.com">juha</a>)</p>
          </div>
        </div>
      </footer>

    </div>

    <script src="./js/jquery-1.10.2.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/scripts.js"></script>
  </body>
</html>
<?php
// Get the contents of the output buffer
$output = ob_get_contents();
// Clean/erase the output buffer and turn off output buffering
ob_end_clean();
// Write the output to file
file_put_contents('index.html', $output);
// Write the output to stdout as well
echo $output;
?>
<?php
session_start();
ob_start();
include_once("assets/includes/verify.php");
include_once("assets/includes/verify-admin.php");
include_once("assets/includes/header.php");
include("assets/includes/constants.php");

if($_SESSION["AccountType"] != "ADMIN") {
  header("Location: dashboard.php");
}
?>

<div class="container">

      <div class="row">
        <div class="col-lg-12">
          <?php
          // a random hello
          $helloArray = array("Hello", "Bonjour", "Salut", "Servas", "Aloha", "Ciao", "Howdy", "Hey,", "<span rel='tooltip' style='cursor:pointer;' title='Good luck, have fun'>glhf,</span>");
          $randHello = array_rand($helloArray);
          ?>
          <h1 class="page-header">Site Settings <small><?= $helloArray[$randHello] . " " . $_SESSION["Name"] . " <a href='my-account.php#breakdown' rel='tooltip' title='Total points' class='label label-info'>" . $_SESSION["Points"] . "</a>"; ?></small></h1>
          <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="active">Site Settings</li>
          </ol>
        </div>
      </div><!-- /.row -->

      <div class="row">
        <div class="col-lg-12">
           <?php
           if($_SESSION['success'] != '') {
                    echo "<div class='alert alert-success'>".$_SESSION['success']."</div>";
                    $_SESSION['success'] = '';
            }

            if($_SESSION['error'] != '') {
                    echo "<div class='alert alert-danger'>".$_SESSION['error']."</div>";
                    $_SESSION['error'] = '';
            }
            ?>

            <div class="row">
            <div class="col-md-5">

              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Manage Maintenance Mode</h3>
                </div>
                <div class="panel-body">
                  <?php
                    $sql = "SELECT * FROM Settings WHERE intSettingsID=1";
                    $result = mysql_query($sql);
                    $settings = mysql_fetch_array($result);
                    if($settings["isMaintenance"]) :
                  ?>
                      <a href="doSettings.php?action=disablemm" class="btn btn-default btn-block"><i class="fa fa-times"></i> Disable Maintenance Mode</a>
                  <?php else : ?>
                      <a href="doSettings.php?action=enablemm" class="btn btn-default btn-block"><i class="fa fa-check"></i> Enable Maintenance Mode</a>
                  <?php endif; ?>
                </div>
              </div>




            </div>

            <div class="col-md-7">
              <div class="well well-sm">
                <h3>Did You Know? <strong>Settings</strong></h3>
                <p>Currently, the only option is to manage maintenance mode. Future features will be housed here.</p>
                <hr />
                <h4>Maintenance Mode</h4>
                <p>Maintenance mode disables the ability for ushers and usher coordinators to log in. Only users designated as administrators have access to the site. Generally, this is enabled when there are site-wide changes being made.</p>
            </div>
            </div>











<?php
include_once("assets/includes/footer.php");
?>
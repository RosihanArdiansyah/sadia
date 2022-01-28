<!DOCTYPE html>
<html>
    <head>
        <!-- Title -->
        <title>Change Password</title>
        
        <?php include 'v_header.php'; ?>
        
    </head>
    <body class="page-header-fixed compact-menu pace-done page-sidebar-fixed">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
        <?php include 'v_navbar_admin.php'; ?><!-- Navbar -->
        <?php include 'v_sidebar.php'; ?>   <!-- Page Sidebar --><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Change Password</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('halamanbelakang/dashboard');?>">Dashboard</a></li>
                            <li class="active">Change Password</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">

                        <div class="col-lg-12 col-md-12">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Change Password</h4>
                                </div>
                                <div class="panel-body">

                                    <form class="form-horizontal" action="<?php echo site_url('halamanbelakang/change_pass/change');?>" method="post">

                                      <div class="form-group">
                                        <label for="inputPassword1" class="col-sm-2 control-label">Old Password</label>
                                        <div class="col-sm-10">
                                          <input type="password" name="old_password" class="form-control" id="inputPassword1" placeholder="Old Password" required>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="inputPassword2" class="col-sm-2 control-label">New Password</label>
                                        <div class="col-sm-10">
                                          <input type="password" name="new_password" class="form-control" id="inputPassword2" placeholder="New Password" required>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-2 control-label">Confirm New Password</label>
                                        <div class="col-sm-10">
                                          <input type="password" name="conf_password" class="form-control" id="inputPassword3" placeholder="Confirm New Password" required>
                                        </div>
                                      </div>

                                      <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                          <button type="submit" class="btn btn-success">Change Password</button>
                                        </div>
                                      </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s"><?php echo date('Y');?> &copy; LPMP SULAWESI SELATAN.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="<?php echo base_url().'assets/plugins/jquery/jquery-2.1.4.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/pace-master/pace.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-blockui/jquery.blockui.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/bootstrap/js/bootstrap.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/switchery/switchery.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/uniform/jquery.uniform.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/offcanvasmenueffects/js/classie.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/offcanvasmenueffects/js/main.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/waves/waves.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/3d-bold-navigation/js/main.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/waypoints/jquery.waypoints.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-counterup/jquery.counterup.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/toastr/toastr.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/flot/jquery.flot.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/flot/jquery.flot.time.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/flot/jquery.flot.symbol.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/flot/jquery.flot.resize.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/flot/jquery.flot.tooltip.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/chartsjs/Chart.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/modern.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/toastr/jquery.toast.min.js'?>"></script>
        <!--Toast Message-->
        <?php if($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Password Changed.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error-notmatch'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Password and Confirm Password doesn't match.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error-notfound'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Password was not found.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "User ID was not found.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php else:?>

        <?php endif;?>

    </body>
</html>
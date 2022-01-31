<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Dashboard</title>
        
        <?php include 'v_header.php'; ?>
        
    </head>
    <body class="page-header-fixed compact-menu pace-done page-sidebar-fixed">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
        <?php include 'v_navbar_admin.php'; ?><!-- Navbar -->
        <?php include 'v_sidebar.php'; ?>   <!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Dashboard</h3>
                    <div class="page-breadcrumb""Sadia Mane">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('halamanbelakang/dashboard');?>">Home</a></li>
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <div class="page-footer">
                    <p class="no-s"><?php echo date('Y');?> &copy; Sadia Mane</p>
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
        
        <script>
            $(document).ready(function(){
                // CounterUp Plugin
                $('.counter').counterUp({
                    delay: 10,
                    time: 1000
                });

                var myLine = document.getElementById("canvas").getContext("2d");
                var lineChartData = {
                    labels : <?php echo $month;?>,
                    datasets : [

                        {
                            fillColor: "rgba(34,186,160,0.2)",
                            strokeColor: "rgba(34,186,160,1)",
                            pointColor: "rgba(34,186,160,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(18,175,203,1)",
                            data : <?php echo $value;?>
                        }

                    ]

                }

                var canvas = new Chart(myLine).Line(lineChartData, {
                    scaleShowGridLines : true,
                    scaleGridLineColor : "rgba(0,0,0,.05)",
                    scaleGridLineWidth : 0,
                    scaleShowHorizontalLines: true,
                    scaleShowVerticalLines: true,
                    bezierCurve : true,
                    bezierCurveTension : 0.4,
                    pointDot : true,
                    pointDotRadius : 4,
                    pointDotStrokeWidth : 1,
                    pointHitDetectionRadius : 2,
                    datasetStroke : true,
                    tooltipCornerRadius: 2,
                    datasetStrokeWidth : 2,
                    datasetFill : true,
                    legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>",
                    responsive: true
                });
            });
            

        </script>

    </body>
</html>
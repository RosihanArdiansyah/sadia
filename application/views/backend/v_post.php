<!DOCTYPE html>
<html>
    <head>
        <!-- Title -->
        <title>Daftar Permintaan</title>
        
        <?php include 'v_header.php'; ?>
        
    </head>
    <body class="page-header-fixed compact-menu pace-done page-sidebar-fixed">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
        <?php include 'v_navbar_admin.php'; ?><!-- Navbar -->
        <?php include 'v_sidebar.php'; ?>   <!-- Page Sidebar --><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Daftar Permintaan</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('halamanbelakang/dashboard');?>">Dashboard</a></li>
                            <li><a href="#">Permintaan</a></li>
                            <li class="active">Daftar Permintaan</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                           
                            <div class="panel panel-white">
                                <div class="panel-body">
                                   
                                    <div class="table-responsive">
                                        <table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                                <tr>
                                                    <th style="width: 50px;">No</th>
                                                    <th>Pengirim</th>
                                                    <th>Nama Barang</th>
                                                    <th>Tanggal</th>
                                                    <th>Jumlah</th>
                                                    <th>Satuan</th>
                                                    <th>Kebutuhan</th>
                                                    <th>Penjelasan</th>
                                                    <?php if($this->session->userdata('access')==2):?>
                                                        <th style="text-align: center;width: 120px;">Status</th>
                                                    <?php elseif($this->session->userdata('access')==1):?>
                                                        <th style="text-align: center;width: 120px;">Status</th>
                                                        <th style="text-align: center;">Action</th>
                                                    <?php else:?>
                                                        <th style="text-align: center;">Action</th>
                                                    <?php endif;?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no=0;
                                                foreach ($data->result() as $row):
                                                    if($this->session->userdata('access')==2):
                                                        if($this->session->userdata('id')==$row->user_id):
                                                   
                                                    $no++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $no;?></td>
                                                    <td><?php echo $row->user_name;?></td>
                                                    <td><?php echo $row->category_name;?></td>
                                                    <td><?php echo $row->tanggal;?></td>
                                                    <td><?php echo $row->post_sum;?></td>
                                                    <td><?php echo $row->post_tags;?></td>
                                                    <td><?php echo $row->post_needs;?></td>
                                                    <td><?php echo $row->post_description;?></td>
                                                    <?php if($this->session->userdata('access')==1|| $this->session->userdata('access')==3 ):?>
                                                        <td style="text-align: center;">
                                                            <a href="<?php echo site_url('halamanbelakang/post/get_edit/'.$row->post_id);?>" class="btn btn-xs"><span class="fa fa-pencil"></span></a>
                                                            <a href="javascript:void(0);" class="btn btn-xs btn-delete" data-id="<?php echo $row->post_id;?>"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    <?php elseif($this->session->userdata('access')==2&& $row->post_status==0 ):?>
                                                        <td style="text-align: center;">
                                                            <p>Sedang Diproses</p>
                                                            <a href="<?php echo site_url('halamanbelakang/post/get_edit/'.$row->post_id);?>" class="btn btn-xs"><span class="fa fa-pencil"></span></a>
                                                            <a href="javascript:void(0);" class="btn btn-xs btn-delete" data-id="<?php echo $row->post_id;?>"><span class="fa fa-trash"></span></a>
                                                        </td>
                                                    <?php else:?>
                                                        <td><?php switch ($row->post_status){
                                                            case 1:
                                                                echo "Diterima";
                                                                break;
                                                              case 2:
                                                                echo "Ditolak";
                                                                break;
                                                              default:
                                                                echo "Sedang Diproses";

                                                        } 
                                                            ;?></td>
                                                    <?php endif;?>
                                                </tr>
                                                        <?php endif;?>
                                                    <?php elseif($this->session->userdata('access')==1):
                                                        $no++;?>
                                                        <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $row->user_name;?></td>
                                                        <td><?php echo $row->category_name;?></td>
                                                        <td><?php echo $row->tanggal;?></td>
                                                        <td><?php echo $row->post_sum;?></td>
                                                        <td><?php echo $row->post_tags;?></td>
                                                        <td><?php echo $row->post_needs;?></td>
                                                        <td><?php echo $row->post_description;?></td>
                                                        <td><?php switch ($row->post_status){
                                                            case 1:
                                                                echo "Diterima";
                                                                break;
                                                              case 2:
                                                                echo "Ditolak";
                                                                break;
                                                              default:
                                                                echo "Sedang Diproses";

                                                        } 
                                                            ;?></td>
                                                            <td style="text-align: center;">
                                                                <a href="<?php echo site_url('halamanbelakang/post/get_edit/'.$row->post_id);?>" class="btn btn-xs"><span class="fa fa-pencil"></span></a>
                                                                <a href="javascript:void(0);" class="btn btn-xs btn-delete" data-id="<?php echo $row->post_id;?>"><span class="fa fa-trash"></span></a>
                                                            </td>
                                                        </tr>
                                                    <?php elseif($this->session->userdata('access')==3):
                                                        if($row->post_status==1):
                                                        $no++;?>
                                                        <tr>
                                                        <td><?php echo $no;?></td>
                                                        <td><?php echo $row->user_name;?></td>
                                                        <td><?php echo $row->category_name;?></td>
                                                        <td><?php echo $row->tanggal;?></td>
                                                        <td><?php echo $row->post_sum;?></td>
                                                        <td><?php echo $row->post_tags;?></td>
                                                        <td><?php echo $row->post_needs;?></td>
                                                        <td><?php echo $row->post_description;?></td>
                                                            <td style="text-align: center;">
                                                                <a href="<?php echo site_url('halamanbelakang/post/get_edit/'.$row->post_id);?>" class="btn btn-xs"><span class="fa fa-pencil"></span></a>
                                                                <a href="javascript:void(0);" class="btn btn-xs btn-delete" data-id="<?php echo $row->post_id;?>"><span class="fa fa-trash"></span></a>
                                                            </td>
                                                        </tr>
                                                        <?php endif;?>
                                                <?php endif;?>
                                            <?php endforeach; ?>
                                            </tbody>
                                            
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s"><?php echo date('Y');?> &copy; Sadia.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

        <!--DELETE RECORD MODAL-->
        <form action="<?php echo site_url('halamanbelakang/post/delete');?>" method="post">
            <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Post</h4>
                    </div>
                        <div class="modal-body">
                            <div class="alert alert-info">
                                Anda yakin mau menghapus post ini?
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" required>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

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
        <script src="<?php echo base_url().'assets/plugins/jquery-mockjax-master/jquery.mockjax.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/moment/moment.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/datatables/js/jquery.datatables.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/modern.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/toastr/jquery.toast.min.js'?>"></script>
        <script>
            $(document).ready(function(){
                $('#data-table').dataTable();

                //Delete Record
                $('body').on('click','.btn-delete',function(){
                    var id=$(this).data('id');
                    $('[name="id"]').val(id);
                    $('#DeleteModal').modal('show');
                });

            });
        </script>

        <!--Toast Message-->
        <?php if($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Post Saved!",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='info'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Info',
                        text: "Post Updated!",
                        showHideTransition: 'slide',
                        icon: 'info',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#00C9E6'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success-delete'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "Post Deleted!.",
                        showHideTransition: 'slide',
                        icon: 'success',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#7EC857'
                    });
            </script>
        <?php else:?>

        <?php endif;?>
        
    </body>
</html>
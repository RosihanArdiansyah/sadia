<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Users</title>
        
        <?php include 'v_header.php'; ?>
        
    </head>
    <body class="page-header-fixed compact-menu pace-done page-sidebar-fixed">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
        <?php include 'v_navbar_admin.php'; ?><!-- Navbar -->
        <?php include 'v_sidebar.php'; ?>   <!-- Page Sidebar --><!-- Page Sidebar -->
            <div class="page-inner">
                
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-white">
                                
                                <div class="panel-body">
                                <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Add New User</button>
                                  
                                    <table id="mytable" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Level</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no=0;
                                                foreach ($data->result() as $row):
                                                    $no++;
                                            ?>
                                            <tr>
                                                <td style="vertical-align: middle;"><?php echo $no;?></td>
                                                <td style="vertical-align: middle;">
                                                    <?php if(empty($row->user_photo)):?>
                                                    <img class="img-circle" width="50" src="<?php echo base_url().'assets/images/user_blank.png';?>">
                                                    <?php else:?>
                                                    <img class="img-circle" width="50" src="<?php echo base_url().'assets/images/'.$row->user_photo;?>">
                                                    <?php endif;?>
                                                </td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_name;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_email;?></td>
                                                <td style="vertical-align: middle;"><?php echo $row->user_password;?></td>
                                                <td style="vertical-align: middle;">
                                                    <?php 
                                                        if($row->user_level=='1'){
                                                            echo "Administrator";
                                                        }else if($row->user_level=='2'){
                                                            echo "Pegawai";
                                                        }else if($row->user_level=='3'){
                                                            echo "Pimpinan";
                                                        }
                                                    ?>    
                                                </td>
                                                <?php if($row->user_status=='1'):?>
                                                    <td style="vertical-align: middle;"><a href="<?php echo base_url().'halamanbelakang/users/lock/'.$row->user_id;?>" class="btn"><span class="icon-lock-open" title="Unlock"></span></a></td>
                                                <?php else:?>
                                                    <td style="vertical-align: middle;"><a href="<?php echo base_url().'halamanbelakang/users/unlock/'.$row->user_id;?>" class="btn"><span class="icon-lock" title="Locked"></span></a></td>
                                                <?php endif;?>
                                                <td style="vertical-align: middle;">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                            Action <span class="caret"></span>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                                                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#ModalEdit<?php echo $row->user_id;?>"><span class="icon-pencil"></span> Edit</a></li>
                                                            <li><a href="javascript:void(0);" class="delete" data-userid="<?php echo $row->user_id;?>"><span class="icon-trash"></span> Delete</a></li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach;?>
                                        </tbody>
                                       </table>  
                                </div>
                            </div>
                                   
                            
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s"><?php echo date('Y');?> &copy; LPMP SULAWESI SELATAN.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        
        <div class="cd-overlay"></div>

        <!-- Modal -->
        <form id="add-row-form" action="<?php echo base_url().'halamanbelakang/users/insert'?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
                    </div>
                    <div class="modal-body">
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="file" name="filefoto" class="dropify" data-height="220">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="nama" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password2" class="form-control" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="level" required>
                                            <option value="">No Selected</option>
                                            <option value="1">Administrator</option>
                                            <option value="2">Pegawai</option>
                                            <option value="3">Pimpinan</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="room" required>
                                            <option value="">No Selected</option>
                                            <?php foreach ($room->result() as $row) : ?>
                                                    <option value="<?php echo $row->room_id;?>"><?php echo $row->room_name;?></option>
                                                <?php endforeach;?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <?php 
            foreach ($data->result() as $row):
        ?>
        <!-- Modal -->
        <form id="add-row-form" action="<?php echo base_url().'halamanbelakang/users/update'?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="ModalEdit<?php echo $row->user_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
                    </div>
                    <div class="modal-body">
                            
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                                <input type="file" name="filefoto" class="dropify" data-height="220" data-default-file="<?php echo base_url().'assets/images/'.$row->user_photo;?>">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="nama" value="<?php echo $row->user_name;?>" class="form-control" placeholder="Name" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" name="email" value="<?php echo $row->user_email;?>" class="form-control" placeholder="Email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="level" required>
                                                <?php if($row->user_level=='1'):?>
                                                    <option value="1" selected>Administrator</option>
                                                    <option value="2">Pegawai</option>
                                                    <option value="3">Pimpinan</option>
                                                <?php elseif($row->user_level=='2'):?>
                                                    <option value="1">Administrator</option>
                                                    <option value="2" selected>Pegawai</option>
                                                    <option value="3">Pimpinan</option>
                                                <?php elseif($row->user_level=='3'):?>
                                                    <option value="1">Administrator</option>
                                                    <option value="2" >Pegawai</option>
                                                    <option value="3" selected>Pimpinan</option>
                                                <?php endif;?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="room" required>
                                                <option value="">-Select Option-</option>
                                                    <?php foreach ($room->result() as $roomrow) : ?>
                                                        <?php if($row->user_room_id==$roomrow->room_id):?>
                                                            <option value="<?php echo $roomrow->room_id;?>" selected><?php echo $roomrow->room_name;?></option>
                                                        <?php else:?>
                                                            <option value="<?php echo $roomrow->room_id;?>"><?php echo $roomrow->room_name;?></option>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                            </select>
                                        </div>
                                        
                                    </div>
                                </div>

                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="user_id" value="<?php echo $row->user_id;?>" required>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
	   <?php endforeach;?>

       <!-- Modal hapus-->
        <form id="add-row-form" action="<?php echo base_url().'halamanbelakang/users/delete'?>" method="post" enctype="multipart/form-data">
        <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete User</h4>
                    </div>
                    <div class="modal-body">
                            <strong>Anda yakin mau menghapus user ini?</strong>
                            <div class="form-group">
                                <input type="hidden" id="txt_kode" name="kode" class="form-control" placeholder="Name" required>
                            </div>
                            
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="add-row" class="btn btn-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <!-- Javascripts -->
        <script src="<?php echo base_url().'assets/plugins/jquery/jquery-2.1.4.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/jquery-ui/jquery-ui.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/select2/js/select2.min.js'?>" type="text/javascript"></script>
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
        <script src="<?php echo base_url().'assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/modern.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/js/dropify.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/toastr/jquery.toast.min.js'?>"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#mytable').DataTable();
                $('.dropify').dropify({
                    defaultFile: '',
                    messages: {
                        default: 'Drag atau drop untuk memilih Photo',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });

                $('.delete').on('click',function(){
                    var userid=$(this).data('userid');
                    $('#ModalDelete').modal('show');
                    $('[name="kode"]').val(userid);
                });
            });
        </script>


        <!--Toast Message-->
        <?php if($this->session->flashdata('msg')=='error'):?>
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
        <?php elseif($this->session->flashdata('msg')=='error-email'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Email already taken.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='error-img'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Error',
                        text: "Image Upload Error.",
                        showHideTransition: 'slide',
                        icon: 'error',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#FF4859'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "New User Saved!",
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
                        text: "User updated!",
                        showHideTransition: 'slide',
                        icon: 'info',
                        hideAfter: false,
                        position: 'bottom-right',
                        bgColor: '#00C9E6'
                    });
            </script>
        <?php elseif($this->session->flashdata('msg')=='success-hapus'):?>
            <script type="text/javascript">
                    $.toast({
                        heading: 'Success',
                        text: "User Deleted!.",
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
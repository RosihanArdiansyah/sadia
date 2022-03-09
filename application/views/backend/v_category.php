<!DOCTYPE html>
<html>
    <head>
        <!-- Title -->
        <title>Daftar ATK</title>
        
        <?php include 'v_header.php'; ?>
        
    </head>
    <body class="page-header-fixed compact-menu pace-done page-sidebar-fixed">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
        <?php include 'v_navbar_admin.php'; ?><!-- Navbar -->
        <?php include 'v_sidebar.php'; ?>   <!-- Page Sidebar --><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Daftar ATK</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('halamanbelakang/dashboard');?>">Dashboard</a></li>
                            <li><a href="#">Post</a></li>
                            <li class="active">Daftar ATK</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                           
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Add New Row</button>
                                    
                                    <div class="table-responsive">
                                        <table id="data-table" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah Barang</th>
                                                    
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                                $no=0;
                                                foreach ($data->result() as $row):
                                                    $no++;
                                            ?>
                                                <tr>
                                                <td><?php echo $no;?></td>
                                                    <td><?php echo $row->category_name;?></td>
                                                    <td><?php echo $row->category_sum;?></td>
                                                    <td style="text-align: center;">
                                                        <a href="javascript:void(0);" class="btn btn-xs btn-edit" data-id="<?php echo $row->category_id;?>" data-name="<?php echo $row->category_name;?>" 
                                                        data-kode="<?php echo $row->category_code;?>" data-date="<?php echo $row->category_date;?>" data-price="<?php echo $row->category_price;?>" 
                                                        data-sum="<?php echo $row->category_sum;?>"><span class="fa fa-pencil"></span></a>
                                                        <a href="javascript:void(0);" class="btn btn-xs btn-delete" data-id="<?php echo $row->category_id;?>"><span class="fa fa-trash"></span></a>
                                                    </td>
                                                </tr>
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
                    <p class="no-s"><?php echo date('Y');?> &copy; LPMP SULAWESI SELATAN.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

        <!--ADD RECORD MODAL-->
        <form action="<?php echo site_url('halamanbelakang/category/save');?>" method="post">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">New Category</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="category_name" class="form-control" placeholder="Nama Barang" required>
                            </div>
							<div class="form-group">
                                <input type="text" name="category_code" class="form-control" placeholder="Kode Barang" required>
                            </div>
							<div class="form-group">
                                <input type="number" name="category_sum" class="form-control" placeholder="Jumlah Barang" required>
                            </div>
							<div class="form-group">
								<caption>Tanggal Masuk</caption>
                                <input type="date" name="category_date" class="form-control" required>
                            </div>
							<div class="form-group">
                                <input type="text" name="category_price" class="form-control" placeholder="Harga Pembelian" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
	
         <!--EDIT RECORD MODAL-->
         <form action="<?php echo site_url('halamanbelakang/category/edit');?>" method="post">
            <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Edit Category</h4>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="category_name2" class="form-control" placeholder="Category Name" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="category_code2" class="form-control" placeholder="Kode Barang" required>
                            </div>
							<div class="form-group">
                                <input type="number" name="category_sum2" class="form-control" placeholder="Jumlah Barang" required>
                            </div>
							<div class="form-group">
								<caption>Tanggal Masuk</caption>
                                <input type="date" name="category_date2" class="form-control" required>
                            </div>
							<div class="form-group">
                                <input type="text" name="category_price2" class="form-control" placeholder="Harga Pembelian" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id" required>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        

        <!--DELETE RECORD MODAL-->
        <form action="<?php echo site_url('halamanbelakang/category/delete');?>" method="post">
            <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Delete Category</h4>
                    </div>
                        <div class="modal-body">
                            <div class="alert alert-info">
                                Anda yakin mau menghapus data ini?
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

               //Edit Record
               $('body').on('click','.btn-edit',function(){
                    var id=$(this).data('id');
                    var name=$(this).data('name');
                    var kode=$(this).data('kode');
                    var sum=$(this).data('sum');
                    var date=$(this).data('date');
                    var price=$(this).data('price');
                    $('[name="id"]').val(id);
                    $('[name="category_name2"]').val(name);
                    $('[name="category_code2"]').val(kode);
                    $('[name="category_sum2"]').val(sum);
                    $('[name="category_date2"]').val(date);
                    $('[name="category_price2"]').val(price);
                    $('#EditModal').modal('show');
                });

                //Edit Record

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
                        text: "Category Saved!",
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
                        text: "Category Updated!",
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
                        text: "Category Deleted!.",
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
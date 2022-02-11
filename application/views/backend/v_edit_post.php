<?php 
    error_reporting(0);
    $b = $data->row_array();
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Title -->
        <title>Edit Post</title>
        
        <?php include 'v_header.php'; ?>
        
    </head>
    <body class="page-header-fixed compact-menu pace-done page-sidebar-fixed">
        <div class="overlay"></div>
        <main class="page-content content-wrap">
        <?php include 'v_navbar_admin.php'; ?><!-- Navbar -->
        <?php include 'v_sidebar.php'; ?>   <!-- Page Sidebar --><!-- Page Sidebar -->
            <div class="page-inner">
                <div class="page-title">
                    <h3>Edit Post</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="<?php echo site_url('halamanbelakang/dashboard');?>">Dashboard</a></li>
                            <li><a href="#">Post</a></li>
                            <li class="active">Edit</li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row">
                        <form action="<?php echo base_url().'halamanbelakang/post/edit'?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-8">
                        <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="form-group">        
                                        <label>Barang</label>
                                            <select class="form-control" name="category" required>
                                                <option value="">-Select Option-</option>
                                                    <?php foreach ($category->result() as $row) : ?>
                                                        <?php if($b['post_category_id']==$row->category_id):?>
                                                            <option value="<?php echo $row->category_id;?>" selected><?php echo $row->category_name;?></option>
                                                        <?php else:?>
                                                            <option value="<?php echo $row->category_id;?>"><?php echo $row->category_name;?></option>
                                                        <?php endif;?>
                                                    <?php endforeach;?>
                                            </select>
                                        <label style="margin-top: 8px;">Jumlah</label>
                                            <input type="number" name="sum" value="<?php echo $b['post_sum'];?>" class="form-control" class="form-control" placeholder="Jumlah Barang" required>
                                    </div>
                                    <label>Satuan</label> 
                                        <div style="overflow-y:scroll;height:256px;margin-bottom:30px;">
                                            <?php 
                                                $post_tag=$b['post_tags'];
                                                $strtag=explode(",", $post_tag);
                                                for($j = 0; $j < count($strtag); $j++){

                                                }
                                                foreach ($tag->result() as $row) : ?>
                                                <div class="form-group">
                                                    <label>
                                                        <input type="checkbox" name="tag[]" value="<?php echo $row->tag_name;?>" <?php if(in_array($row->tag_name, $strtag)) echo 'checked="checked"';?> > <?php echo $row->tag_name;?>
                                                    </label>
                                                </div>
                                            <?php endforeach;?>
                                        </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label>Penjelasan</label>
                                            <textarea name="description" cols="6" rows="6" class="form-control" placeholder="Penjelasan"><?php echo $b['post_description'];?></textarea>
                                        <label>Status</label>
                                            <select class="form-control" name="status" required>
                                            
                                                <?php if($b['post_status']=='0'):?>
                                                    <option value="0" selected>Sedang Diproses</option>
                                                    <option value="1">Diterima</option>
                                                    <option value="2">Ditolak</option>
                                                <?php elseif($b['post_status']=='1'):?>
                                                    <option value="0">Sedang Diproses</option>
                                                    <option value="1" selected>Diterima</option>
                                                    <option value="2">Ditolak</option>
                                                <?php elseif($b['post_status']=='2'):?>
                                                    <option value="0" >Sedang Diproses</option>
                                                    <option value="1">Diterima</option>
                                                    <option value="2"selected>Ditolak</option>
                                                <?php endif;?>
                                            </select>
                                        <label>Disetujui?</label>
                                            <select class="form-control" name="acc" required>
                                            
                                                <?php if($b['post_acc']=='0'):?>
                                                    <option value="0" selected>Sedang Diproses</option>
                                                    <option value="1">Ya</option>
                                                    <option value="2">Tidak</option>
                                                <?php elseif($b['post_acc']=='1'):?>
                                                    <option value="0">Sedang Diproses</option>
                                                    <option value="1" selected>Ya</option>
                                                    <option value="2">Tidak</option>
                                                <?php elseif($b['post_acc']=='2'):?>
                                                    <option value="0" >Sedang Diproses</option>
                                                    <option value="1">Ya</option>
                                                    <option value="2"selected>Tidak</option>
                                                <?php endif;?>
                                            </select>
                                    </div>
                                    <div class="btn-group btn-group-justified" role="group">
                                        <input type="hidden" name="post_id" value="<?php echo $b['post_id'];?>" required>
                                        <input type="hidden" name="post_user_id" value="<?php echo $b['post_user_id'];?>" required>
                                        <button type="submit" class="btn btn-primary btn-lg" style="width:100%"><span class="icon-cursor"></span> UPDATE</button>
                                    </div>
                                </div>
                            </div>

                        </div>

                        </form>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
                <div class="page-footer">
                    <p class="no-s"><?php echo date('Y');?> &copy; Sadia.</p>
                </div>
            </div><!-- Page Inner -->
        </main><!-- Page Content -->

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
        <script src="<?php echo base_url().'assets/js/dropify.min.js'?>"></script>
        <script src="<?php echo base_url().'assets/plugins/summernote-master/summernote.min.js'?>"></script>
        <script>
            $(document).ready(function(){
                $('#summernote').summernote({
                  height: 590,
                  toolbar: [    
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],       
                        ['insert', ['link', 'picture', 'hr']],
                        ['view', ["fullscreen", "codeview", "help"]],
                      ],

                    onImageUpload: function(files, editor, welEditable) {
                        sendFile(files[0], editor, welEditable);
                    } 

                });

                function sendFile(file, editor, welEditable) {
                    data = new FormData();
                    data.append("file", file);
                    $.ajax({
                        data: data,
                        type: "POST",
                        url: "<?php echo site_url()?>halamanbelakang/post/upload_image",
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(url) {
                            editor.insertImage(welEditable, url);
                        }
                    });
                }

                $('.dropify').dropify({
                    messages: {
                        default: 'Drag atau drop untuk memilih gambar',
                        replace: 'Ganti',
                        remove:  'Hapus',
                        error:   'error'
                    }
                });

            });
        </script>
        
    </body>
</html>
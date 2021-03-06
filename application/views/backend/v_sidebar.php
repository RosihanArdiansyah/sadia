<div class="page-sidebar sidebar">
                <div class="page-sidebar-inner slimscroll">
                    <div class="sidebar-header">
                        <div class="sidebar-profile">
                            <?php
                                $user_id=$this->session->userdata('id');
                                $query=$this->db->get_where('tbl_user', array('user_id' => $user_id));
                                if($query->num_rows() > 0):
                                $row = $query->row_array();
                            ?>
                            <a href="javascript:void(0);">
                                <div class="sidebar-profile-image">
                                    <img src="<?php echo base_url().'assets/images/'.$row['user_photo'];?>" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo $this->session->userdata('name');?><br>
                                    <?php if($row['user_level']=='1'):?>
                                    <small>Administrator</small>
                                    <?php elseif($row['user_level']=='2'):?>
                                    <small>Pegawai</small>
                                    <?php elseif($row['user_level']=='3'):?>
                                    <small>Pimpinan</small>
                                    <?php endif;?>
                                </span>
                                </div>
                            </a>
                            <?php else:?>
                            <a href="javascript:void(0);">
                                <div class="sidebar-profile-image">
                                    <img src="<?php echo base_url().'assets/images/user_blank.png';?>" class="img-circle img-responsive" alt="">
                                </div>
                                <div class="sidebar-profile-details">
                                    <span><?php echo $this->session->userdata('name');?><br>
                                    <?php if($row['user_level']=='1'):?>
                                    <small>Administrator</small>
                                    <?php elseif($row['user_level']=='2'):?>
                                    <small>Pegawai</small>
                                    <?php elseif($row['user_level']=='3'):?>
                                    <small>Pimpinan</small>
                                    <?php endif;?>
                                </span>
                                </div>
                            </a>
                            <?php endif;?>
                        </div>
                    </div>
                    <ul class="menu accordion-menu">
                        <li class="active"><a href="<?php echo site_url('halamanbelakang/post');?>" class="waves-effect waves-button"><span class="menu-icon icon-home"></span><p>Daftar Permintaan</p></a></li>
                        <li class="droplink"><a href="#" class="waves-effect waves-button"><span class="menu-icon icon-pin"></span><p>Persediaan</p><span class="arrow"></span></a>
                            <ul class="sub-menu">
								<?php if($this->session->userdata('access')=='2'|| $this->session->userdata('access')=='3'):?>
                                <li><a href="<?php echo site_url('halamanbelakang/post/add_new');?>">Membuat Permintaan</a></li>
                                <li><a href="<?php echo site_url('halamanbelakang/rent/add_new');?>">Membuat Peminjaman</a></li><?php else:?> <?php endif;?>
                                <li><a href="<?php echo site_url('halamanbelakang/rent');?>">Daftar Peminjaman</a></li>
                                <?php if($this->session->userdata('access')=='1'):?>
								<li><a href="<?php echo site_url('halamanbelakang/category');?>">Daftar Persediaan</a></li>
                                <li><a href="<?php echo site_url('halamanbelakang/tag');?>">Satuan</a></li>
								<li><a href="<?php echo site_url('halamanbelakang/room');?>">Ruangan</a></li><?php else:?> <?php endif;?>
                            </ul>
                        </li>
                        
                        <?php if($this->session->userdata('access')=='1'):?>
                        <li><a href="<?php echo site_url('halamanbelakang/users');?>" class="waves-effect waves-button"><span class="menu-icon icon-user"></span><p>Users</p></a></li>
                        <?php else:?>
                        <?php endif;?>
                        <li><a href="<?php echo site_url('logout');?>" class="waves-effect waves-button"><span class="menu-icon icon-logout"></span><p>Log Out</p></a></li>
                        
                    </ul>
                </div><!-- Page Sidebar Inner -->
            </div>
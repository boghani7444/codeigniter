<?php $pg = isset($page) && $page != '' ?  $page :'dash'  ; ?>
<div class="sidebar fixed" id="sidebar">
                <ul class="nav nav-list">
                    <li <?php echo  $pg =='dash' ? 'class="active"' : '' ?>>
                        <a href="<?= base_url('admin/dashboard'); ?>">
                            <i class="icon-dashboard"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
                    <li <?php echo  $pg =='page_data' || $pg =='add_page_data' || $pg =='edit_page_data' ? 'class="active open"' : ''; ?>>
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <i class="icon-list"></i>
                            <span class="menu-text"> Menu Page Text </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <?php echo  $pg =='page_data' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/page_data'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Menu Page
                                </a>
                            </li>

                            <li <?php echo  $pg =='add_page_data' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/page_data/add_page_data'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Add Menu Page
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo  $pg =='category' || $pg =='add_cate' || $pg =='edit_cate' ? 'class="active open"' : ''; ?>>
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <i class="icon-desktop"></i>
                            <span class="menu-text"> Category </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <?php echo  $pg =='category' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/category'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Category
                                </a>
                            </li>

                            <li <?php echo  $pg =='add_cate' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/category/add_category'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Add Category
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo  $pg =='property_type' || $pg =='add_property_type' || $pg =='edit_property_type' ? 'class="active open"' : ''; ?>>
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <i class="icon-tag"></i>
                            <span class="menu-text"> Property Type </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <?php echo  $pg =='property_type' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/property_type'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Property Type
                                </a>
                            </li>

                            <li <?php echo  $pg =='add_property_type' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/property_type/add_property_type'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Add Property Type
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo  $pg =='properties' || $pg =='add_properties' || $pg =='edit_properties' ? 'class="active open"' : ''; ?>>
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <i class="icon-list-alt"></i>
                            <span class="menu-text"> Properties </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <?php echo  $pg =='properties' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/properties'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Properties
                                </a>
                            </li>

                            <li <?php echo  $pg =='add_properties' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/properties/add_properties'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Add Properties
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo  $pg =='services' || $pg =='add_services' || $pg =='edit_services' ? 'class="active open"' : ''; ?>>
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <i class="icon-globe"></i>
                            <span class="menu-text"> Services </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <?php echo  $pg =='services' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/services'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Services
                                </a>
                            </li>

                            <li <?php echo  $pg =='add_services' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/services/add_services'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Add Services
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo  $pg =='skills' || $pg =='add_skills' || $pg =='edit_skills' ? 'class="active open"' : ''; ?>>
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <i class="icon-briefcase"></i>
                            <span class="menu-text"> Skills </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <?php echo  $pg =='skills' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/skills'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Skills
                                </a>
                            </li>

                            <li <?php echo  $pg =='add_skills' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/skills/add_skills'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Add Skills
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo  $pg =='gallery' || $pg =='add_gal' || $pg =='edit_gal' ? 'class="active open"' : ''; ?>>
                        <a href="javascript:void(0);" class="dropdown-toggle">
                            <i class="icon-picture"></i>
                            <span class="menu-text"> Gallery </span>
                            <b class="arrow icon-angle-down"></b>
                        </a>
                        <ul class="submenu">
                            <li <?php echo  $pg =='gallery' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/gallery'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        List Gallery
                                </a>
                            </li>

                            <li <?php echo  $pg =='add_gal' ? 'class="active"' : '' ?>>
                                <a href="<?= base_url('admin/gallery/add_gallery'); ?>">
                                        <i class="icon-double-angle-right"></i>
                                        Add Gallery
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li <?php echo $pg =='inquiry' || $pg =='view_inquiry' ? 'class="active open"' : ''; ?>>
                        <a href="<?= base_url('admin/inquiry'); ?>">
                            <i class="icon-envelope-alt"></i>
                            <span class="menu-text"> Inquiry <?php if($this->session->userdata('count_inquiery')){ ?><span class="badge badge-primary"><?= $this->session->userdata('count_inquiery'); ?></span><?php } ?></span>
                        </a>
                    </li>
                    <li <?php echo $pg =='logout' ? 'class="active open"' : ''; ?>>
                        <a href="<?php echo base_url(); ?>admin/home/logout">
                            <i class="icon-off"></i>
                            <span class="menu-text"> Logout </span>
                        </a>
                    </li>
                </ul><!--/.nav-list-->
                <div class="sidebar-collapse" id="sidebar-collapse">
                    <i class="icon-double-angle-left"></i>
                </div>
            </div>
<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li class="">
                    <a href="<?php echo e(url('/home')); ?>" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-wheelchair"></i> <span> Patient </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-patient')); ?>">New patient</a></li>
                        <li><a href="<?php echo e(url('/all-patient')); ?>">All patient</a></li>
                    </ul>
                </li>



                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar"></i> <span> Appointment </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-appointment')); ?>">New Appointment</a></li>
                        <li><a href="<?php echo e(url('/all-appointment')); ?>">All Appointment</a></li>
                        <li><a href="<?php echo e(url('/appointment-today')); ?>">Appointment Today</a></li>
                    </ul>
                </li>
				<li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect <?php echo e(Request::is('edit-drug/*') ? 'active' :''); ?>"><i class="icon icon-pill-small"></i> <span> <?php echo trans('menus.drug.main_menu'); ?> </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/new-drug')); ?>">Add new drug</a></li>
                        <li><a href="<?php echo e(url('/all-drug')); ?>">All Drug</a></li>
                    </ul>
                </li>



                <li class="text-muted menu-title">Setting</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i> <span> Setting </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo e(url('/profile')); ?>">Profile</a></li>
                    </ul>
                </li>


            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Left Sidebar End -->
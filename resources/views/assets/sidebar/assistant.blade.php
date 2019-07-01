<!-- ========== Left Sidebar Start ========== -->

<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>

                <li class="text-muted menu-title">Navigation</li>

                <li class="">
                    <a href="{{url('/home')}}" class="waves-effect"><i class="ti-home"></i> <span> Dashboard </span></a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-wheelchair"></i> <span> Patient </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/new-patient')}}">New patient</a></li>
                        <li><a href="{{url('/all-patient')}}">All patient</a></li>
                    </ul>
                </li>



                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-calendar"></i> <span> Appointment </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/new-appointment')}}">New Appointment</a></li>
                        <li><a href="{{url('/all-appointment')}}">All Appointment</a></li>
                        <li><a href="{{url('/appointment-today')}}">Appointment Today</a></li>
                    </ul>
                </li>
				 <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-notepad"></i> <span> {!! trans('menus.prescription.main_menu') !!} </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                       <!-- <li><a href="{{url('/new-prescription')}}">{!! trans('menus.prescription.new_prescription_menu') !!}</a></li>-->
                        <li><a href="{{url('/all-prescription')}}">{!! trans('menus.prescription.all_prescription_menu') !!}</a></li>
                    </ul>
                </li>
				<!-- <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect {{Request::is('edit-drug/*') ? 'active' :''}}"><i class="icon icon-pill-small"></i> <span> {!! trans('menus.drug.main_menu') !!} </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/new-drug')}}">Add new drug</a></li>
                        <li><a href="{{url('/all-drug')}}">All Drug</a></li>
                    </ul>
                </li> -->



<!--
                <li class="text-muted menu-title">Setting</li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="ti-settings"></i> <span> Setting </span> <span class="menu-arrow"></span> </a>
                    <ul class="list-unstyled">
                        <li><a href="{{url('/profile')}}">Profile</a></li>
                    </ul>
                </li>
-->


            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="window.history.back();" id="myBtn"><img src="{{url('/')}}/dashboard/images/back.png"></button>
    <button type="submit"  class="btn btn-primary waves-effect waves-light" id="myBtn1"><a href="{{url('/')}}"  style="color:#ffffff;"><i class="fa fa-home"></i></a></button>
</div>
<!-- Left Sidebar End -->
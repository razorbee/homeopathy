<style>
#login,#register{
margin-top:30px;

}
</style>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-dark">

  <a class="navbar-brand" href="{{url('/')}}"><img src="dashboard/images/doctorlogo.png" class="img-responsive"></a>

        <a class="navbar-brand mobile" href="#"></a>
        <button class="navbar-toggler" type="button">
            <span class="fa fa-bars"></span>
        </button>
        @if(config('app.has_installed') == 1)
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav nav_home">
                    
                <!-- <li class="nav-item" id="appointment">
                    <a class="nav-link {{ Request::is('appointment') ? 'active' : '' }}" href="{{url('/appointment')}}"> <i class="fa fa-calendar" style="font-size:22px"></i> &nbsp; {!! trans('nav.appointment') !!}</a>
                </li> -->

            @guest
            <li class="nav-item" id="">
                <a class="navbar-brand" href="{{url('/')}}"><img src="dashboard/images/mahi.png" class="img-responsive"></a>
                    
                </li>
                 @if(count(\App\User::all()) == 0) 
                <li class="nav-item" id="register">
                    <a class="nav-link {{ Request::is('register') ? 'active' :'' }}" href="{{route('register')}}"><i class="fa fa-user-plus fa-md"></i> &nbsp; {!! trans('nav.register') !!}</a>
                </li>
                 @endif 
               
                <li class="nav-item" id="login">
                    <a class="nav-link {{ Request::is('login') ? 'active' :'' }}" href="{{route('login')}}"><i class="fa fa-sign-in fa-md"> </i> &nbsp; {!! trans('nav.login') !!}</a>
                    
                </li>
               
                       
              
            @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/home')}}"><i class="fa fa-dashboard"></i> &nbsp; {!! trans('nav.dashboard') !!}<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-size:11px;"> welcome
                        @if(auth()->user()->role ==3)
  Dr.{{auth()->user()->username}}

@else
{{auth()->user()->username}}
@endif
                        
                        </span></a>
                    </li>

                    
                </ul>
            @endguest
        </div>
        @endif
    </nav>
</div>

@extends('layouts.app')

@section('title')
    Edit Profile
@endsection

@section('extra-css')

@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">{{auth()->user()->name}}</h4>
                <form action="#" method="post" id="updateProfile" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-md-4" style="padding-left: 81px;">
                            <!-- <div id="image-preview" style="background-image: url('{{url(auth()->user()->image ? auth()->user()->image : '/dashboard/images/image_placeholder.jpg')}}')"> -->
                            <div id="image-preview"><img id="default_image" src="{{url('/')}}/{{auth()->user()->image}}" style="width:250px;height:250px;margin-bottom:-200px;z-index:-2!important;" alt="">
                                <label for="image-upload" id="image-label"><i class="ti-pencil-alt"></i></label>
                                <input type="file" name="image" id="image-upload" />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group-custom">
                                <input type="text" name="name" value="{{auth()->user()->name}}" required="required" autofocus/>
                                <label class="control-label">Name &nbsp;*</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <input type="text" name="username" value="{{auth()->user()->username}}" required="required" autofocus/>
                                <label class="control-label">Username &nbsp;*</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <input type="email" name="email" value="{{auth()->user()->email}}" required="required"/>
                                <label class="control-label">Email &nbsp;*</label><i class="bar"></i>
                            </div>

                            <div class="form-group-custom">
                                <input type="text" value="{{auth()->user()->phone}}" name="phone" required="required"/>
                                <label class="control-label">Phone &nbsp;*</label><i class="bar"></i>
                            </div>
                            @if(auth()->user()->role == 1)
                                <div class="form-group-custom">
                                    <textarea name="info" required="required" rows="4">{{auth()->user()->info}}</textarea>
                                    <label class="control-label">Info</label><i class="bar"></i>
                                </div>
                            @endif

                            <div class="form-group-custom">
                                <textarea name="address" required="required">{{auth()->user()->address}}</textarea>
                                <label class="control-label">Address</label><i class="bar"></i>
                            </div>
                    
                        </div>
                    </div>

                    <div style="padding-left: 35%;">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary waves-effect waves-light" onclick="window.history.back();" id="myBtn"><img src="{{url('/')}}/dashboard/images/back.png"></button>
    <button type="submit"  class="btn btn-primary waves-effect waves-light" id="myBtn1"><a href="{{url('/')}}"  style="color:#ffffff;"><i class="fa fa-home"></i></a></button>
    @endsection

@section('extra-js')
    <script>
        $(document).ready(function () {
            $("#updateProfile").on('submit',function (e) {
                e.preventDefault();
                var data = new FormData(this);
                console.log('submit');
                $(this).speedPost('{{url('/update-profile')}}',data);
            })
        })
        function hidedefault(){
      
        $('#default_image').hide();
    }
    </script>
@endsection
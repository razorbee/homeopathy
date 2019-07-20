@extends('layouts.app')

@section('title')
    Edit an assistant
@endsection

@section('extra-css')

@endsection

@section('breadcrumb')
    <li class="float-left">
        <a href="{{url('/')}}" class="">Home</a>&nbsp;/&nbsp;
    </li>
    <li class="float-left">
        User / &nbsp;
    </li>
    <li class="float-left">
        <a href="{{url('/new-assistant')}}" class="">Edit User</a>
    </li>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="fa fa-user-circle-o fa-2x"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Edit User - {{$user->name}}</h4>
                <form action="#" method="post" id="newAssistant" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="row">
                        <div class="col-md-4" style="padding-left: 81px;">
                           
                            <div class="image-src" id="image-preview"><img id="default_image" src="{{url('/')}}/{{$user->image}}" style="width:250px;height:250px;margin-bottom:-200px;z-index:-2!important;background-image: none !important;" alt="">
                                <label for="image-upload" id="image-label"><img  src="{{url('/')}}/dashboard/images/pencil.png" height="20"/></label>
                                <input type="file" name="image" id="image-upload" onchange='hidedefault()'/>
                            </div>
                        </div>
                        <div class="col-md-8">
                            
							<div class="form-group-custom">
                                <input type="text" name="name" value="{{$user->name}}" required="required" autofocus/>
                                <label class="control-label">Name &nbsp;*</label><i class="bar"></i>
                            </div>
							<div class="form-group-custom">
                                <input type="text" name="username" value="{{$user->username}}" required="required" autofocus/>
                                <label class="control-label">Username &nbsp;*</label><i class="bar"></i>
                            </div>
							<div class="form-group-custom">
                                        <select name="role" id="" required="required">
                                            <option {{$user->role ==2 ? 'selected' : ''}} value="2">Receptionist</option>
                                            <option {{$user->role ==3 ? 'selected' : ''}} value="3">Doctor</option>
                                            <option {{$user->role ==4 ? 'selected' : ''}} value="4">Pharmacist</option>
                                        </select>
                                        <label class="control-label">User &nbsp;<span class="text-danger">*</span></label><i class="bar"></i>
                                    </div>
                            <div class="form-group-custom">
                                <input type="email" name="email" value="{{$user->email}}" required="required"/>
                                <label class="control-label">Email &nbsp;*</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <input type="password" name="password" id="pass1" />
                                <label class="control-label">Password &nbsp;*</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <input type="password" data-parsley-equalto="#pass1" name="confirm_password" />
                                <label class="control-label">Confirm Password &nbsp;*</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <input type="text" value="{{$user->phone}}" name="phone" maxlength="13" required="required"/>
                                <label class="control-label">Phone &nbsp;*</label><i class="bar"></i>
                            </div>
                            <div class="form-group-custom">
                                <textarea name="address" required="required">{{$user->address}}</textarea>
                                <label class="control-label">Address</label><i class="bar"></i>
                            </div>
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox2" name="status" type="checkbox" {{$user->status ==1 ? 'checked' : ''}}>
                                <label for="checkbox2">
                                    Active
                                </label>
                            </div>
                        </div>
                    </div>

                    <div style="padding-left: 35%;">
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                        <!-- <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button> -->
                        <button type="reset" class="btn btn-danger waves-effect waves-light" onclick=" window.history.back();">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
@endsection

@section('extra-js')
    <script>
        $(document).ready(function () {
            var form = $("#newAssistant");
            form.on('submit',function (e) {
                e.preventDefault();
                data = new FormData(this);
                showLoader();
                $(this).speedPost('{{url('/update-assistant/'.$user->id)}}',data,form);
              
            });
            hideLoader();
        })
        function hidedefault(){
     $('#default_image').hide();
    }
    </script>
@endsection
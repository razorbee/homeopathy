@extends('layouts.app')

@section('title')
    Title
@endsection

@section('extra-css')

@endsection

@section('breadcrumb')
    <li class="float-left">
        <a href="{{url('/')}}" class="">Home</a>&nbsp;/&nbsp;
    </li>
    <li class="float-left">
        Drug / &nbsp;
    </li>
    <li class="float-left">
        <a href="{{url('/new-drug')}}" class="">New Drug</a>
    </li>
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Add new drug</h4>
                <form action="#" method="post" id="newDrug">
                    {{csrf_field()}}

                    <div class="form-group-custom">
                        <!-- <input type="text" name="generic_name" required="required"/> -->
                        <select name="generic_name" id="" required="required">
                            <option  value="Medicine">Medicine</option>
                            <option  value="Mother-Tinture">Mother-Tinture</option>
                            <option  value="Ointments & Oils">Ointments & Oils</option>
                            <option  value="Syrups">Syrups</option>
                            <option  value="Dilutions">Dilutions</option>
                        </select>
                        <label class="control-label">Drug Type &nbsp;*</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <input type="text" name="name" required="required" autofocus/>
                        <label class="control-label">Drug Name &nbsp;*</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <textarea name="note" ></textarea>
                        <label class="control-label">Short Note</label><i class="bar"></i>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>


    <div class="col-6">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Add new disease</h4>
                <form  method="post" id="newDisease">
                    {{csrf_field()}}

                    
                    <div class="form-group-custom">
                        <input type="text" name="disease" id="disease_name" required="required" autofocus/>
                        <label class="control-label">Disease &nbsp;*</label><i class="bar"></i>
                    </div>
                    
                     <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; </button>
                    <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header card-header-icon">
                <i class="icon icon-pill"></i>
            </div>
            <div class="card-content">
                <h4 class="card-title">View disease</h4>
                <table class="table table-striped table-bordered">
                <thead>
                <tr>
                <td></td>
                <td>Disease</td>
                </tr>
                </thead>
                <tbody>
                @foreach($disease as $disease)
                <tr>
                <td id="id">{{$disease->id}}</td>
                <td id="diseases">{{$disease->disease}}</td>
                </tr>
         
                   
                    
                    @endforeach
                    </tbody>
                    </table>
                    
              
            </div>
        </div>
    </div>

@endsection
@section('extra-js')
    <script>
        $(document).ready(function () {
         

            var form = $("#newDrug");
            form.on('submit',function (e) {
               
                var formData = new FormData(this);
                e.preventDefault();
                $(this).speedPost('{{url('/save-drug')}}',formData,form);
            });

            var forms = $("#newDisease");
            forms.on('submit',function (e) { 
            debugger;
                var formData = new FormData(this);
                e.preventDefault();
                //$(this).speedPost('{{url('/save-disease')}}',formData,form);
                $.ajax({
            url:'save-disease',
            type:'POST',
            data:formData,
            contentType: false,
            cache: false,
            processData:false,
            success:function (data) {
                $.Notification.notify('success','top right',"Drug added successfully","drug has been added successfully");
                $("#disease_name").appendto(
                    $("<tr>").appendto(
                           $("#id",{text:data.id}),
                           $("#diseases",{text:data.id}),
                          
                       )
                   )
                
            },error:function (data){
                $(this).showAjaxError(data);
            }

        });
    });
});
</script>
    
@endsection

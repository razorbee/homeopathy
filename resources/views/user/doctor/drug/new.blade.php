@extends('layouts.app')

@section('title')
    Title
@endsection

@section('extra-css')
<style>
#diseaseTable_filter{
    margin-left: 70%!important;
}
</style>
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
                            <option  value="Biochemic">Biochemic</option>
                            <option  value="Mother-Tinture">Mother-Tinture</option>
                            <option  value="Ointments & Oils">Ointments & Oils</option>
                            <option  value="Syrups">Syrups</option>
                            <option  value="Dilutions">Dilutions</option>
                        </select>
                        <label class="control-label">Drug Type &nbsp;*</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <input type="text" name="name" required="required" id="newdrug" autofocus/>
                        <label class="control-label">Drug Name &nbsp;*</label><i class="bar"></i>
                    </div>
                    <div class="form-group-custom">
                        <textarea name="note" ></textarea>
                        <label class="control-label">Short Note</label><i class="bar"></i>
                    </div>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Submit &nbsp; <i id="loading" class="fa fa-refresh fa-spin"></i></button>
                    <!-- <button type="reset" class="btn btn-danger waves-effect waves-light">Cancel</button> -->
                    <button type="reset" class="btn btn-danger waves-effect waves-light" onclick=" window.history.back();">Cancel</button>
                </form>
            </div>
        </div>
    </div>

    @if(auth()->user()->role == 1 || auth()->user()->role == 3)  
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
                <!-- <table class="table table-striped table-bordered">
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
                    </table> -->
                    <table id="diseaseTable" class="table table-striped table-bordered" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Diseases</th>
           
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table> 
              
            </div>
        </div>
    </div>
@endif

@endsection
@section('extra-js')
<script src="{{url('/dashboard/plugins/datatables/datatable.min.js')}}"></script>
    <script>
        $(document).ready(function () {
    
            var diseaseTable =  $("#diseaseTable").dataTable({
                "dom": '<"top"lf>rt<"right"><"bottom"ip><"clear">',
            "processing": true,
            "serverSide": true,
            "ajax": "{{ url('/api/data-table/all-disease') }}",
            "columns": [
                { "data" : "#"},
                { "data": "disease" },
                { "data": "created_at" },
                { "data": "action" }
            ]
        });
            var form = $("#newDrug");
            form.on('submit',function (e) {
                e.preventDefault();

                if ($("#newdrug").val() && $("#newdrug").val().indexOf('\\') !== -1){
                    alert(" please ignore '\\'");
                    return;
                }
               var formData = new FormData(this);
                showLoader();
                $(this).speedPost('{{url('/save-drug')}}',formData,form);
            });
            hideLoader(); 
    
        var forms = $("#newDisease");
            forms.on('submit',function (e) { 
            
                var formData = new FormData(this);
                e.preventDefault();
                //$(this).speedPost('{{url('/save-disease')}}',formData,form);
                showLoader();
                $.ajax({
            url:'save-disease',
            type:'POST',
            data:formData,
            contentType: false,
            cache: false,
            processData:false,
            success:function (data) {
                hideLoader();
                $.Notification.notify('success','top right',"Disease added successfully","Disease has been added successfully");
                $('#diseaseTable').DataTable().ajax.reload()
                
            },
            error:function (data) {
                hideLoader();
                    $.Notification.notify('error','top right','Disease already taken');
                    
                }
        });
    })
    @if(session('delete_diseae'))
            $.Notification.notify('success','top right','Disease Deleted','Disease has been deleted successfully');
        @endif
        
});
</script>
    
@endsection
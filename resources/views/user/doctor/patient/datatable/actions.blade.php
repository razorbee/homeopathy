<div class=" ">
    <div style="padding:4px;"><a href="{{url('/edit-patient/'.$id)}}" class="btn btn-primary"><i class="ti-pencil-alt"></i> Edit &nbsp;&nbsp;&nbsp;</a></div>
    <div style="padding:4px;"><a href="{{url('/view-patient/'.$id)}}" class="btn btn-success"><i class="fa fa-info"></i> View &nbsp;&nbsp;&nbsp;</a></div>
    <div style="padding-top:4px;"><a href="javascript:void(0)" onclick="$(this).confirmDelete('{{url('/delete-patient/'.$id)}}')" class="btn btn-danger"><i class="fa fa-trash-o"></i> Delete</a></div>
</div>

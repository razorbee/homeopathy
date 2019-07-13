<div id="edit-drug-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Update drug form the list</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="drugUpdateForm">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group-custom">
                                <input type="text" id="updateDrugType" placeholder="Type" />
                                <label class="control-label"></label><i class="bar"></i>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <select class="form-control select2" id="drugUpdateSelect">
                                <option></option>
                                @foreach($drugs as $drug)
                                    <option value="{{$drug->id}}">{{$drug->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group-custom">
                                <input type="text" id="updateDrugStrength"/>
                                <label class="control-label">Strength</label><i class="bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <input type="text" id="updateDrugDose"/>
                               
                        <label class="control-label">Dose</label><i class="bar"></i>  
                       <input type="text" class="dosage" name="dose" id="dose" placeholder="value" style="display:none;"/><i class="bar"></i>  
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <input type="text" id="updateDrugDuration"/>
                                <label class="control-label">Duration</label><i class="bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group-custom">
                                <input type="text" id="updateDrugAdvice"/>
                                <label class="control-label">Advice</label><i class="bar"></i>
                            </div>
                        </div>
                                    <div class="col-md-6">
                                     <div   class="form-group-custom">
                                    
                                      <label type="hidden" class="control-label" id="updateFrequencies"></label>
                                     <!-- ======= {{$drug}} -->
                                      <br>
                                      <ul class="medi" id="popup_freq">
                                      
                                      <li class="d-inline">
                                      <label class="checkbox-inline  m-r-10 m-l-10   text-center" for="morning">
                                      <input type="checkbox" id="morning" name="frequencies[]" value="morning" class="mor"/>Morning
                                        </label>
                                        </li>
                                        <li  class="d-inline m-r-5  text-center">
                                          <label class="checkbox-inline m-r-10 m-r-10 m-r-10 " for="afternoon">
                                      <input type="checkbox" id="afternoon" name="frequencies[]" value="afternoon"/>Afternoon
                                    </label>
                                    </li>
                                        <li class="d-inline m-r-5  text-center">
                                      <label class="checkbox-inline" for="evening">
                                      <input type="checkbox" id="evening" name="frequencies[]" value="evening"/>Evening
                                    </label>
                                    </li>
                                        <li class="d-inline m-r-5 text-center">
                                      <label class="checkbox-inline" for="night">
                                        <input type="checkbox" id="night" name="frequencies[]" value="night"/>Night
                                        </label> </li>
                                        </ul>


                                    </div>
                                </div>   
                    </div>
                    <button type="submit" hidden>Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" id="updateDrugList" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

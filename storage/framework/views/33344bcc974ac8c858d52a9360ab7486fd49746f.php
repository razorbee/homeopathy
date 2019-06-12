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
                                <?php $__currentLoopData = $drugs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $drug): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($drug->id); ?>"><?php echo e($drug->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                    
                                      <br>
                                      <ul class="medi">
                                      
                                      <li class="d-inline">
                                      <label class="checkbox-inline  m-r-10 m-l-10   text-center" for="morning">
                                      <input type="checkbox" id="updateFrequencies" name="frequencies[]" value="<?php echo e($drug->frequencies); ?>" class="mor"/>Morning
                                        </label>
                                        </li>
                                        <li  class="d-inline m-r-5  text-center">
                                          <label class="checkbox-inline m-r-10 m-r-10 m-r-10 " for="afternoon">
                                      <input type="checkbox" id="updateFrequencies" name="frequencies[]" value="<?php echo e($drug->frequencies); ?>"/>Afternoon
                                    </label>
                                    </li>
                                        <li class="d-inline m-r-5  text-center">
                                      <label class="checkbox-inline" for="evening">
                                      <input type="checkbox" id="updateFrequencies" name="frequencies[]" value="<?php echo e($drug->frequencies); ?>"/>Evening
                                    </label>
                                    </li>
                                        <li class="d-inline m-r-5 text-center">
                                      <label class="checkbox-inline" for="night">
                                        <input type="checkbox" id="updateFrequencies" name="frequencies[]" value="<?php echo e($drug->frequencies); ?>"/>Night
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
<div id="add-drug-duration" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Add Duration</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="newDrugDurationForm">
                    <?php echo e(csrf_field()); ?>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group-custom">
                                <input type="text" name="duration" required="required"/>
                                <label class="control-label">Drug duration &nbsp;*</label><i class="bar"></i>
                            </div>
                        </div>
                    </div>
                    <input type="submit" hidden>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" onclick="$('#newDrugDurationForm').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
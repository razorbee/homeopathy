<div id="edit-drug-advice" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Add drug advice</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="updateDrugAdviceForm">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group-custom">
                                <input type="text" id="input_update_drug_advice" name="drug_advice" required="required"/>
                                <label class="control-label">Drug advice &nbsp;*</label><i class="bar"></i>
                            </div>
                        </div>
                    </div>
                    <div class="checkbox">
                        <input name="status" id="checkbox_drug_advice_status" type="checkbox">
                        <label for="checkbox_drug_advice_status">
                            Active
                        </label>
                    </div>
                    <input type="submit" hidden>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" onclick="$('#updateDrugAdviceForm').submit()" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->
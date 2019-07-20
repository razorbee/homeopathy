<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title mt-0">Add New Drug</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="newDrug">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
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
                        </div>
                        <div class="col-md-6">
                          <div class="form-group-custom">
                              <input type="text" name="name" required="required" autofocus/>
                              <label class="control-label">Drug Name &nbsp;*</label><i class="bar"></i>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group-custom">
                              <textarea name="note" ></textarea>
                              <label class="control-label">Short Note</label><i class="bar"></i>
                          </div>
                        </div>
                    </div>
<button type="submit" hidden></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="button" id="saveDrug" class="btn btn-info waves-effect waves-light">Save changes</button>
            </div>
        </div>
    </div>
</div><!-- /.modal -->

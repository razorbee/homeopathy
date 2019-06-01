<div class="tab-pane active" id="advice">

    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.advice.modal.new', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('user.doctor.setting.prescription.tab-body.advice.modal.edit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


    <button style="float: right" type="button" class="btn btn-primary waves-effect" data-toggle="modal" data-target="#add-advice"><i class="fa fa-plus"></i> New  Advice</button>
    <h4>Prescription Advice</h4>
    <br>

    <table id="adviceTable" width="100%" class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Advice</th>
            <th>Status</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
        </thead>
    </table>
</div>
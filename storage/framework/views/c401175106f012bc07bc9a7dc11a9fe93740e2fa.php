<div class="tab-pane active" id="mail-setup">

    <form action="javascript:void(0)" id="mailSettingForm">
        <?php echo e(csrf_field()); ?>

        <div class="form-group-custom">
            <input type="text" name="mail_form" value="<?php echo e(config('mail.from.name')); ?>" required="required"/>
            <label class="control-label">Name</label><i class="bar"></i>
        </div>
        <div class="form-group-custom">
            <input type="text" name="host" value="<?php echo e(config('mail.host')); ?>" required="required"/>
            <label class="control-label">Mail host</label><i class="bar"></i>
        </div>
        <div class="form-group-custom">
            <input type="number" name="port" value="<?php echo e(config('mail.port')); ?>" required="required"/>
            <label class="control-label">Mail port</label><i class="bar"></i>
        </div>
        <div class="form-group-custom">
            <input type="email" name="mail_address" value="<?php echo e(config('mail.username')); ?>" required="required"/>
            <label class="control-label">User name (email)</label><i class="bar"></i>
        </div>
        <div class="form-group-custom">
            <input type="password" name="password" required="required"/>
            <label class="control-label">Password</label><i class="bar"></i>
        </div>
        <div class="form-group-custom">
            <input type="password" name="confirm_password" required="required"/>
            <label class="control-label">Re-Type Password</label><i class="bar"></i>
        </div>
        <div class="form-group-custom">
            <input type="text" name="encryption" value="<?php echo e(config('mail.encryption')); ?>" required="required"/>
            <label class="control-label">Encryption</label><i class="bar"></i>
        </div>

        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

</div>
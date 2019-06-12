Role : <?php if($assistant->role == 1): ?>
  Admin
<?php elseif($assistant->role == 2): ?>
    Receiptionist
<?php elseif($assistant->role == 3): ?>
    Doctor
<?php elseif($assistant->role == 4): ?>
    Pharmacist

<?php else: ?>
    Other
<?php endif; ?>


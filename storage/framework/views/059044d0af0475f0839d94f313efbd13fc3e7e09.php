<?php $__env->startComponent('mail::message'); ?>
# Order Status
Order Code : <b><?php echo e($data['oc']); ?> </b>
Your Order Status is now <b><?php echo e($data['status']); ?></b>



Thanks for Ordering,<br>
<?php echo e(config('app.name')); ?>

<?php if (isset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d)): ?>
<?php $component = $__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d; ?>
<?php unset($__componentOriginal2dab26517731ed1416679a121374450d5cff5e0d); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
\
<?php /**PATH /home/aayancom/public_html/resources/views/emails/orders/status.blade.php ENDPATH**/ ?>
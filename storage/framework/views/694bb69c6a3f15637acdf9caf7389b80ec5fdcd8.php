

<?php $__env->startSection('main-content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('/backend/assets/vendor/summernote/dist/summernote.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('/backend/assets/vendor/summernote/dist/summernote-bs4.min.css')); ?>">
<style type="text/css">
textarea.input-field
{  
    width: 100%;
    height: 150px;
    /* border-color: Transparent;      */
}
.left-area {
    text-align: right;
}
.left-area .heading {
    font-size: 16px!important;
    font-weight: 600;
    color: #0d3359;
    margin-bottom: 0px;
    font-family: "Open Sans", sans-serif;
    line-height: 1.2380952380952381;
}
.left-area .sub-heading {
    font-size: 12px;
    color: #143250;
}
.left-area p {
    margin-bottom: 0px;
    font-size: 16px;
    color: #465541;
    line-height: 1.625;
    -webkit-hyphens: auto;
    -moz-hyphens: auto;
    -ms-hyphens: auto;
    font-family: "Open Sans", sans-serif;
    hyphens: auto;
}
</style>
<script src="<?php echo e(asset('../backend/assets/vendor/jquery/jquery.min.js')); ?>"></script>


<div class="card">
    <div class="card-body">
        <form class="addFooter">

<div class="row justify-content-center">
    <div class="col-lg-3">
        <div class="left-area">
            <h4 class="heading">
               Terms and Conditions *
                <p class="sub-heading">(In Any Language)</p>
            </h4>
        </div>
    </div>
    <div class="col-lg-9">
        <div class="tawk-area">
            <textarea class="summernote form-control" name="terms" required=""  placeholder="Terms and Conditions *"><?php echo e(@$terms->terms); ?></textarea>
            
        </div>

        <div class="mt-2">
            <input class="btn btn-primary theme-bg gradient" type="submit" value="Submit">
        </div>
    </div>
</div>

        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $( ".addFooter" ).submit(function( event ) {
            
            event.preventDefault();
            let formData = new FormData()
            let terms = $(this).find("textarea[name=terms]").val();
           
            formData.append('terms', terms);


            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
            });
            $.ajax({
                
                type: "POST",
                url: "<?php echo e(route('setting.terms')); ?>",
                data: formData,
                success: function(response){
                   
                    swal("Success", "Changed successfully","success")
                },
                error: function(error){
                    
                    alert("can not change");
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-stylesheet'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-scripts'); ?>

    <script src="<?php echo e(asset('/backend/js/category.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend/assets/bundles/mainscripts.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('/backend/assets/vendor/summernote/dist/summernote-bs4.min.js')); ?>"></script>
    <script>
        $('.summernote').summernote({
            placeholder: 'text',
            tabsize: 1,
            height: 220
        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/setting/terms.blade.php ENDPATH**/ ?>
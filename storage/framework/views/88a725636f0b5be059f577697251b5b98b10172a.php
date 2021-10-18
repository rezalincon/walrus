
<?php $__env->startSection('main-content'); ?>
<style>
    .social-links-area input:checked + .slider {
        background-color: #2d3274;
    }
</style>
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<div class="card social-links-area mt-5">
    <div class="card-body">
        <form class="socialLinks">
            <div class="row">
                <label class="control-label col-sm-3 text-primary" for="facebook">Facebook *</label>
                <div class="col-sm-6">
                    <input class="form-control m-b-10" name="facebook" id="facebook" placeholder="http://facebook.com/" required="" type="text" value="<?php echo e($data->facebook ?? 'http://facebook.com/'); ?>">
                </div>
                <div class="col-sm-3">
                    <label class="switch">
                        <input type="checkbox" name="f_status" value="f_status" <?php echo e(($data && $data->f_status)?'checked':'unchecked'); ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>
            

            <div class="row">
                <label class="control-label col-sm-3 text-danger" for="twitter">Youtube *</label>
                <div class="col-sm-6">
                    <input class="form-control m-b-10" name="twitter" id="twitter" placeholder="http://youtube.com/" required="" type="text" value="<?php echo e($data->twitter ?? 'http://youtube.com/'); ?>">
                </div>
                <div class="col-sm-3">
                    <label class="switch">
                        <input type="checkbox" name="t_status" value="t_status" <?php echo e(($data && $data->t_status)?'checked':'unchecked'); ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="row">
                <label class="control-label col-sm-3" style="color:#aa0909" for="linkedin">Instagram *</label>
                <div class="col-sm-6">
                    <input class="form-control m-b-10" name="linkedin" id="linkedin" placeholder="http://instagram.com/" required="" type="text"value="<?php echo e($data->linkedin ?? 'http://instagram.com/'); ?>">
                </div>
                <div class="col-sm-3">
                    <label class="switch">
                        <input type="checkbox" name="l_status" value="l_status" <?php echo e(($data && $data->l_status)?'checked':'unchecked'); ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="row">
                <label class="control-label col-sm-3" style="color:#2695f0" for="dribble">Twitter *</label>
                <div class="col-sm-6">
                    <input class="form-control m-b-10" name="dribble" id="dribble" placeholder="https://twitter.com/" required="" type="text" value="<?php echo e($data->dribble ?? 'https://twitter.com/'); ?>">
                </div>
                <div class="col-sm-3">
                    <label class="switch">
                        <input type="checkbox" name="d_status" value="d_status" <?php echo e(($data && $data->d_status)?'checked':'unchecked'); ?>>
                        <span class="slider round"></span>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary theme-bg gradient">Save</button>
                </div>
             </div>
    


        </form>

    </div>

</div>
<script type="text/javascript">
    $(document).ready(function(){
        $( ".socialLinks" ).submit(function( event ) {
            
            event.preventDefault();
            let formData = new FormData()
            let facebook = $(this).find("input[name=facebook]").val();
            let f_status=$(this).find("input[name=f_status]").is(':checked')?1:0;
            let google = $(this).find("input[name=gplus]").val();
            let g_status=$(this).find("input[name=g_status]").is(':checked')?1:0;
            let twitter = $(this).find("input[name=twitter]").val();
            let t_status=$(this).find("input[name=t_status]").is(':checked')?1:0;
            let linkedin = $(this).find("input[name=linkedin]").val();
            let l_status=$(this).find("input[name=l_status]").is(':checked')?1:0;
            let dribble = $(this).find("input[name=dribble]").val();
            let d_status=$(this).find("input[name=d_status]").is(':checked')?1:0;
            formData.append('facebook', facebook);
            formData.append('f_status', f_status);
            formData.append('google', google);
            formData.append('g_status', g_status);
            formData.append('twitter', twitter);
            formData.append('t_status', t_status);
            formData.append('linkedin', linkedin);
            formData.append('l_status', l_status);
            formData.append('dribble', dribble);
            formData.append('d_status', d_status);
            console.log(formData);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                processData: false,
                contentType: false,
            });
            $.ajax({
                
                type: "POST",
                url: "/admin/social/socialLinksStore",
                data: formData,
                success: function(response){
                    console.log(response)
                    swal("Success", "Changed successfully","success")
                },
                error: function(error){
                    console.log(error)
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/aayancom/public_html/resources/views/admin/setting/socialLinks.blade.php ENDPATH**/ ?>
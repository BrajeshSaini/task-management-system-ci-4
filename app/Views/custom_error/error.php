<?php 
print_r($errors);
?>
    <h1>Error</h1>
    <p><?= $errorMessage; ?></p>

    <?php 
        if (isset($errors['first_name'])):
    ?>
            <div class="alert alert-danger">
                <?php echo $errors['first_name']; ?>
            </div>
    <?php 
        endif;
    ?>
    <!-- End First Name Error -->

    <?php 
        if (isset($errors['last_name'])):
    ?>
            <div class="alert alert-danger">
                <?php echo $errors['last_name']; ?>
            </div>
    <?php 
        endif;
    ?>
    <!-- End Last Name Error -->

    <?php 
        if (isset($errors['mobile'])):
    ?>
            <div class="alert alert-danger">
                <?php echo $errors['mobile']; ?>
            </div>
    <?php 
        endif;
    ?>
    <!-- End Mobile Error -->
    <?php 
        if (isset($errors['email'])):
    ?>
            <div class="alert alert-danger">
                <?php echo $errors['email']; ?>
            </div>
    <?php 
        endif;
    ?>
    <!-- End Email Error -->
    <?php 
        if (isset($errors['password'])):
    ?>
            <div class="alert alert-danger">
                <?php echo $errors['password']; ?>
            </div>
    <?php 
        endif;
    ?>
    <!-- End Password Error -->

    
    <?php 
        if (isset($errors['role_id'])):
    ?>
            <div class="alert alert-danger">
                <?php echo $errors['role_id']; ?>
            </div>
    <?php 
        endif;
    ?>
    <!-- End Role Error -->


    <?php
        if($from == 'user'):
    ?>
            <a href="<?=base_url('/user')?>" >click here </a> to go back
    <?php 
        endif; 
    ?>
     <?php
        if($from == 'user_add'):
    ?>
            <a href="<?=base_url('/create_user')?>" >click here </a> to go back
    <?php 
        endif; 
    ?>


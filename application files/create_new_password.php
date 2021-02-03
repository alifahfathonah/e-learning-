
<main>

    <div class = "wrapper-main">
    
        <section class = "section-default">

            <?php 

                        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {


                        
            ?>

                                <form action = reset-password.php method = "post">
                                    <input type = "hidden" name = "selector" value = "<?php echo $selector; ?>">
                                    <input type = "hidden" name = "validator" value = "<?php echo $validator; ?>">
                                    <input type = "password" name = "password" placeholder="Enter a new password...!">
                                    <input type = "password" name = "con_password" placeholder="Confirm your new password...!">
                                    <button type = "submit" name = "reset-password">Reset password</button>
                                </form>

                                <?php

                        } else{
                            if (empty($selector) || empty($validator)) {
                        
                                echo "Could not validate your request!";
        
                            }

                        }
                    
                    
                ?>
        </section>

    </div>

</main>
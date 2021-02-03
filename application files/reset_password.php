<?php 
/*    require "header.php"*/
?>

    <main>
        <div class= "wrapper-main">
            <section class="section-default">
                <h1>Reset your password</h1>
                <p>An e-mail will be sent to you with instructions on how to reset your password</p>
                <form action="reset_request.php" method="post">
                    <input type="email" name="email" placeholder="Enter your e-mail address">
                    <button type="submit" name="reset-request-submit">Receive new password via e-mail</e-mail></button>
                </form>
            </section>
        </div>
    </main>

    <?php


                   if (isset($_POST["reset-request-submit"])) {
                        
                        echo '<p class = "reset_password.php?success"> Check your email</p>';

                    }else{ echo "You seeing flames here";}
    ?>
      
<?php
    /*require"footer.php";*/
?>
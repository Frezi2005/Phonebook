
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php

        echo $this->Html->css('home');

        echo $this->fetch('meta');
		echo $this->fetch('css');
        echo $this->fetch('script');

    ?>
    
</head>
<body>
    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 mx-auto container">
        <div class="content">
            <div class="name-message-container">
                <div class="name">Phone Book</div>
                <hr class="horizontal-line">
                <div class="message">
                    Your success is in our hands!<br/><br/>

                    Create proffesional data base of buisness data for your company development.<br/><br/>

                    Here you can put every information, to contact your buisness partners, and clear interface will grant you quick access to all of your records.
                </div>
            </div>
            <div class="form-box">
                <div class="button-box">
                    <div id="btn"></div>
                    <button type="button" class="toggle-btn toggle-btn-login">Log In</button>
                    <button type="button" class="toggle-btn toggle-btn-register">Register</button>
                </div>
                <div class="forms">
                    <?php

                        // LOG IN FORM
                        echo $this->Form->create('Login', array('type' => 'post', 'url' => '/login-user', 'class' => 'login-form inputs-group'));
                        echo $this->Form->input('login',array('placeholder' => 'Login', 'label' => '', 'class' => 'input-field'));
                        echo $this->Form->input('password',array('placeholder' => 'Password', 'label' => '', 'class' => 'input-field'));
                        echo $this->Form->input('rememberMe',array('label' => '<span>Remember Me</span>', 'type' => 'checkbox', 'class' => 'check-box'));
                        echo "<span class='error'>".$this->Session->read("loginError")."</span>";
                        $options = array('label' => 'Log In', 'class' => 'submitBtn', 'div' => false);
                        echo $this->Form->end($options);

                        // REGISTRATION FORM
                        echo $this->Form->create('Register', array('type' => 'post', 'url' => '/register-user', 'class' => 'register-form inputs-group'));
                        echo $this->Form->input('login',array('placeholder' => 'Login', 'label' => '', 'class' => 'input-field'));
                        echo $this->Form->input('password',array('placeholder' => 'Password', 'label' => '', 'class' => 'input-field'));
                        echo $this->Form->input('passwordConfirm',array('placeholder' => 'Confirm Password', 'label' => '', 'class' => 'input-field', 'type' => 'password'));
                        echo "<span class='registerError'>".$this->Session->read("registerError")."</span>";
                        echo $this->Form->input('agreeToRules',array('label' => '<span>I agree to Terms & Conditions</span>', 'type' => 'checkbox', 'class' => 'check-box'));
                        echo $this->Form->end('Register*');
                        echo "<p>*By clicking this button, you automatically consent to the <a href='personalData'>processing of personal data.</a></p>";

                    ?>
                </div>
                
            </div>
        </div>
    </div>

    <?php

    if($this->Session->read("registerMessage") !== null) {?>
        <script>

        const Toast = Swal.mixin({
        toast: true,
        position: 'center',
        timer: 3000,
        showConfirmButton: false,
        });

        Toast.fire({
        icon: 'success',
        title: "<?=$this->Session->read("registerMessage")?>"
        });
        </script>
    <?php 
        unset($_SESSION['registerMessage']);
    } 
    ?>

    

</body>
</html>

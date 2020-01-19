
<?php
$this->loadHelper('Html');
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php

        echo $this->Html->css('home');
        echo $this->Html->script('https://code.jquery.com/jquery-3.4.1.js');
        echo $this->Html->script('main');
        echo $this->Html->css('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');
        echo $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
        echo $this->Html->script('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js');
        echo $this->Html->script("https://cdn.jsdelivr.net/npm/sweetalert2@9");
        echo $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/granim/2.0.0/granim.js');

        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

    ?>
    
</head>
<body>
    <div class="col-xl-10 mx-auto content">
        <div class="name-message-container">
            <div class="name">Phone Book</div>
            <hr class="horizontal-line">
            <div class="message">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam quod saepe, distinctio at eius fuga maiores laborum consequuntur numquam porro tempore ullam et minus blanditiis repellat placeat molestiae totam adipisci?</div>
        </div>
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn toggle-btn-login">Log In</button>
                <button type="button" class="toggle-btn toggle-btn-register">Register</button>
            </div>
            <?php

                // LOG IN FORM
                echo $this->Form->create('Login', array('type' => 'post', 'url' => '/login-user', 'class' => 'login-form inputs-group'));
                echo $this->Form->input('login',array('placeholder' => 'Login', 'label' => '', 'class' => 'input-field'));
                echo $this->Form->input('password',array('placeholder' => 'Password', 'label' => '', 'class' => 'input-field'));
                echo $this->Form->input('rememberMe',array('label' => '<span>Remember Me</span>', 'type' => 'checkbox', 'class' => 'check-box'));
                echo $this->Form->end('Log In');

                // REGISTRATION FORM
                echo $this->Form->create('Register', array('type' => 'post', 'url' => '/register-user', 'class' => 'register-form inputs-group'));
                echo $this->Form->input('login',array('placeholder' => 'Login', 'label' => '', 'class' => 'input-field'));
                echo $this->Form->input('password',array('placeholder' => 'Password', 'label' => '', 'class' => 'input-field'));
                echo $this->Form->input('password',array('placeholder' => 'Confirm Password', 'label' => '', 'class' => 'input-field'));
                echo $this->Form->input('agreeToRules',array('label' => '<span>I agree to Terms & Conditions</span>', 'type' => 'checkbox', 'class' => 'check-box'));
                echo $this->Form->end('Register');

            ?>
        </div>
    </div>
    
</body>
</html>
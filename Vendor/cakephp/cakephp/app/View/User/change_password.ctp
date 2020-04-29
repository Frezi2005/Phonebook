<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php

        echo $this->Html->css('changeLogin');

        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

    ?>
    
</head>
<body>
    <div class="changeLogin">
        <?php

        echo $this->Form->create('ChangePassword', array('url' => '/change-password', 'type' => 'post', 'class' => 'changePasswordForm'));
        echo $this->Form->input('newPassword', array('label' => '', 'placeholder' => 'Type in your new password', 'class' => 'passwordInput'));
        echo $this->Form->end('Change');

        ?>
    </div>
</body>

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

        echo $this->Form->create('ChangeLogin', array('url' => '/change-login', 'type' => 'post', 'class' => 'changeLoginForm'));
        echo $this->Form->input('newLogin', array('label' => '', 'placeholder' => 'Type in your new login', 'class' => 'loginInput'));
        echo $this->Form->end('Change');

        ?>
    </div>
</body>

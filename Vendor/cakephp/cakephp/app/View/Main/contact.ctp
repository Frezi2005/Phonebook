
<?php
$this->loadHelper('Html');
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php

        echo $this->Html->css('contact');

        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

    ?>
    
</head>
<body>
    <div class="col-xl-10 mx-auto content">
    <div class="name-message-container mx-auto">
            <div class="name">Phone Book</div>
            <hr class="horizontal-line">
            <div class="message">
                <i class="fas fa-at"></i> Email: <a id="link" href="mailto:kamil.wan05@gmail.com">kamil.wan05@gmail.com</a><br/>
                <i class="fab fa-facebook"></i> Facebook: <a id="link" target="_blank" href="https://www.facebook.com/kamil.waniczek.39">Kamil Waniczek</a><br/>
                <i class="fab fa-facebook-messenger"></i> Messenger: Kamil Waniczek
            </div>
        </div>
    </div>
    
</body>
</html>
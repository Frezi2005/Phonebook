
<?php
$this->loadHelper('Html');
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php

        echo $this->Html->css('contact');
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
    <div class="name-message-container mx-auto">
            <div class="name">Phone Book</div>
            <hr class="horizontal-line">
            <div class="message">
                Email: <a id="link" href="mailto:kamil.wan05@gmail.com">kamil.wan05@gmail.com</a><br/>
                Facebook: <a id="link" href="https://www.facebook.com/kamil.waniczek.39">Kamil Waniczek</a><br/>
                Messenger: Kamil Waniczek
            </div>
        </div>
    </div>
    
</body>
</html>
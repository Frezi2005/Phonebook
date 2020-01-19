<?php
$this->loadHelper('Html');
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php

        echo $this->Html->css('layout');
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
    <nav>
        <div class="col-xl-10 mx-auto">
            <span class="logo my-auto">LOGO</span>
            <ul>
                <li><a href="home">Home</a></li>
                <li><a href="about">About</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>  
        </div>
    </nav>
    <div class="col-xl-10 mx-auto content">
        
    </div>
    
    <?php echo $this->fetch('content'); ?>

    <footer>
        <div class="col-xl-10 mx-auto">
            <span id="footer-text" class="mx-auto">Kamil Waniczek <?= date("Y"); ?> &copy; All rights reserved.</span>
        </div>        
    </footer>
</body>
</html>

<?php
$this->loadHelper('Html');
$cakeDescription = 'CakePHP: the rapid development php framework';

echo $this->Html->css('contact');
echo $this->Html->css('base');

echo $this->fetch('meta');
echo $this->fetch('css');
echo $this->fetch('script');

?>

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
    
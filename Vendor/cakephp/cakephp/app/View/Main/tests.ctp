<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    echo $this->Html->css('tests');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
    
    <div class="container">
        <div class="main">
            <div class="first"></div>
            <div class="second"></div>
        </div> 

    </div>

    <script>
        
        var main = $(".main");
        var clicked = true;

        $(document).click(() => {
            if(clicked == true) {
                main.css("left", "-400px");
                clicked = false;
                console.log(clicked);
            } else {
                main.css("left", "0");
                clicked = true;
                console.log(clicked);
            }
        });

    </script>

</body>
</html>
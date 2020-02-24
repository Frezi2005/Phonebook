<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <?php

        echo $this->Html->css('profile');

        echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

    ?>
    
</head>
<body>

    <?=$this->Flash->render();?>

    <div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 mx-auto container">   
        <div class="profile col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 my-auto text-center">
            <button class="addContact btn btn-light btn-lg btn-block mx-auto" data-function="add-contact">Add Contact</button>
            <div class="login"><?=$name?></div>
            <div class="contactsNumber">Number of contact: <?=$totalContacts?></div>
            <div class="settings">
                <a href="change-login" class="change-name">Change login</a><br/>
                <a href="" class="change-password">Change password</a>
            </div>
        </div>

        <div class="contacts col-xl-9 col-lg-9 col-md-9 col-sm-9 col-9">
            <?php

                for($i = 0; $i < count($contacts); $i++) { 
                    echo <<<EOL
                    <div class='row text-right'>
                        <span class='col-xl-11 col-lg-11 col-md-11 col-sm-11 col-11 text-left contact'>
                            <i class='fas fa-sort-up arrow my-auto' id='arrow$i'></i>
EOL;
                            echo $contacts[$i]['Contact']['name'];
                            echo $this->Form->create('EditContact', array('url' => '/edit-contact', 'type' => 'post', 'class' => 'editContactForm'));
                            echo $this->Form->input("isFavourite", array('placeholder' => 'Make Contact Favourite', 'class' => 'isFavourite input-field', 'label' => ''));
                            echo $this->Form->input("name", array('placeholder' => 'Edit Name And Surname', 'class' => 'nameInput input-field', 'label' => ''));
                            echo $this->Form->input("number", array('placeholder' => 'Edit Phone Number', 'class' => 'phoneNumber input-field', 'label' => ''));
                            echo $this->Form->input("secondNumber", array('placeholder' => 'Edit Second Phone Number', 'class' => 'secondPhoneNumber input-field', 'label' => ''));
                            echo $this->Form->input("address", array('placeholder' => 'Edit Address', 'class' => 'addressInput input-field', 'label' => ''));
                            echo $this->Form->input("company", array('placeholder' => 'Edit Company', 'class' => 'companyInput input-field', 'label' => ''));
                            echo $this->Form->input('contactId', array('value' => $contacts[$i]['Contact']['id'], 'type' => 'hidden'));
                            echo $this->Form->end("Save", array('div' => false, 'class' => 'submitBtn'));
                    echo "</span><div class='col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1'><i data-function='remove-contact' class='fas fa-trash' id='".$contacts[$i]['Contact']['id']."'></i></div></div>";       
                }

            ?>
        </div>

        <div class="modalDiv">
            <span data-function="close-modal" class="closeModal">X</span>
            <?php

            echo $this->Form->create('AddContact', array('url' => '/add-contact', 'type' => 'post', 'class' => 'addContactModal'));
            echo $this->Form->input("name", array('placeholder' => 'Name And Surname', 'class' => 'nameInput', 'label' => ''));
            echo $this->Form->input("number", array('placeholder' => 'Phone Number', 'class' => 'phoneNumber', 'label' => ''));
            echo $this->Form->input("secondNumber", array('placeholder' => 'Second Phone Number', 'class' => 'secondPhoneNumber', 'label' => ''));
            echo $this->Form->input("address", array('placeholder' => 'Address', 'class' => 'addressInput', 'label' => ''));
            echo $this->Form->input("company", array('placeholder' => 'Company', 'class' => 'companyInput', 'label' => ''));

            echo $this->Form->end('Add Contact', array('div' => false));
            ?>
        </div>
       
    </div>
</body>


    <!-- <button onclick="window.location.replace('delete-user');">Delete account</button><br/><br/><br/> -->

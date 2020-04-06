<?php

App::uses('Component', 'Controller');

class ValidateEmailComponent extends Component {
    public function validateEmail($email){
        //DODANY W CELACH NAUKOWYCH
        if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
            return false;
        }
        
        $domain = explode("@", $email, 2);
        return (checkdnsrr($domain[1]) && !empty(dns_get_record($domain[1]))) ? true : false;
    }
}

?>
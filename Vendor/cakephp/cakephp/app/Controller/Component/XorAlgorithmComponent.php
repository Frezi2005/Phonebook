<?php

App::uses('Component', 'Controller');

class XorAlgorithmComponent extends Component {
    function xorCipher($string, $key) {
        $sLength = strlen($string);
        $xLength = strlen($key);
        for($i = 0; $i < $sLength; $i++) {
                for($j = 0; $j < $xLength; $j++) {
                    $string[$i] = $string[$i]^$key[$j];
                }
        }
        return $string;
    }
}

?>
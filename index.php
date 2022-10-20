<?php 

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        print_r("Olá $email, como vc está?\n");
    }
    print_r("deu bom");

?>
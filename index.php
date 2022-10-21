<?php 

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        print_r("Olá $email, como vc está?<br>");
        print_r("Conectando...");
        if ($conn = pg_connect(getenv("DATABASE_URL"))) {
            print_r("Conetado...");
        } 
    }
    print_r("deu bom");

?>
<?php 

    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        print_r("Olá $email, como vc está?<br>");
        print_r("Conectando...");
        if ($conn = pg_connect(getenv("DATABASE_URL"))) {
            $result_db = pg_query($conn, "SELECT * FROM public.mensagens WHERE email LIKE '%$email%'");
            foreach ($result_db as $key => $value) {
                print_r($value);
            }
        } 
    }
    print_r("deu bom");

?>
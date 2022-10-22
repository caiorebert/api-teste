<?php 

    if (isset($_POST)) {
        print_r($_POST);
    }
    if (isset($_GET['op'])) {
        switch ($_GET['op']) {
            case 'ins':
                
                break;
            case 'sele':
                break;
            default:
                # code...
                break;
        }
    }
    if (isset($_GET['email'])) {
        $email = $_GET['email'];
        print_r("Olá $email, como vc está?<br>");
        print_r("Conectando...<br>");
        if ($conn = pg_connect(getenv("DATABASE_URL"))) {
            if ($result_db = pg_query($conn, "SELECT * FROM public.mensagens WHERE email LIKE '%$email%'")) {
                while($row = pg_fetch_row($result_db)) {
                    print_r($row);
                }
            } else {
                pg_result_error($result_db);
            }
        } 
    }

?>
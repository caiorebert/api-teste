<?php 
    if (isset($_POST)) {
        if (isset($_POST['email']) && isset($_POST['message']) && isset($_POST['name'])) {
            $array = [
                0 => $_POST['name'],
                1 =>$_POST['email'],
                2 => $_POST['message']
            ];
            if ($conn = pg_connect("host=localhost port=5432 dbname=public user=postgres password=1234")) {
                if ($result_db = pg_query($conn, "INSERT INTO public.mensagens (name, email, message) VALUES ('{$array[0]}', '{$array[1]}', '{$array[2]}') ")) {
                    print_r("adicionado!");
                } else {
                    pg_result_error($result_db);
                }
            } 
        }
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
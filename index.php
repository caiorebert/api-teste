<?php 
    if (isset($_POST)) {
        if (isset($_POST['email']) && isset($_POST['message']) && isset($_POST['name'])) {
            $array = [
                0 => $_POST['name'],
                1 =>$_POST['email'],
                2 => $_POST['message']
            ];
            if (getenv("DATABASE_URL")!="") {
                // if ($conn = pg_connect(getenv("DATABASE_URL"))) {
                //     if ($result_db = pg_query($conn, "INSERT INTO public.mensagens (name, email, message) VALUES ('{$array[0]}', '{$array[1]}', '{$array[2]}') ")) {
                //         print_r("adicionado!");
                //     } else {
                //         pg_result_error($result_db);
                //     }
                // }
            } else {
                if ($conn = pg_connect("host=localhost port=5432 dbname=public user=postgres password=1234")) {
                    if ($result_db = pg_query($conn, "INSERT INTO public.mensagens (name, email, message) VALUES ('{$array[0]}', '{$array[1]}', '{$array[2]}') ")) {
                        print_r("adicionado!");
                    } else {
                        pg_result_error($result_db);
                    }
                }
            }
        }
    }

?>

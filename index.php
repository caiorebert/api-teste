<?php 
    switch ($_SERVER['REQUEST_URI']) {
        case '/':
            if (isset($_POST)) {
                if (isset($_POST['email']) && isset($_POST['message']) && isset($_POST['name'])) {
                    $array = [
                        0 => $_POST['name'],
                        1 =>$_POST['email'],
                        2 => $_POST['message']
                    ];
                    if (getenv("DATABASE_URL")!="") {
                        if ($conn = pg_connect(getenv("DATABASE_URL"))) {
                            if ($result_db = pg_query($conn, "INSERT INTO public.mensagens (name, email, message) VALUES ('{$array[0]}', '{$array[1]}', '{$array[2]}') ")) {
                                print_r("adicionado!");
                            } else {
                                pg_result_error($result_db);
                            }
                        }
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
            break;
        case '/lista':
            if (isset($_POST)) {
                if (getenv("DATABASE_URL")!="") {
                    if ($conn = pg_connect(getenv("DATABASE_URL"))) {
                        $db_result = pg_query($conn, "SELECT * FROM public.mensagens");
                        $result = [];
                        while ($row = pg_fetch_row($db_result)) {
                            $result += $row;
                            array_push($result, $row);
                        }
                        print_r(json_encode($result));
                    }
                } else {
                    if ($conn = pg_connect("host=localhost port=5432 dbname=public user=postgres password=1234")) {
                        $db_result = pg_query($conn, "SELECT * FROM public.mensagens");
                        $result = [];
                        while ($row = pg_fetch_row($db_result)) {
                            $result += $row;
                            array_push($result, $row);
                        }
                        print_r(json_encode($result));
                    }
                }
            }
        default:
            # code...
            break;
    }
    

?>

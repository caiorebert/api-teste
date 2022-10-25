<?php 
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

?>

<?php
    require_once "./func.php";
    $cn = connect_db();
    $list_num = count_player($cn);
    if(isset($_GET['displayed_results'])){
        $count = $_GET['displayed_results'];
    }else{
        $count = 5;
    }
    $page_list = page_list(count_player($cn),$count);
    if(isset($_GET['nowpage'])){
        $nowpage = $_GET['nowpage'];
    }else{
        $nowpage = 1;
    }
    $player = show_player($cn,$nowpage,$count);

    $forward_page = forward_page($nowpage,$count);
    $next_page = next_page($nowpage,$page_list,$count);
    $page_link = page_tag($nowpage,$page_list,$count);
    
    close_db($cn);
    require_once "./tpl/index.php";
?>
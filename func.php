<?php
//データベース接続
    function connect_db(){
        $cn = mysqli_connect('localhost','root','','wp41');
        mysqli_set_charset($cn,'utf8');
        return $cn;
    }
//データベースクローズ
    function close_db($cn){
        mysqli_close($cn);
    }
//データベース接続し、現在のページ数の中身を返す(データベース接続,現在ページ数,表示件数)
    function show_player($cn,$pg,$count){
        $start = ($pg-1)*$count;
        $row = array();
        $result = mysqli_query($cn,"SELECT * FROM player WHERE del_flg=0 LIMIT $start,$count;");
        while($con = mysqli_fetch_assoc($result)){
            $row[] = $con;
        }
        return $row;
    }
//データベース内の件数を返す
    function count_player($cn){
        $row = array();
        $result = mysqli_query($cn,"SELECT * FROM player WHERE del_flg=0;");
        while($con = mysqli_fetch_assoc($result)){
            $row[] = $con;
        }
        return count($row);
    }
//前のページの部品を返す(今のページ数,表示件数)
    function forward_page($pg,$count){
        $pg = $pg-1;
        if($pg===0){
            $fw = '<span>前へ</span>';
        }else{
            $fw = '<a href="./index.php?nowpage='.$pg.'&displayed_results='.$count.'">前へ</a>';
        }
        return $fw;
    }
//次のページの部品を返す(今のページ数,最大ページ数,表示件数)
    function next_page($pg,$max,$count){
        $pg = $pg+1;
        if($pg>=$max){
            $nx = '<span>次へ</span>';
        }else{
            $nx = '<a href="./index.php?nowpage='.$pg.'&displayed_results='.$count.'">次へ</a>';
        }
        return $nx;
    }
//最大ページ数を返す(最大件数,表示件数)
    function page_list($list,$count){
        $count_page = $list / $count;
        if(($list % $count)>=1){
            $count_page +=1;
        }
        return $count_page;
    }
//ページリンク部品を返す(現在ページ数,最大ページ数,表示件数)
    function page_tag($nowpage,$max_page,$count){
        $page_tag = array();
        for($i = 1; $i <= $max_page; $i++){
            if ($i == $nowpage) {
                $page_tag[] = '<span>'.$i.'</span>'; 
            } else {
                $page_tag[] = '<a href="./index.php?nowpage='.$i.'&displayed_results='.$count.'">'.$i.'</a>';
            }
        }
        return $page_tag;
    }

?>
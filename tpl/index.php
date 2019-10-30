<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="utf-8">
	<title>ページャー</title>
    <!-- BootstrapのCSS読み込み -->
    <link href="./../../css/bootstrap.min.css" rel="stylesheet">
    <link href="./../../css/style.css" rel="stylesheet">
    <!-- jQuery読み込み -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- BootstrapのJS読み込み -->
    <script src="./../../js/bootstrap.min.js"></script>
    
</head>
<body>
    <form action="./index.php" method="GET" enctype="multipart/form-data">
    表示件数<select name="displayed_results">
        <option value=<?php echo $count?>><?php echo $count?>件</option>
        <option value=5>5件</option>
        <option value=10>10件</option>
        <option value=30>30件</option>
        <option value=50>50件</option>
        <option value=100>100件</option>
    </select>
    <input type="submit" value="表示">
    </form>
    <table>
        <tr><td>名前</td></tr>
        <?php foreach ($player as $data){ ?>
            <tr><td><?php echo $data['name'] ?></td></tr>
        <?php } ?>
    </table>

    <?php 
    echo $forward_page;
    foreach ($page_link as $data) {
        echo $data;
    }
    echo $next_page;?>
</body>
</html>
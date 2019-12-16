<?php
	$mysql = mysqli_connect("localhost", "root", "2wngJ4FYbS", "users");
	 if (!$mysql) {
    echo 'Не могу соединиться с БД. Код ошибки: ' . mysqli_connect_errno() . ', ошибка: ' . mysqli_connect_error();
    exit;
  }
	mysql_query('SET NAMES utf8');
	$sql = mysqli_query($mysql, "SELECT * FROM `imag` WHERE `id`=8");
	//while ($result = mysqli_fetch_array($sql)) {
    //echo "{$result}<br>";
	//}
	if($sql)
{	
	$user = mysqli_fetch_assoc($sql);
	echo $user['name'],'<br>';
	echo $user['type'],'<br>';
	echo $user['deser'],'<br>';
	echo $user['data'],'<br>';
	//echo $user['ing_min'],'<br>';
	echo "<img src=\"data:image/jpg;base64,".base64_encode($user['img_min'])."\" /><br>";
	echo "<img style ='max-width: 500px' src=\"data:image/jpg;base64,".base64_encode($user['img_max'])."\" />";
	
    //$rows = mysqli_num_rows($sql); // количество полученных строк
    //for ($i = 0 ; $i < $rows ; ++$i)
    //{
        //$row = mysqli_fetch_row($sql);
            //for ($j = 0 ; $j < 3 ; ++$j) echo "$row[$j]<br>";
    //}
     
    // очищаем результат
	//sould - root ac2209c4ee1994efe20db39f6342c45d polina - user; Maria@myp56
	$r= md5(block."vvuhub789"); 
	echo $r;

    mysqli_free_result($sql);
}
	mysqli_close($mysql);
?>

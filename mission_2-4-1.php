
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UFT-8">
<title>縄文遺跡巡りブログ</title>
</head>
<body>
<h1>縄文遺跡巡りブログ</h1>
<form action="mission_2-4-1.php"method="get">
名前<br/>
<input type="text" name="name"><br/>
コメント<br/>
<input type="text" name="comments"><br/>
<input type="submit" value="送信"/><br/>
削除対象番号
<input type="text" name="deleteNo"> 
<input type="submit" name="delete" value="削除"> 
</form>
</body>
</html>



<?php
$filename='kadai4.text';
//filenameをkadai3とする;


$line='hoge';

$count=count(file($filename));
//行数カウントし、$countに代入;

$time=date('Y/m/j g:i:s');
-
$fp=fopen($filename,'a');
// fpはcomment.textを開いて書き込む（a=追記モード）;

fwrite($fp,$count);
//代入したcountを書き込み;

fwrite($fp,"<>");
//<>を書き込み;

fwrite($fp,$_GET['name']);
//追記モードで開いたkadai3.textに取得したコメントを書き込み 改行して;

if(isset($_GET['name'])){
//取得したnameとcomment(name)に書き込みがあれば正、なければ偽とする;
$comment1=$_GET['name'];
//commentは取得したコメント;

echo $comment1;
//nameはcomment1;
}

fwrite($fp,"<>");
//<>書き込み;

fwrite($fp,$_GET['comments']);
//追記モードで開いたkadai3.textに取得したコメントを書き込み 改行して;

if(isset($_GET['comments'])){
//取得したnameとcomment(comments)に書き込みがあれば正、なければ偽とする;
$comment2=$_GET['comments'];
//commentは取得したコメント;

echo $comment2;
//commentsはcomment2;
}

fwrite($fp,"<>");
//<>書き込み;

fwrite($fp,date('Y/m/j g:i:s')."\n");


$ret_array=file($filename);

for($i=0;$i<count($ret_array);++$i){echo($ret_array[$i]."<br/>\n");}
//配列を読み込みブラウザに表示;

$a="$count"."<>"."$comment1"."<>"."$comment2"."<>"."$time";

$aa=explode("<>",$a);
echo '<p>',$aa[0],'</p>';
echo '<p>',$aa[1],'</p>';
echo '<p>',$aa[2],'</p>';
echo '<p>',$aa[3],'</p>';
//フォーム入力内容を分割して表示;

$del=$_GET['deleteNo'];

//$del=fwrite($fp,$_GET['deleteNo']);
//kadai4開いて書き込みdeleteNoの内容を;

$filedata=file('./kadai4.text');
//１行ずつの配列にする;

$fp=fopen('./kadai4.text','w+');
//内容を消して開く;

$c="1";

foreach($filedata as $line){
//配列から一つずつ取り出す（１行ずつの配列を$lineに取り出す）;

 $data=explode('<>',$line);
 //$dataは＜＞で配列から取り出した１行ずつの配列を分割;

 if($data[0]!=$del){
 //$del(deleteNo)に書き込まれた値と違うならば［］内を処理;

   fputs($fp,++$line);
   //kadai4.textに一行ずつの配列を追記;
   }
 }

/*
var_dump($count);
$new_hash=array_merge($count);
var_dump($new_hash);
*/






fclose($fp);

/*
$hairetsu=file($filename);
foreach($hairetsu as $hensuu){
 echo $splits[1].".".splits[2].".".splits[3]."<br>";
 echo $splits[0]."<hr>";
}









*/
/*
//----------------確認------------------------;
$del=$i;
echo "check1|" . $del . "|<hr>";
//確認;

$filedata=$i;
echo "check2|" . $filedata . "|<hr>";
//確認;

$fp=$i;
echo "check3|" . $fp . "|<hr>";

$data=$i;
echo "check4|" . $data . "|<hr>";

echo "<hr>loop0|";
var_dump($line);
echo "<hr>";
for($i=0;$i<count($line);$i++){
echo "loop1".$i."|";
echo $line[$i]."<hr>";
}
echo "loopend".$i."|<hr>";

echo "check5|".$data."l<hr>";
echo "check6|".$data[0]."|<hr>";
echo "check7|".$line."|<hr>";*/

//echo "check_if1|" . $data[0] . "|" . $del ."|<hr>" ;

?>

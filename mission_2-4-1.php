
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UFT-8">
<title>�ꕶ��Տ���u���O</title>
</head>
<body>
<h1>�ꕶ��Տ���u���O</h1>
<form action="mission_2-4-1.php"method="get">
���O<br/>
<input type="text" name="name"><br/>
�R�����g<br/>
<input type="text" name="comments"><br/>
<input type="submit" value="���M"/><br/>
�폜�Ώ۔ԍ�
<input type="text" name="deleteNo"> 
<input type="submit" name="delete" value="�폜"> 
</form>
</body>
</html>



<?php
$filename='kadai4.text';
//filename��kadai3�Ƃ���;


$line='hoge';

$count=count(file($filename));
//�s���J�E���g���A$count�ɑ��;

$time=date('Y/m/j g:i:s');
-
$fp=fopen($filename,'a');
// fp��comment.text���J���ď������ށia=�ǋL���[�h�j;

fwrite($fp,$count);
//�������count����������;

fwrite($fp,"<>");
//<>����������;

fwrite($fp,$_GET['name']);
//�ǋL���[�h�ŊJ����kadai3.text�Ɏ擾�����R�����g���������� ���s����;

if(isset($_GET['name'])){
//�擾����name��comment(name)�ɏ������݂�����ΐ��A�Ȃ���΋U�Ƃ���;
$comment1=$_GET['name'];
//comment�͎擾�����R�����g;

echo $comment1;
//name��comment1;
}

fwrite($fp,"<>");
//<>��������;

fwrite($fp,$_GET['comments']);
//�ǋL���[�h�ŊJ����kadai3.text�Ɏ擾�����R�����g���������� ���s����;

if(isset($_GET['comments'])){
//�擾����name��comment(comments)�ɏ������݂�����ΐ��A�Ȃ���΋U�Ƃ���;
$comment2=$_GET['comments'];
//comment�͎擾�����R�����g;

echo $comment2;
//comments��comment2;
}

fwrite($fp,"<>");
//<>��������;

fwrite($fp,date('Y/m/j g:i:s')."\n");


$ret_array=file($filename);

for($i=0;$i<count($ret_array);++$i){echo($ret_array[$i]."<br/>\n");}
//�z���ǂݍ��݃u���E�U�ɕ\��;

$a="$count"."<>"."$comment1"."<>"."$comment2"."<>"."$time";

$aa=explode("<>",$a);
echo '<p>',$aa[0],'</p>';
echo '<p>',$aa[1],'</p>';
echo '<p>',$aa[2],'</p>';
echo '<p>',$aa[3],'</p>';
//�t�H�[�����͓��e�𕪊����ĕ\��;

$del=$_GET['deleteNo'];

//$del=fwrite($fp,$_GET['deleteNo']);
//kadai4�J���ď�������deleteNo�̓��e��;

$filedata=file('./kadai4.text');
//�P�s���̔z��ɂ���;

$fp=fopen('./kadai4.text','w+');
//���e�������ĊJ��;

$c="1";

foreach($filedata as $line){
//�z�񂩂������o���i�P�s���̔z���$line�Ɏ��o���j;

 $data=explode('<>',$line);
 //$data�́����Ŕz�񂩂���o�����P�s���̔z��𕪊�;

 if($data[0]!=$del){
 //$del(deleteNo)�ɏ������܂ꂽ�l�ƈႤ�Ȃ�΁m�n��������;

   fputs($fp,++$line);
   //kadai4.text�Ɉ�s���̔z���ǋL;
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
//----------------�m�F------------------------;
$del=$i;
echo "check1|" . $del . "|<hr>";
//�m�F;

$filedata=$i;
echo "check2|" . $filedata . "|<hr>";
//�m�F;

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

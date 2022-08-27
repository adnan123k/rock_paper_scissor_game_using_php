<?php
$f=false;
if(isset($_POST['logout'])){
    header("Location: index.php");
    return;
}
$list=array("Rock","Paper","Scissor");
$human = isset($_POST["choose"]) ? $_POST['choose']+0 : -1;
if($human==-1)
$f="Please select a strategy and press Play.";
elseif($human<3){
    $computer=rand(0,2);
$result=check($human,$computer);
$f="Your Play=".$list[$human]."  Computer Play=".$list[$computer]."  Result=".$result;
}
if(!isset($_GET['who'])|| strlen($_GET['who'])<1)
die( "Name parameter missing");
function check($a,$b){
    if($a==0&&$b==2)
    $r="You Win";
    elseif($a==0&&$b==0)
    $r="Tie";
    elseif($a==0&&$b==1)
    $r="You Lose";
    elseif($a==1&&$b==0)
    $r="You Win";
    elseif($a==1&&$b==1)
    $r="Tie";
    elseif($a==1&&$b==2)
    $r="You Lose";
    elseif($a==2&&$b==0)
    $r="You Lose";
    elseif($a==2&&$b==1)
    $r="You Win";
    elseif($a==2&&$b==2)
    $r="Tie";
    return $r;
}
?>
<!DOCtype html>
<html><head><title>MHD ADNAN AL KHARFAN Game</title><meta charset="UTF-8"></head>
<body>
<h1>Rock Paper Scissors</h1><?php
if ( isset($_REQUEST['who']) ) {
    echo "<p>Welcome: ";
    echo htmlentities($_REQUEST['who']);
    echo "</p>\n";
}?>
<form  method="post">
<select name="choose"><option value="-1">Select</option><option value="0"> Rock</option><option value="1"> Paper</option><option value="2"> Scissor</option> <option value="3"> Test</option></select>
<input type="submit"  name="Play" value="play">
<input type="submit" name="logout" value="Logout"><br>
<pre style="display: block;
    padding: 9.5px;
    margin: 0 0 10px;
    font-size: 13px;
    line-height: 1.42857143;
    color: #333;
    word-break: break-all;
    word-wrap: break-word;
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    border-radius: 4px;">
<?php
if($f!==false){
echo $f;}
if($human==3){

    $list=array("Rock","Paper","Scissor");
for ($i=0; $i < 3; $i++) { 
for ($j=0; $j < 3; $j++) { 
    $result=check($i,$j);
    echo "Your Play=".$list[$i]."  Computer Play=".$list[$j]."  Result=".$result."\n";
}}}?>
</pre>
</form>
</body></html>
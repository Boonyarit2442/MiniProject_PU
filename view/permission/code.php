<?php   
if($_POST['_method']==='ADD')
{

$num=$_POST['Permiss'];

foreach($num as $item)
{

echo $item."<br>";
}

}
?>
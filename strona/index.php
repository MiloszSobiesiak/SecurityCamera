<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Przegląd nagrań</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$var=0;
$id = $_GET['var']??'0';
$files = glob('*.mp4');
$fname = $files[0];
$ftext = ucwords(str_replace('_', ' ', basename($files[$id], '.mp4')));
$deletefile=$files[$id];

    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['delete']))
    {
        func($deletefile);
    }
    function func($deletefile)
    {
        unlink($deletefile);   
        echo "<meta http-equiv='refresh' content='0'>";
    }
?>

<div class="main">

<div class="video">
<span class="title">Nagranie z : '<b><?php echo $ftext; ?></b>'</span>
<form name ="button" action="" method="post">
<input type="submit" name="delete" class="button" value="Usuń"/>
</form>
<video width="640" height="480" poster="camera.jpg" controls class="p">
    <source src="<?php echo $files[$id]; ?>"/>
</video>
</div>

<div class="list">
<ul id="playlist" class="box">
<?php
$i = 0; 
$ii=1;
foreach ($files as $file) {
    $vid = ucwords(str_replace('_', ' ', basename($file, '.mp4'))); 
    echo "<li><a href='index.php?var=$i' data-video-src='$file'><b>$vid</b> <span>[$ii / ".count($files)."]</span></a>
    </li>\n";
    $i++;
    $ii++;
    }
?>
</ul>
</div>

</div>

</body> 

<marquee scrolldelay="120" direction="left" style="position:absolute; width:100%; height:40px;">
<?php
$rows=$News->all(['sh'=>1]);
foreach($rows as $row){
    echo $row['text'],"&nbsp;","&nbsp;","&nbsp;","&nbsp;","&nbsp;";
}
?>
	</marquee>
<?php
$i=1;
while ( $i <= 25){
$abc[$i] = $_GET["Club$i"];
if($abc[$i]==NULL){break;}
$i=$i+1;
}

$numbernumber=$i;
$current=strftime('%d');
$xyz = $_GET["Date"];





$sortby = $_SERVER['QUERY_STRING'];

$set = '';
if ($sortby == '') {
	$header = 'First Name';
	$sortby = 'firstname';
	$set = 'y';
}
if ($sortby == 'surname') {
	$header = 'Surname';
	$set = 'y';
}
if ($sortby == 'city') {
	$header = 'City';
	$set = 'y';
}
if ($sortby == 'points') {
	$header = 'Points';
	$set = 'y';
}
if ($sortby == 'car') {
	$header = 'Car';
	$set = 'y';
}
if ($sortby == 'colour') {
	$header = 'Colour';
	$set = 'y';
}
if ($sortby == 'age') {
	$header = 'Age';
	$set = 'y';
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Time Tracker</title>
<!--CSS file (default YUI Sam Skin) -->
<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.9.0/build/calendar/assets/skins/sam/calendar.css">
<script src="http://yui.yahooapis.com/2.9.0/build/yahoo-dom-event/yahoo-dom-event.js"></script>
 
<!-- Source file -->
<script src="http://yui.yahooapis.com/2.9.0/build/calendar/calendar-min.js"></script>
 
 
<!-- OPTIONAL: Animation (only required if using ContainerEffect) -->
<script src="http://yui.yahooapis.com/2.9.0/build/animation/animation-min.js"></script>
 
<!-- OPTIONAL: Drag & Drop (only required if enabling Drag & Drop) -->
<script src="http://yui.yahooapis.com/2.9.0/build/dragdrop/dragdrop-min.js"></script>
 
<!-- Source file -->
<script src="http://yui.yahooapis.com/2.9.0/build/container/container-min.js"></script>
 
</head>

<body class="yui-skin-sam" >

<div id="container">
		<div id="header">
        	<h1>Make My Day @ <span class="off">IITK</span></h1>
            <h2>HackU project</h2>
        </div>   
        
        
        <div id="menu">
        	<ul>
            	<li class="home"><a href="index.php">Home</a></li>
                <li class="About"><a href="about.html">About</a></li>
                <li><a href="http://davyhones.comuv.com/userform.html">Create Event</a></li>
                <li class="services"><a href="services.html">Services</a></li>
                <li class="future"><a href="design.html">Design</a></li>
              <li class="contact"><a href="contact.html">Contact</a></li>
            </ul>
            <h4>GETTING STARTED</h4>
            <h4> SELECT CLUBS to follow--> Cllick DATE :)</h4>
</div>
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

				<div id="leftmenu_main">    
                
                <h3>FOLLOW CLUBS</h3>
                        
                <ul>
                  <li> <input type ="checkbox" id="0" name="SHOW ALL" onclick="event.cancelBubble=true;" />  Show all </li>
                    <li><input type="checkbox" id="1" name="PROGRAMMING" onclick="event.cancelBubble=true;"   />  P Club</li>
                    <li><input type="checkbox" id="2" name="ELECTRONICS" onclick="event.cancelBubble=true;" />  E Club</li>
                    <li><input type="checkbox" id="3" name="DANCE" onclick="event.cancelBubble=true;"  />  Dance Club</li>
                    <li><input type="checkbox" id="4" name="ROBOTICS" onclick="event.cancelBubble=true;"  />  Robotics Club</li>
                    <li><input type="checkbox" id="5" name="AEROMODELLING" onclick="event.cancelBubble=true;" />  Aeromodelling Club</li>
                    <li><input type="checkbox" id="6" name="BUSINESS" onclick="event.cancelBubble=true;" />  Business Club</li>
                     <li><input type="checkbox" id="7" name="MUSIC" onclick="event.cancelBubble=true;" />  Music Club</li>
                      <li><input type="checkbox" id="8" name="DRAMA" onclick="event.cancelBubble=true;" />  Dram Club</li>
                       <li><input type="checkbox" id="9" name="HLS" onclick="event.cancelBubble=true;" />  HLS</li>
                       <li><input type="checkbox" id="10" name="ELS" onclick="event.cancelBubble=true;" />  ELS</li>
                        <li><input type="checkbox" id="11" name="RUBICS" onclick="event.cancelBubble=true;" />  Rubics Cube Club</li>
                        <li><input type="checkbox" id="12" name="SKATE" onclick="event.cancelBubble=true;" />  Skate Club</li>
                         <li><input type="checkbox" id="13" name="ADVENTURE" onclick="event.cancelBubble=true;" />  Adventure Club</li>
                          <li><input type="checkbox" id="14" name="PHOTOGRAPHY" onclick="event.cancelBubble=true;" />  Photography Club</li>
                           <li><input type="checkbox" id="15" name="BOOK" onclick="event.cancelBubble=true;" /> Book Club</li>
                        
                 </ul>
</div>
                
                
              <div id="leftmenu_bottom"></div>
        </div>
        
        
        
        
		<div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
        	<?php
echo '<h1>              CURRENT  HAPPENINGS</h1>

 <h1><p></p></h1>


<table summary="List of demo fields">
<tr>
<th><a href=>CLUBS</a></th>
<th><a href=>DESCRIPTION</a></th>
<th><a href=>VENUE</a></th>
<th><a href=>TIME</a></th>
<th><a href=>DATE</a></th>
';


$fp = fopen("$current.txt",'r');
if (!$fp) {echo 'ERROR: Unable to open file.</table></body></html>'; exit;}

$row = 0;

while (!feof($fp)) {
	$row++;
	$line = fgets($fp,1024); //use 2048 if very long lines
	$field[$row] = explode('|', $line);
	if ($sortby == 'club') {$sortkey = strtolower($field[$row][0]);} //club
	if ($sortby == 'decrp') {$sortkey = strtolower($field[$row][1]);} //decrp
	if ($sortby == 'venue') {$sortkey = strtolower($field[$row][2]);} //venue
	if ($sortby == 'time') {$sortkey = $field[$row][3];} //time
	if ($sortby == 'date') {$sortkey = strtolower($field[$row][4]);} //date
	array_unshift($field[$row], $sortkey); //add sortkey to start of array
}

fclose($fp);

sort($field);
reset($field);

$arrays = count($field) - 1;

$i=1;
while ($i <= $numbernumber)
{
$loop = 0;
while ($loop < $arrays) {
	

	if($field[$loop][1]==$abc[$i])
{	echo '
<tr>
<td>'.$field[$loop][1].'</td>
<td>'.$field[$loop][2].'</td>
<td>'.$field[$loop][3].'</td>
<td>'.$field[$loop][4].'</td>
<td>'.$field[$loop][5].'</td>
</tr>';
}
$loop++;
}
$i=$i+1;
}
echo '
</table>

<p><small>25 AUGUST 2012 &middot; Last updated: '.date('j F Y', getlastmod()); ?> &middot; A <a href="http://www.FACEBOOK.COM"> PAGE</a> production &middot; <a href="http://www.twitter.com">All rights reserved</a> &middot; <a href="http://www.link.com">Copy cats will rot in hell</a></small></p>
       </div>
        <div id="content_bottom"></div>
            

             <div id="footer"><h3>&nbsp;Copyright Make your Day pvt ltd. All rights reserved</h3></div>
      </div>
      <div id="rtside">
      <div id="callContainer"></div></div>
      
      
 	</div> <!-- /#contents -<!--Use YUI Loader to bring in your other dependencies: --> 
   
    <div id="myPanel"></div>

<script>

var url="date";
var club=new Array(50);
var cnt=0;
//alert(club);
//alert(club);
</script>


<script>

var check=new Array(16);
var i=0;
for(i=1;i<16;i++)
{
	check[i]=0;
}
var dfg=0;
</script>



<script>

function mySelectHandler(type,args,obj)
{
	debugger;
//	alert("selected");	
if(dfg!=0){	for(i=1;i<16;i++)
{
	check[i]=0;
}} 

dfg=1;
		var i=0;
		if(document.getElementById(0).checked) for (i=1;i<=15;i++) check[i]=1;
		else {for(i=1;i<=15;i++)
		{
			if(document.getElementById(i).checked) 						
			{check[i]=1;
			}
		}
		}
		//alert(check[1]);
		club="";
		var j=1,c=0;
		for(i=1;i<=15;i++)
		{
			if(check[i]==1){
				if(c!=0) club=club+'&'
				club=club+'Club'+j+'='+document.getElementById(i).name;		//? XXXXXXXXXXXXXXX
				j++;
				c=1;
			}
		}
		//alert(club);
	//date=new String(args[0][0][2])+'-'+String(args[0][0][1])+'-'+String(args[0][0][0]);
date=new String(args[0][0][2]);
	
//alert(date);
//	alert("davyhones.comuv.com/new1.html?");
	//alert(encodeURIComponent(club));
	//alert(encodeURIComponent(date));
	var i;
	//var clb="Robotics";
	//var clb2="Programming";
	
	
myPanel = new YAHOO.widget.Panel("myPanel", {  visible:true, draggable:false, close:false } );
//If we haven't built our panel using existing markup,
//we can set its content via script:

myPanel.setHeader("Events of the day");

//myPanel.setBody("<iframe width=800px height=750px frameborder=1 src='http://davyhones.comuv.com/new1.html?"+encodeURIComponent(club)+"&Date=" + encodeURIComponent(date) + "'><p>browser does not support iframes</p></iframe>");
 myPanel.setBody("<iframe width=700px height=750px background=white frameborder=1 src='http://davyhones.comuv.com/new1.html?"+club+"&Date=" + encodeURIComponent(date) + "'><p>browser does not support iframes</p></iframe>");
 myPanel.setFooter("<span></span>"); 
//Although we configured many properties in the
//constructor, we can configure more properties or
//change existing ones after our Panel has been
//instantiated:
 
myPanel.cfg.setProperty("underlay","matte");
myPanel.render();
}
var cal1 = new YAHOO.widget.Calendar("callContainer");
cal1.selectEvent.subscribe(mySelectHandler,cal1, true); 
cal1.render();
 
</script>

</body>
</html>

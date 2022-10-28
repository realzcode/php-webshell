## PHP Webshell
 
- Better [view-source:http://domain.com/webshell.php]
- Login  [?m=x&p={password}]
- Uri    [?m=r&x={command}]
- Chdir  {cd dir}
- Terminal Modes :
0. [m=r] backtick
1. [m=e] system
2. [m=a] exec
3. [m=l] shell_exec
4. [m=z] passthru
5. [m=c] proc_open
6. [m=o] popen
7. [m=d] phpinfo


## POC

![Webshell](https://raw.githubusercontent.com/realzcode/webshell/main/webshell.png "Webshell")

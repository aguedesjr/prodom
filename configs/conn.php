<?php
# Arquivo de conexao com o banco de dados
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_conn = "localhost";
#$hostname_conn = "localhost:3306:/var/run/mysql/mysql.sock";
$database_conn = "prodom";
$username_conn = "prodom";
$password_conn = "20Pr0doM10";
$conn = mysql_pconnect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 

mysql_select_db($database_conn);
?>

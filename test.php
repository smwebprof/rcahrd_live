<?php

$hostname = '{imap.gmail.com:993/imap/ssl/novalidate-cert}INBOX'; 
		$username = 'agrimindocs@gmail.com'; $password = 'agrimin#4321'; 
		$inbox = imap_open($hostname,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
		print_r(imap_errors());

?>

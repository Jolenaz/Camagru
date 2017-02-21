<?php

function check_pass($pass)
{
	if (strpbrk($pass, "0123456789") == null)
		return (false);
	if (strpbrk($pass, "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ") == null)
		return (false);
	if (strlen($pass) < 8)
		return (false);
	return (true);
}

?>
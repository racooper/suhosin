--TEST--
Testing: suhosin.mail.protect=1 with NL in Subject
--SKIPIF--
<?php include "../skipifnotcli.inc"; ?>
--INI--
suhosin.log.sapi=255
suhosin.log.stdout=0
suhosin.log.script=0
suhosin.log.syslog=0
suhosin.mail.protect=1
sendmail_path=/usr/bin/true
--FILE--
<?php
	var_dump(mail("to", "sub\nject", "msg"));
?>
--EXPECTF--
ALERT - mail() - newline in Subject header, possible injection, mail dropped (attacker 'REMOTE_ADDR not set', file '%s', line 2)
bool(false)
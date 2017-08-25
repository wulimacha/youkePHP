<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['userid']);
exit ("<script type='text/javascript'>alert('退出成功！');history.go(-1);</script>");
?>
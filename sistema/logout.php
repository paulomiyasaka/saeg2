﻿<?php
session_start();
session_destroy();

?>

<script>
	
	localStorage.clear();
	window.location.href='../index.php';
</script>
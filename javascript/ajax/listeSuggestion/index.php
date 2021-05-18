<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Requ&ecirc;te simple sur AJAX</title>

<script type="text/javascript" src="listeSuggest2.js">
<!-- function makeRequest(url); -->
</script>

</head>

<body>
<form action="listeSuggest.php" method="post" name="form1">
<input name="expression" type="text" onKeyUp="requeteAsynchrone(this.value)">
</form>

<div id="reponse"></div>

</body>
</html>

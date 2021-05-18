<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Requ&ecirc;te AJAX</title>
</head>

<body>
<h1>Un param&egrave;tre est envoy&eacute; dans un message asynchrone </h1>
<form name="form1">

<script type="text/javascript" src="ajaxLanguePost.js"></script>

  <p>
    Fran&ccedil;ais
    <input type="radio" name="langue" value="francais" onChange="changerLangue(this.value)"> 
    Anglais
    <input type="radio" name="langue" value="anglais" onChange="changerLangue(this.value)">
  </p>
  <p>
    <select name="jours" id="jours" onChange="alert(this.value);">
      <option value="0">--------</option>
    </select>
  </p>
</form>
<p>&nbsp;</p>
</body>
</html>

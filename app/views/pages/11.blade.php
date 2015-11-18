<!DOCTYPE html>
<html>
<body>

<h3>Your Screen: </h3>

<div id="demo"></div>

<script>
    var txt = "";
    txt += "<p>Total width: " + screen.width + "</p>";

    document.getElementById("demo").innerHTML = txt;
</script>

</body>
</html>
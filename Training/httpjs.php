<!DOCTYPE html>
<html>
<body>

<h2>Using the XMLHttpRequest </h2>
<p>click the button to request the server</p>
<div id="demo">
<button type="button" onclick="loadXMLDoc()">Request</button>
</div>

<script>
function loadXMLDoc() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  xhttp.open("GET", "sample.php", true);
  xhttp.send();
}
</script>

</body>
</html>


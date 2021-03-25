<!DOCTYPE html>
<html>
<body>

<h2>JavaScript prototype inheritance</h2>

<p id="demo"></p>

<script>
let animal = {
  eats: true,
  walk() {
    alert("Animal walk");
  }
};

let rabbit = {
  jumps: true,
  __proto__: animal
};

let longEar = {
  earLength: 10,
  __proto__: rabbit
};


longEar.walk(); 
alert(longEar.jumps); 
document.getElementById("demo").innerHTML = longEar.jumps;
</script>

</body>
</html>


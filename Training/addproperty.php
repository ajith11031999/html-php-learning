<!DOCTYPE html>
<html>
<body>

<h2>JavaScript Objects</h2>

<p id="demo"></p>

<script>
function Person(first, last, age, eye) {
  this.firstName = first;
  this.lastName = last;
  this.age = age;
  this.eyeColor = eye;
}

Person.prototype.nation = "India";

var object1 = new Person("Ajith", "xavier", 22, "brown");
document.getElementById("demo").innerHTML = "My name is " + object1.firstName +". "+ "I am from  " + object1.nation; 
</script>

</body>
</html

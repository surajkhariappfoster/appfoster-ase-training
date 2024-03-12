document.getElementById("splitButton").addEventListener("click", function (event) {
  event.preventDefault(); // Prevent the default form submission behavior

  var number = parseInt(document.getElementById("numberInput").value);
  var splits = parseInt(document.getElementById("splitInput").value);

  if (isNaN(number) || isNaN(splits)) {
    alert("Please enter valid numbers.");
    return;
  }

  var splitAmount = Math.floor(number / splits);
  var remainder = number % splits;

  var container = document.getElementById("container");
  container.innerHTML = '';

  for (var i = 0; i < splits; i++) {
    var widthPercentage = (splitAmount + (i < remainder ? 1 : 0)) * 130; // for demonstration purpose, each unit is 10px
    var color = '#' + Math.floor(Math.random() * 16777215).toString(16); // generate a random color
    var div = document.createElement("div");
    div.classList.add("number-div");
    div.style.backgroundColor = color;
    div.style.width = widthPercentage + 'px';
    div.textContent = splitAmount + (i < remainder ? 1 : 0);
    container.appendChild(div);
  }
});

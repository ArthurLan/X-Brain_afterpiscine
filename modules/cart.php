<div class="dropdown">
<button onclick="myFunction()" class="dropbtn">Dropdown</button>
  <div id="myDropdown" class="dropdown-content">
  	<?php
		for ($i = 0; $i < Count($_SESSION['cart']); $i++) {
			echo "<p>";
			echo $_SESSION['cart'][$i][0];
			echo " - ";
			echo $_SESSION['cart'][$i][1];
			echo "</p>";
		}
		// foreach ($_SESSION['cart'] as $article) {
		// 	echo "<p>";
		// 	echo $article['item_title'];
		// 	echo $article['item_price'];
		// 	echo "</p>";
		// }
	?>
  </div>
</div>

<script>
/* When the user clicks on the button,
 * toggle between hiding and showing the dropdown content */
function myFunction() {
	document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
	if (!event.target.matches('.dropbtn')) {

		var dropdowns = document.getElementsByClassName("dropdown-content");
		var i;
		for (i = 0; i < dropdowns.length; i++) {
			var openDropdown = dropdowns[i];
			if (openDropdown.classList.contains('show')) {
				openDropdown.classList.remove('show');
			}
		}
	}
}
</script>

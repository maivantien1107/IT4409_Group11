/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var checkbox = document.querySelectorAll(".checkbox");
var checkbox_all=document.querySelectorAll(".checkboxAll");
console.log(checkbox_all);
var i;

 for (i = 0; i < checkbox.length; i++) {
    checkbox[i].addEventListener("change", function() {
        this.classList.toggle("selected");
        // var dropdownContent = this.nextElementSibling;
        // if (dropdownContent.style.display === "block") {
        //     dropdownContent.style.display = "none";
        // } else {
        //     dropdownContent.style.display = "block";
        // }
    });

  }
function cart_change() {
    alert('add 1 product to cart');
}

function openNav() {
  document.getElementsByClassName("sidenav")[0].style.display = "inline";
}

function closeNav() {
  document.getElementsByClassName("sidenav")[0].style.display = "none";

}
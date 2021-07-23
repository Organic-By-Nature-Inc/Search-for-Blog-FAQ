<?php

function faq_search() {

?>


<!-- Search field -->
<input type="text" id="inputfaq"></input>
<button type="submit" onclick="getInputValue()">Search</button>

<script>
      function getInputValue() {
        // Selecting the input element and get its value 
        var inputVal = document.getElementById("inputfaq").value;

        //if input string matches to page contents
        if ((document.documentElement.textContent || document.documentElement.innerText).indexOf(inputVal) > -1) {
            alert("Found the string!");
        } else {
            alert("No string");
        }

        }
</script>



<?php
}
add_shortcode('faqsearch', 'faq_search');
?>




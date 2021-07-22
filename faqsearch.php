<?php

function faq_search() {

?>


<!-- Search field -->
<input type="text" id="inputfaq" onkeyup="searchFunction()"></input>
<button type="submit" id="submitfaq" onclick="getInputValue();">Search</button>

<script>
      function getInputValue() {
        // Selecting the input element and get its value 
        let inputVal = document.getElementById("inputfaq").value;
        // Displaying the value
        alert(inputVal);
      }


</script>



<?php
// function faq_search_results(){

    
// }

// add_action('wp_head', 'faq_search_results');





return $form;

}

add_shortcode('faqsearch', 'faq_search');
?>





<!-- 
function FindNext () {
            var str = document.getElementById ("findField").value;
            if (str == "") {
                alert ("Please enter some text to search!");
                return;
            }

            var supported = false;
            var found = false;
            if (window.find) {        // Firefox, Google Chrome, Safari
                supported = true;
                    // if some content is selected, the start position of the search 
                    // will be the end position of the selection
                found = window.find (str);
            }
            else {
                if (document.selection && document.selection.createRange) { // Internet Explorer, Opera before version 10.5
                    var textRange = document.selection.createRange ();
                    if (textRange.findText) {   // Internet Explorer
                        supported = true;
                            // if some content is selected, the start position of the search 
                            // will be the position after the start position of the selection
                        if (textRange.text.length > 0) {
                            textRange.collapse (true);
                            textRange.move ("character", 1);
                        }

                        found = textRange.findText (str);
                        if (found) {
                            textRange.select ();
                        }
                    }
                }
            }

            if (supported) {
                if (!found) {
                    alert ("The following text was not found:\n" + str);
                }
            }
            else {
                alert ("Your browser does not support this example!");
            }
        } -->

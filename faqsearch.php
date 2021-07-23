<?php

function faq_search() {

?>


<!-- Search field -->

<input id="keywords"></input>

<script src="https://dev.blog.puriumcorp.com/wp-content/themes/kelta/hilitor.js"></script>
<script type="text/javascript">

  window.addEventListener("DOMContentLoaded", function(e) {
    var myHilitor2 = new Hilitor("playground");
    myHilitor2.setMatchType("left");
    document.getElementById("keywords").addEventListener("keyup", function(e) {
        myHilitor2.apply(this.value);
        //scroll to the element    
        var element = document.getElementsByTagName("mark")[0];
        window.scroll({top: element.offsetTop, behavior: 'smooth'});
    }, false);
  }, false);

</script>



<?php
}
add_shortcode('faqsearch', 'faq_search');
?>

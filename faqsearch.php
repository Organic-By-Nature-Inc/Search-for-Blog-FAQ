<?php
/**
* Plugin Name: Search for FAQ page
* Description: Custom search for the single post page
* Version: 1.0
**/

add_shortcode('faqsearch', 'faq_search');
function faq_search(){

?>

<!-- Search field -->
<input type="text" id="keywords" placeholder="Search on the page..."></input>
<style>
.sticky-faqsearch {position: fixed; top: 30px; max-width: 800px; box-shadow: 0px 5px 10px #4f4f5d29;}
</style>

<script src="https://dev.blog.puriumcorp.com/wp-content/plugins/faq-search/hilitor.js"></script>
<script type="text/javascript">

//highlight searched keyword
window.addEventListener("DOMContentLoaded", function(e) {
var myHilitor2 = new Hilitor("playground");
myHilitor2.setMatchType("left");
document.getElementById("keywords").addEventListener("keyup", function(e) {
    myHilitor2.apply(this.value);

    //scroll to searched keyword
    var element = document.getElementsByTagName("mark")[0];
    window.scroll({top: element.offsetTop, behavior: 'smooth'});


    //Hide unrelated search results
    var questions = document.getElementsByClassName("faq-question");

    for(x = 0; x < questions.length; x++) {
    if(questions[x].getElementsByTagName('mark').length){
        questions[x].style.display = "block";
    } else {
        questions[x].style.display = "none";
    }
    }

}, false);
}, false);


//search bar sticks to the top on scroll
window.onscroll = function() {seatchStickToTop()};

var faqsearch = document.getElementById("keywords");
var sticky = faqsearch.offsetTop;

function seatchStickToTop() {
if (window.pageYOffset > sticky) {
    faqsearch.classList.add("sticky-faqsearch");
} else {
    faqsearch.classList.remove("sticky-faqsearch");
}
}

</script>

   


<?php
}
?>

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
.sticky-faqsearch {position: sticky; top: 30px; box-shadow: 0px 5px 10px #4f4f5d29;}
</style>

<script src="https://dev.blog.puriumcorp.com/wp-content/plugins/faq-search/hilitor.js"></script>
<script type="text/javascript">

//highlight searched keyword
window.addEventListener("DOMContentLoaded", function(e) {
var myHilitor2 = new Hilitor("playground");
myHilitor2.setMatchType("left");
document.getElementById("keywords").addEventListener("keyup", function(e) {
    myHilitor2.apply(this.value);

    //hide h3 headers when user searches
    var sectionHeader = document.getElementsByTagName('h3');
    var keyword = document.getElementsByTagName("mark");

    if(keyword.length > 0){
        // console.log("h3 headers are hidden");
        for (i = 0; i < sectionHeader.length; i ++) {
            sectionHeader[i].style.display = 'none';
        }
    } else {
        // console.log("h3 headers are visible");
        for (i = 0; i < sectionHeader.length; i ++) {
            sectionHeader[i].style.display = 'block';
        }
    }

    //Hide unrelated search results
    var questions = document.getElementsByClassName("faq-question");

    //if page doesnt contain mark set display to block
    for(x = 0; x < questions.length; x++) {
    if(questions[x].getElementsByTagName('mark').length){
        questions[x].style.display = "block";
        // console.log("input exists" + questions[x].getElementsByTagName('mark').length);
    } else {
        questions[x].style.display = "none";
        // console.log("no matched keywords in this section" + questions[x].getElementsByTagName('mark').length)
    }
    if (document.getElementsByTagName('mark').length == 0) {
        questions[x].style.display = "block";
        // console.log("no input");
    }
}

    //scroll to searched keyword (throws error when search field is empty)
    var element = document.getElementsByTagName("mark")[0];
    if(element){
        window.scroll({top: element.offsetTop, behavior: 'smooth'});
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

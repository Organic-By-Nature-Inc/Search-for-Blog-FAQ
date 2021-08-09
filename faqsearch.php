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
<span id="counter"></span>
<style>
.sticky-faqsearch {position: sticky; top: 30px; box-shadow: 0px 5px 10px #4f4f5d29;}
#counter {position: absolute; right: 0; margin-top: -32px; margin-right: 10px; color: #9ca9a1;}
.sticky-counter {position: sticky !important; top: 40px; float: right;}
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

    for(x = 0; x < questions.length; x++) {
        if(questions[x].getElementsByTagName('mark').length){
            questions[x].style.display = "block";
            // console.log("input exists");
        } else {
            questions[x].style.display = "none";
            // console.log("no matched keywords in this section");
        }
        //if page doesnt contain mark set display to block
        if (document.getElementsByTagName('mark').length == 0) {
            questions[x].style.display = "block";
            // console.log("no input");
        }
    }

    //scroll to searched keyword & keyword counter
    function scrollToKword() {
        
    var elements = document.getElementsByTagName("mark");
    var element = document.getElementsByTagName("mark")[0];

    if (e.key === 'Enter') {
        if (count+1 < elements.length) {
            window.scroll({top: elements[++count].offsetTop, behavior: 'smooth'})
        } else {
            count = 0;
            window.scroll({top: elements[0].offsetTop, behavior: 'smooth'});
        }
        //display keyword count
        number = count+1 + "/" + elements.length; 
        document.getElementById('counter').innerHTML = number; 
    } else {
        count = 0;
        if(element){
            window.scroll({top: element.offsetTop, behavior: 'smooth'});
            document.getElementById('counter').style.display = "block";
        } else {
            document.getElementById('counter').style.display = "none";
        }
        //display keyword count
        number = count+1 + "/" + elements.length; 
        document.getElementById('counter').innerHTML = number; 
    }
    // console.log(count+1 + "/" + elements.length);  
    }

    scrollToKword();

}, false);
}, false);




//search bar sticks to the top on scroll
window.onscroll = function() {seatchStickToTop()};

var faqsearch = document.getElementById("keywords");
var sticky = faqsearch.offsetTop;

function seatchStickToTop() {
if (window.pageYOffset > sticky) {
    faqsearch.classList.add("sticky-faqsearch");
    document.getElementById("counter").classList.add("sticky-counter");
} else {
    faqsearch.classList.remove("sticky-faqsearch");
    document.getElementById("counter").classList.remove("sticky-counter");
}
}

</script>

   


<?php
}
?>

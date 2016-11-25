<!doctype html>
<html lang='zh_TW' prefix='op: http://media.facebook.com/op#'>
<head>
<meta charset='utf-8'>
<meta property='op:markup_version' content='v1.0'>
<link rel='canonical' href='http://gfamily.cwgv.com.tw/content/index/3929'>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>
    <div id='content'>

    </div>
</body>
<style type="text/css">
div{
    height: 1500px;
}
</style>
<?php
    $content = "<div>1st Page</div>".
               "######".
               "<div>2nd Page</div>".
               "######".
               "<div>3rd Page</div>".
               "######".
               "<div>4th Page</div>".
                "######".
               "<div>5th Page</div>";
?>

<script type="text/javascript">
var content = '<?=$content?>';
var content_array = content.split('######');
var page="";                //current page showed on screen
var no_more_article=false;  //will be true when no more article
var loading = false;        //will be true when loading article


function isScrolledIntoView(elem)
{
    var $elem = $(elem);
    var $window = $(window);

    var docViewTop = $window.scrollTop();
    var docViewBottom = docViewTop + $window.height();

    var elemTop = $elem.offset().top;
    var elemBottom = elemTop + $elem.height();

    return ((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}


function get_content_by_page(){
    if(page == content_array.length){
        no_more_article = true;
    }
    var append_str = content_array[page-1];
    $('#content').append(append_str);
    page += 1;
    loading = false;
}


function bind_endlessScroll(){
    $(window).scroll(function() {
        if($(window).scrollTop() + $(window).height() > $(document).height() - 300  && no_more_article==false) {
            if(loading == false){
                loading = true;
                //load article
                get_content_by_page();
            }
        }
    });
}

$(document).ready(function() {
    page = 1;               //initialize page = 1
    get_content_by_page();  //first time load article
    bind_endlessScroll();   //bind scroll event
})

</script>

</html>
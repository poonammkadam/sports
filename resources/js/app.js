/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/Example');

$(window).bind("load", function() {
    
    var footerHeight = 0,
        footerTop = 0,
        $footer = $("#footer");
    
    positionFooter();
    
    function positionFooter() {
        
        footerHeight = $footer.height();
        footerTop = ($(window).scrollTop()+$(window).height()-footerHeight)+"px";
        
        if ( ($(document.body).height()+footerHeight) < $(window).height()) {
            $footer.css({
                position: "absolute"
            }).animate({
                top: footerTop
            })
        } else {
            $footer.css({
                position: "static"
            })
        }
        
    }
    
    $(window)
        .scroll(positionFooter)
        .resize(positionFooter)
    
});

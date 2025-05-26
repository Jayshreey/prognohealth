jQuery(document).ready(function($){
    jQuery('a img').removeAttr('title');
    var effect=magniimage_vars.imgeffect;
    var speed = magniimage_vars.speed;
    var dots=magniimage_vars.dotvalue;
    var loop=magniimage_vars.loop;
    // console.log(loop);
    var loopCount = 0;

    if( effect != ''){
        $('ul.products li.wcmi-has-gallery.sale').hover(function() {
            // $(this).find( '.woocommerce-LoopProduct-link span.onsale' ).hide();
            // $(this).find( '.woocommerce-LoopProduct-link img:first' ).hide();
        }, function() {
            $(this).find( '.woocommerce-LoopProduct-link span.onsale' ).show();
            $(this).find( '.woocommerce-LoopProduct-link img:first' ).show();
        });
        $('ul.products li.wcmi-has-gallery').hover(function () {
            $(this).find( 'a>img.wp-post-image:first-child' ).hide();
        }, function () {
            $(this).find( 'a>img.wp-post-image:first-child' ).show();
        });
    }

    if( effect == 'flip' ){
        $( '.productimgflip' ).cycle({
            timeout :     speed,
        });
        if( loop == "yes" ) {
            // Listen for the 'cycle-update-view' event which occurs after each transition
            $('.productimgflip').on('cycle-update-view', function(event, optionHash, slideOptionsHash, currentSlideEl) {
                var $slider = $(this);
                // if ($slider.data('cycle.opts').currSlide == 1) {
                //     loopCount++;
                //     if (loopCount >= 2) {
                        $slider.cycle('pause');
                //     }
                // }
            });
        }
        if(dots=='yes'){
            $(this).find( '.imgflipdots span' ).hide();
        }
        $( 'ul.products li.wcmi-has-gallery' ).hover(function () {
            $(this).find( '.productimgflip' ).cycle('resume'); // Resume the slider on hover
            $(this).find( '.productimgflip' ).show();
            $(this).find( '.imgflipdots' ).show();
        }, function () {
            if( loop != "yes" ) {
                $(this).find( '.productimgflip' ).hide();
            }
            $(this).find( '.imgflipdots' ).hide();
        });
    }
    else if( effect == 'fade' ){
        $( '.productimgfade' ).cycle({
            timeout :     speed,
        });
        if( loop == "yes" ) {
            // Listen for the 'cycle-update-view' event which occurs after each transition
            $('.productimgfade').on('cycle-update-view', function(event, optionHash, slideOptionsHash, currentSlideEl) {
                var $slider = $(this);
                // if ($slider.data('cycle.opts').currSlide == 0) {
                //     loopCount++;
                //     if (loopCount >= 2) {
                        $slider.cycle('pause');
                //     }
                // }
            });
        }
        if(dots=='yes'){
            $(this).find( '.imgfadedots span' ).hide();
        }
        $( 'ul.products li.wcmi-has-gallery' ).hover(function () {
            $(this).find( '.productimgfade' ).cycle('resume'); // Resume the slider on hover
            $(this).find( '.productimgfade' ).show();
            $(this).find( '.imgfadedots' ).show();
        }, function () {
            if( loop != "yes" ) {
                $(this).find( '.productimgfade' ).hide();
            }
            $(this).find( '.imgfadedots' ).hide();
        });
    }
    else if( effect == 'slider' ){
        $( '.productimgslider' ).cycle({
            timeout: speed,
        });

        if( loop == "yes" ) {
            // Listen for the 'cycle-update-view' event which occurs after each transition
            $('.productimgslider').on('cycle-update-view', function(event, optionHash, slideOptionsHash, currentSlideEl) {
                var $slider = $(this);
                // if ($slider.data('cycle.opts').currSlide == 0) {
                //     loopCount++;
                //     if (loopCount >= 2) {
                        $slider.cycle('pause');
                //     }
                // }
            });
        }

        if(dots=='yes'){
            $(this).find( '.imgsliderdots span' ).hide();
        }
        $( 'ul.products li.wcmi-has-gallery' ).hover(function () {
            $(this).find( '.productimgslider' ).cycle('resume'); // Resume the slider on hover
            $(this).find( '.productimgslider' ).show();
            $(this).find( '.imgsliderdots' ).show();
        }, function () {
            if( loop != "yes" ) {
                $(this).find( '.productimgslider' ).hide();
            }
            $(this).find( '.imgsliderdots' ).hide();
        });
    }

});

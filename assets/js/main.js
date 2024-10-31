;

jQuery(document).ready(function(){

  // jQuery Start

// Gallery Controls


// console.log(wp_proshots_data.watermark_opacity);

      // Image Layout Output From Backend
      jQuery(function(){
        jQuery('.justifiedlayout .item .info').css({
          "font-size": wp_proshots_data.caption_font_size + "px",
          "color": wp_proshots_data.caption_text_color,
          "text-align": wp_proshots_data.caption_text_align,
          "line-height": "20px",
          "background": wp_proshots_data.caption_background_color,
        });
      });


        // LazyLoad Controls

        jQuery(function(){
          jQuery('img').loadScroll(2000);
        });


        // Watermark Output From Backend

      jQuery(function() {
        jQuery('.watermark').watermark({
          path: wp_proshots_data.watermark.url,
          text: wp_proshots_data.text_watermark,
          textSize: 70,
          textWidth: wp_proshots_data.text_watermark_width,
          textColor: wp_proshots_data.text_watermark_color,
          textBg: wp_proshots_data.text_watermark_background_color,
          opacity: wp_proshots_data.watermark_opacity,
          gravity: wp_proshots_data.watermark_position,
          outputType: 'webp',
          always: function(imgURL) {
            jQuery.post(wp_proshots_data.ajax_url, {'action': 'wp_proshots_get_image_data', 'data': imgURL}, function(data){
              //console.log(data);
              jQuery("#lightbox-image").attr('href',data);
            });
        }
        });
      });


            // Lightbox Output From Backend

            jQuery(function(){
              var options = wp_proshots_data.lightbox_image_protection;
              if(options == 0){
                var image_protection = false;
              }
              else {
                var image_protection = true;
              }
      
              jQuery('[data-fancybox]').fancybox({
                animationEffect: wp_proshots_data.lightbox_animation,
                buttons: [
                  "zoom",
                  //"share",
                  "slideShow",
                  "fullScreen",
                  //"download",
                  "thumbs",
                  "close"
                ],
                protect: image_protection,
                animationDuration: wp_proshots_data.lightbox_animation_duration,
              });
              
            });



// jQuery End

});
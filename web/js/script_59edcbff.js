/* Author: 
Daniel Łęczycki
*/

Cufon.replace('h1, h2, h3, h4, h5, h6, #nav > li > a', {
  fontFamily: 'Bebas Neue', 
  hover: true
}); 

$(document).ready(function() {  
  $('.social_icons li img').hover(function(){
    $(this).stop().animate({
      "opacity": "0.35"
    },{
      queue:false,
      duration:300
    });
  }, function() {
    $(this).stop().animate({
      "opacity": "1"
    },{
      queue:false,
      duration:300
    });
  });
});

$(document).ready(function() {  
  $('#right_c ul li ul li').add('#footer div.widget ul:not(.social_icons) li').not('#right_c ul li.ads_sidebar ul li').hover(function(){
    $(this).stop().animate({
      paddingLeft: '8px'
    },{
      queue:false,
      duration:300
    });
  }, function() {
    $(this).stop().animate({
      paddingLeft: '0px'
    },{
      queue:false,
      duration:300
    });
  });
});

$(document).ready(function() {  
  $('input').add('input#sf_guard_user_username').add('input#sf_guard_user_email_address').add('input#sf_guard_user_password').add('input#sf_guard_user_password_confirmation').add('input#sf_guard_user_first_name').add('input#sf_guard_user_last_name').add('textarea#comments').focusin(function(){
    $('#search_submit').add(this).animate({
      borderTopColor: "#fac400", 
      borderLeftColor: "#fac400", 
      borderRightColor: "#fac400", 
      borderBottomColor: "#fac400"
    }, 600);
  });
});

$(document).ready(function() {  
  $('input').add('input#sf_guard_user_username').add('input#sf_guard_user_email_address').add('input#sf_guard_user_password').add('input#sf_guard_user_password_confirmation').add('input#sf_guard_user_first_name').add('input#sf_guard_user_last_name').add('textarea#comments').focusout(function(){
    $('#search_submit').add(this).animate({
      borderTopColor: "#1e1e1e", 
      borderLeftColor: "#1e1e1e", 
      borderRightColor: "#1e1e1e", 
      borderBottomColor: "#1e1e1e"
    }, 1200);
  });
});

$(document).ready(function() {  
  $('#ev_pagenavi a').hover(function(){
    $(this).stop().animate({
      borderTopColor: "#fac400", 
      borderLeftColor: "#fac400", 
      borderRightColor: "#fac400", 
      borderBottomColor: "#fac400"
    }, 600);
  }, function() {
    $(this).stop().animate({
      borderTopColor: "#1e1e1e", 
      borderLeftColor: "#1e1e1e", 
      borderRightColor: "#1e1e1e", 
      borderBottomColor: "#1e1e1e"
    }, 1200);
  });
});

$(document).ready(function() {  
  $('#main .portfolio_item a img').hover(function(){
    $(this).stop().animate({
      "opacity": "0.35"
    },{
      queue:false,
      duration:300
    });
  }, function() {
    $(this).stop().animate({
      "opacity": "1"
    },{
      queue:false,
      duration:300
    });
  });
});

$(function() {
  // These first three lines of code compensate for Javascript being turned on and off. 
  // It simply changes the submit input field from a type of "submit" to a type of "button".

  var paraTag = $('input#submit').parent('p');
  $(paraTag).children('input').remove();
  $(paraTag).append('<input type="button" name="submit" id="submit" value="Send" />');

  $('#form_main input#submit').click(function() {
    $('#form_main').append('<img src="css/images/ajax-loader.gif" class="loaderIcon" alt="Loading..." />');

    var name = $('input#sf_guard_user_username').val();
    var email = $('input#sf_guard_user_email_address').val();
    var comments = $('textarea#comments').val();

    $.ajax({
      type: 'post',
      url: 'sendEmail.php',
      data: 'name=' + name + '&email=' + email + '&comments=' + comments,

      success: function(results) {
        $('#form_main img.loaderIcon').fadeOut(5000);
        $('ul#form_response').html(results);
      }
    }); // end ajax
  });
});

$(function(){
  $('ul.sf-menu').superfish();
});
		
		
$(document).ready(function(){
  $("a[rel^='prettyPhoto']").prettyPhoto();
});



$(document).ready(function(){
  $('p.confirmation').hide().fadeIn('slow').delay(3000).fadeOut(3000);
  $('p.error').hide().fadeIn('slow').delay(3000).fadeOut(3000);
});














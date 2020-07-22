// join form

$(document).ready(function() { 
  $("input[name='phone']").parents(".row").addClass('phone-parent');
  $("input[name='zip5']").parents(".row").addClass('zip-parent');
  $(".phone-parent").add($(".zip-parent")).wrapAll('<div class="phone-zip"></div>')
  $("#submitbutton").parents(".row").addClass('submit-btn');
});

// header 

$(document).ready(function() { 
  $("input[name='phone']").parents(".row").addClass('phone-parent');
  $("input[name='zip5']").parents(".row").addClass('zip-parent');
  $(".phone-parent").add($(".zip-parent")).wrapAll('<div class="phone-zip"></div>')
  document.querySelector('#submitbutton').innerHTML = '>';
  document.getElementById("email").placeholder = "Email address";
  $('iframe.advocacy-actionwidget-iframe').attr('scrolling', 'none');
});

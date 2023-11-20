$(document).ready(function() {
    var words = ['CONCERTS', 'THEATERS', 'WORKSHOPS', 'PARTIES', 'SPORT EVENTS'];
    var i = 0;
  
    setInterval(function() {
      i = (i + 1) % words.length;
      $('.dynamic-text').fadeOut(function() {
        $(this).text(words[i]).fadeIn();
      });
    }, 4000);
  });
  
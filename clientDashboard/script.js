$(document).ready(function() {
    var words = ['CONFERENCES', 'MEETINGS', 'WORKSHOPS', 'SEMINARS', 'CONVENTIONS'];
    var i = 0;
  
    setInterval(function() {
      i = (i + 1) % words.length;
      $('.dynamic-text').fadeOut(function() {
        $(this).text(words[i]).fadeIn();
      });
    }, 4000);
  });
  
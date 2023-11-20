<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="footer_style.css">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="script.js"></script>
  <title>Royal Ticket</title>
</head>
<body style="background-image: url('imagini/bkg.jpeg'); background-size: cover;">
  <nav>
    <div class="nav-container">
      <div class="logo">Royal Ticket</div>
      <ul class="nav-list">
        <li><a href="#">Home</a></li>
        <li><a href="contact_page.php">Contact Us</a></li>
        <li><a href="create_event.php">Create Event</a></li>
        <li><a href="login_page.php">Login/Register</a></li>
        <li><a href="cart_page.php">My Cart</a></li>
      </ul>
      <div class="search-bar">
        <input type="text" placeholder="Search">
        <button type="submit">Search</button>
      </div>
    </div>
  </nav>

  <div class="main-content">
    <div class="center-text">
    <h1>ALL THE FUN STARTS HERE</h1>
      <p>Discover <span class="dynamic-text">CONCERTS</span> around you.</p>
    </div>
  </div>

<p>Upcoming Events</p>

<div class="event-container">
  <div class="event">
  <a href="event_page.php">
      <img src="imagini/event1.jpg" alt="Event 1">
      <div class="event-details">
        <p class="event-price">$20</p>
        <p class="event-name">Concert Night</p>
        <p class="event-date">Date: 2023-12-01</p>
        <p class="event-location">Location: Concert Hall</p>
        <p class="book-ticket">Book ticket</p>
      </div>
    </a>
  </div>


  <div class="event">
  <a href="event_page.php">
      <img src="imagini/event1.jpg" alt="Event 1">
      <div class="event-details">
        <p class="event-price">$20</p>
        <p class="event-name">Concert Night</p>
        <p class="event-date">Date: 2023-12-01</p>
        <p class="event-location">Location: Concert Hall</p>
        <p class="book-ticket">Book ticket</p>
      </div>
    </a>
  </div>
</div> 
</div>

<!-- PT footer doar ca nu functioneaza perfect
<div class="site-footer">
  <div class="footer-top">
    <div class="footer-logo">
      <img src="logo.png" alt="Logo">
    </div>
    <div class="footer-links">
      <h3>Link-uri utile</h3>
      <ul>
        <li><a href="#">Acasă</a></li>
        <li><a href="#">Despre noi</a></li>
        <li><a href="#">Servicii</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </div>
    <div class="footer-contact">
      <h3>Contact</h3>
      <p>Adresa: Str. Exemplu, Nr. 123, Oraș, 123456</p>
      <p>Email: contact@exemplu.com</p>
      <p>Telefon: +123 456 7890</p>
    </div>
    <div class="footer-social">
      <h3>Urmărește-ne</h3>
      <ul>
        <li><a href="#"><i class="fab fa-facebook"></i></a></li>
        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
      </ul>
    </div>
  </div>
  <div class="footer-bottom">
    <p>&copy; 2023 Numele Companiei. Toate drepturile rezervate.</p>
  </div>
</div> -->

<!-- <script>
  $(document).ready(function() {
    $(window).scroll(function() {
      var windowHeight = $(window).height();
      var bodyHeight = $(document).height();
      var windowScroll = $(window).scrollTop();

      if (windowHeight + windowScroll >= bodyHeight - 50) {
        $('.site-footer').fadeIn();  Afișează footer-ul când apropii de finalul paginii
      } else if (windowScroll <= 0) {
        $('.site-footer').fadeIn();  Afișează footer-ul la începutul paginii
      } else {
        $('.site-footer').fadeOut();  Ascunde footer-ul în restul paginii
      }
    });
  });
</script> -->

</body>
</html>

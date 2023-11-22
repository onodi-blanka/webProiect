<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="event_style.css">
    <title>Royal Ticket</title>
</head>
<body>
<!--<nav>-->
<!--    <div class="nav-container">-->
<!--        <div class="logo">Royal Ticket</div>-->
<!--        <ul class="nav-list">-->
<!--            <li><a href="index.php">Home</a></li>-->
<!--            <li><a href="contact_page.php">Contact Us</a></li>-->
<!--            <li><a href="event_page.php">Event Details</a></li>-->
<!--            <li><a href="login_page.php">Login/Register</a></li>-->
<!--            <li><a href="cart_page.php">My Cart</a></li>-->
<!--        </ul>-->
<!--        <div class="search-bar">-->
<!--            <input type="text" placeholder="Search">-->
<!--            <button type="submit">Search</button>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<?php
// Establish database connection
include("../Conectare.php");
$eventID = $_GET['EventID'];
$result = $mysqli->query("SELECT * FROM event WHERE ID = $eventID");
$eventData = mysqli_fetch_assoc($result);


?>


<div class="event-background">

    <span class="event-details">
      <h2><?php echo $eventData['Name']; ?></h2>
      <p>Location: <?php echo $eventData['Location']; ?></p>
      <p>Date: <?php echo $eventData['Date']; ?></p>
      <p>Price: 100 ron </p>
      <a href="login_page.php" class="buy-ticket-btn disabled">Buy ticket</a>
    </span>
    <span class="event-details">
        <h2>Partners: </h2>
    <?php
    if ($result = $mysqli->query("SELECT eventpartnerssponsors.*, partnerssponsors.Name as sponsor_name, partnerssponsors.Type FROM eventpartnerssponsors
                        INNER JOIN partnerssponsors ON eventpartnerssponsors.PartnerSponsorID = partnerssponsors.ID
                        WHERE eventpartnerssponsors.EventID = " . $_GET['EventID'] . " AND partnerssponsors.Type = 'Partner' ORDER BY ID")) {

        if ($result->num_rows > 0) {
            echo "<table>";
            echo
            "
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                ";

            while ($row = $result->fetch_object()) {
                echo "<tbody>";
                echo "<tr>";
                echo "<td>" . $row->sponsor_name . "</td>";
                echo "</tr>";
                echo "</tbody>";
            }

            echo "</table>";
        } else {
            echo "There are no records in the table.";
        }
    } else {
        echo "Error " . $mysqli->error();
    }
    ?>
    </span>
    <span class="event-details">
        <h2>Sponsors: </h2>
               <?php
               if ($result = $mysqli->query("SELECT eventpartnerssponsors.*, partnerssponsors.Name as sponsor_name, partnerssponsors.Type FROM eventpartnerssponsors
                        INNER JOIN partnerssponsors ON eventpartnerssponsors.PartnerSponsorID = partnerssponsors.ID
                        WHERE eventpartnerssponsors.EventID = " . $_GET['EventID'] . " AND partnerssponsors.Type = 'Sponsor' ORDER BY ID")) {

                   if ($result->num_rows > 0) {
                       echo "<table>";
                       echo
                       "
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                ";

                       while ($row = $result->fetch_object()) {
                           echo "<tbody>";
                           echo "<tr>";
                           echo "<td>" . $row->sponsor_name . "</td>";
                           echo "</tr>";
                           echo "</tbody>";
                       }

                       echo "</table>";
                   } else {
                       echo "There are no records in the table.";
                   }
               } else {
                   echo "Error " . $mysqli->error();
               }
               
               ?>
    </span>
</div>

<div class="description">
    <h2>Event agenda</h2>
    <?php
               if ($result = $mysqli->query("SELECT agenda.*, speakers.Name as speaker_name FROM agenda INNER JOIN speakers ON agenda.SpeakerID = speakers.ID
                        WHERE agenda.EventID = " . $_GET['EventID'] . " ORDER BY ID")) {

                   if ($result->num_rows > 0) {
                       echo "<table>";
                       echo
                       "
                                    <thead>
                                        <tr>
                                            <th>Start time</th>
                                            <th>End time</th>
                                            <th>Activity details</th>
                                            <th>Speaker</th>
                                        </tr>
                                    </thead>
                                ";

                       while ($row = $result->fetch_object()) {
                           echo "<tbody>";
                           echo "<tr>";
                           echo "<td>" . $row->StartTime . "</td>";
                           echo "<td>" . $row->EndTime . "</td>";
                           echo "<td>" . $row->ActivityDetails . "</td>";
                           echo "<td>" . $row->speaker_name . "</td>";
                           echo "</tr>";
                           echo "</tbody>";
                       }

                       echo "</table>";
                   } else {
                       echo "There are no records in the table.";
                   }
               } else {
                   echo "Error " . $mysqli->error();
               }

               $mysqli->close();
               ?>
</div>



</body>
</html>
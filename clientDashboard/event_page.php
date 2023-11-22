<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="event_style.css">
    <!-- <link rel="stylesheet" href="styles.css"> -->
    <title>Royal Ticket</title>
</head>
<body>
<nav>
    <div class="nav-container">
        <div class="logo">Royal Ticket</div>
        <ul class="nav-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="login_page.php">Login/Register</a></li>
            <li><a href="cart_page.php">My Cart</a></li>
        </ul>
    </div>
</nav>

<?php
    // Establish database connection
    include("../Conectare.php");
    $eventID = $_GET['EventID'];
    $result = $mysqli->query("SELECT * FROM event WHERE ID = $eventID");
    $eventData = mysqli_fetch_assoc($result);
?>

<section class="event-title">
    <div class="event-name">
        <h2><?php echo $eventData['Name']; ?></h2>
    </div>
    <section class="event-details">
        <div class="event-details-wrapper">
            <div class="event-date">
                <p>Date: <?php echo $eventData['Date']; ?></p>
            </div>
            <div class="event-location">
                <p>Location: <?php echo $eventData['Location']; ?></p>
            </div>
            <div class="buy-ticket">
            <button class="buy-button"><a href="cart_page.php">Buy ticket</a></button>    
            </div>
        </div>
    </section>
</section>

<div class="details-wrapper">
        <section class="agenda-details">
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
        ?>
    </section>
    <section class="partners-details">
        <h2>Event partners</h2>
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
    </section>
    <section class="sponsors-details">
        <h2>Event sponsors</h2>
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
    </section>
    <section class="contact-details">
        <h2>Event contact</h2>
        <?php
            if ($result = $mysqli->query("SELECT event.ContactName, event.ContactPhone, event.ContactEmail FROM event
                                WHERE event.ID = " . $_GET['EventID'])) {

                if ($result->num_rows > 0) {
                    echo "<table>";
                    echo
                    "
                                            <thead>
                                                <tr>
                                                    <th>Contact name</th>
                                                    <th>Contact phone</th>
                                                    <th>Contact email</th>
                                                </tr>
                                            </thead>
                                        ";

                    while ($row = $result->fetch_object()) {
                        echo "<tbody>";
                        echo "<tr>";
                        echo "<td>" . $row->ContactName . "</td>";
                        echo "<td>" . $row->ContactPhone . "</td>";
                        echo "<td>" . $row->ContactEmail . "</td>";
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
    </section>
</div>


<!-- <div class="event-background">

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
</div> -->


<script src="https://kit.fontawesome.com/869245934a.js" crossorigin="anonymous"></script>
</body>
</html>
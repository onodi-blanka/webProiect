<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="footer_style.css">
    <link rel="stylesheet" href="event_style.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="script.js"></script>
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

<section class="wrapper">
    <section class="hero-section">
        <div class="main-content">
            <div class="center-text">
                <h1>ALL THE FUN STARTS HERE</h1>
                <p>Discover <span class="dynamic-text">CONCERTS</span> around you.</p>
            </div>
        </div>
    </section>
    <section class="details-section">
        <p>Upcoming Events</p>

        <div class="event-details">
            <?php
                include("../Conectare.php");

                if ($result = $mysqli->query("SELECT * FROM event ORDER BY id")) {

                    if ($result->num_rows > 0) {
                        echo "<table>";
                        echo
                        "
                        <thead>
                                                <tr>
                                                <th>Event name</th>
                                                    <th>Date</th>
                                                    <th>Location</th>
                                                    <th>No tickets</th>
                                                    <th>Contact name</th>
                                                    <th>Contact phone</th>
                                                    <th>Contact email</th>
                                                    <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    ";
                                        
                                                    while ($row = $result->fetch_object()) {
                            echo "<tbody>";
                            echo "<tr>";
                            echo "<td>" . $row->Name . "</td>";
                            echo "<td>" . $row->Date . "</td>";
                            echo "<td>" . $row->Location . "</td>";
                            echo "<td>" . $row->Tickets . "</td>";
                            echo "<td>" . $row->ContactName . "</td>";
                            echo "<td>" . $row->ContactPhone . "</td>";
                            echo "<td>" . $row->ContactEmail . "</td>";
                            echo "<td>";
                            echo "<a href='event_page.php?EventID=" . $row->ID . "'>View Event Details</a>";
                            echo "</td>";
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
    </section>
</section>


</body>
</html>

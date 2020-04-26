<!doctype html>
<html>
    <head>
        <title>Tennis Player Info</title>

        <meta charset="UTF-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="tennisPlayerInfo.css">
    </head>

    <body>	

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

            <a class="navbar-brand" href="#" id="author">Vlad Kazandzhi</a>
            <a class="navbar-brand" href="#" id="current-page">Tennis Player Info</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="nav navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="pointCalculation.php"> Point Calculation</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="atpRankings.php"> ATP Rankings</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="addNewTennisPlayerInfo.php"> Add Tennis Player</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="tournamentResults.php"> Add Tournament Results</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://w3playground.com/"> Home</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <?php

            //connect to database
            require_once('connectDatabase.php');

            // get id from atpRankings.php
            $player_id = $_GET["id"];

            // select the tennis player's information depending on the received id
            $query = "SELECT player_name, birthday, age, country, player_image FROM tennis_players WHERE player_id='$player_id'";
            $statement = $db->prepare($query);
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);

            $player_name = $row['player_name'];
            $birthday = $row['birthday'];

            $today = date("Y-m-d");
            $diff = date_diff(date_create($birthday), date_create($today));
            $age = $diff->format('%y');

            $country = $row['country'];
            $imageURL = $row['player_image'];

            // display the player's info
            echo '<div class="card">';

            if ($imageURL) {
                echo '<img class="card-img-top" id="playerImg" src="'.$imageURL.'">';
            }

                echo "<div class='card-body'>

                          <div class='oneRow'>
                              <span class='infoDescription'>
                                <i>Player name: </i><span class='playerInfo'>$player_name</span>
                              </span>
                          </div>

                          <div class='oneRow'>
                              <span class='infoDescription'>
                                <i>Date of birth: </i><span class='playerInfo'>$birthday</span>
                              </span>
                          </div>

                          <div class='oneRow'>
                              <span class='infoDescription'>
                                <i>Age: </i><span class='playerInfo'>$age</span>
                              </span>
                          </div>

                          <div class='otherRow'>
                              <span class='infoDescription'>
                                <i>Home country: </i><span class='playerInfo'>$country</span>
                              </span>
                          </div>    
                      </div>
                  </div>";

            ?>

        </div>

        <!--js file name-->
        <script src="tennis.js"></script>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

        <!-- Popper.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>

</html>
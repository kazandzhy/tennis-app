<!doctype html>
<html>
    <head>
        <title>ATP Rankings</title>

        <meta charset="UTF-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="atpRankings.css">
        <link rel="stylesheet" href="home.css">
    </head>

    <body>	

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

            <a class="navbar-brand" href="#" id="author">Vlad Kazandzhi</a>
            <a class="navbar-brand" href="#" id="current-page">Atp Rankings</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="nav navbar-nav mr-auto">

                    <li class="nav-item">
                        <a class="nav-link" href="pointCalculation.php"> Point Calculation</a>
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

        <?php 

        session_start();

        if (isset($_SESSION['playerId'])) {
            $playerId = $_SESSION['playerId'];
        } else {
            $playerId = 0;
        }

        ?>	

        <div class="container">

            <?php

            //connect to database
            require_once('connectDatabase.php');

            //header
            echo "<span class='tableName'>Men's Tennis ATP Rankings</span>";

            // TENNIS_PLAYERS
            // code adapted from https://stackoverflow.com/questions/7745609/sql-select-only-rows-with-max-value-on-a-column
            // find total points of player, found in most recent match
            $points_statement = $db->prepare("SELECT a.total_points, a.player_id
                                              FROM tournament_results a 
                                              LEFT OUTER JOIN tournament_results b
                                                  ON a.player_id = b.player_id
                                                  AND a.event_id < b.event_id
                                              WHERE b.player_id IS NULL
                                              ORDER BY a.total_points DESC;");
            $points_statement->execute();

            //display tennis_player table
            echo '<table class="table table-sm table-bordered table-hover">
            
                      <thead class="thead">
                          <tr>
                              <th scope="col"><span class="header">Place</span></th>
                              <th scope="col"><span class="header">Name</b></span</th>
                              <th scope="col"><span class="header">Country</span></th>
                              <th scope="col"><span class="header">Points</span></th>
                          </tr>
                      </thead>
                      
                      <tbody>';
                          $rank = 1;
            
                          // Go through each result
                          while ($points_row = $points_statement->fetch(PDO::FETCH_ASSOC))
                          {
                              // get current player id
                              $player_id = $points_row['player_id'];

                              $player_statement = $db->prepare("SELECT player_name, country FROM tennis_players WHERE player_id = $player_id");
                              $player_statement->execute();
                              $player_row = $player_statement->fetch(PDO::FETCH_ASSOC);

                              $playerLink = ($player_id == $playerId) ? '<a class="mostRecent" href="tennisPlayerInfo.php?id='.$player_id.'">'.$player_row['player_name'].'</a>' : '<a class="link" href="tennisPlayerInfo.php?id='.$player_id.'">'.$player_row['player_name'].'</a>';

                              // show all player information (from tennis_players) plus current total points (from tournament_results)
                              echo '<tr>
                                        <th scope="row"><span class="playerInfo">'.$rank.'</span></th>
                                        <td><span class="playerInfo">'.$playerLink.'</span></td>
                                        <td><span class="playerInfo">'.$player_row['country'].'</span></td>
                                        <td><span class="playerInfo">'.$points_row['total_points'].'</span></td>';
                              echo '</tr>';
                              
                              $rank++;
                          }
                echo '</tbody>
                  </table>';
            
            if (isset($_SESSION['playerId'])) {
             echo '<div class="item-center"><div class="rectangle"></div><span class="playerInfo">- most recent entry</span></div>';
            }

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









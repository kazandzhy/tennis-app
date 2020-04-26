<?php

	//connect to database
	require_once('connectDatabase.php');
	
	session_start();
	
	if (!empty($_POST["delete"])) {
        
		$lastEntry = $_POST["delete"];
		
		$query = "DELETE from tournament_results WHERE event_id='$lastEntry'";
		$statement = $db->prepare($query);
		$statement->execute();	
	}
	
	if (!empty($_POST["name"]) && !empty($_POST["birthday"]) && !empty($_POST["country"])) {
		
		$name = $_POST["name"];
		$birthday = $_POST["birthday"];
		$country = $_POST["country"];
				
	    //calculate age of tennis player through birthday			
		$query = "SELECT date_part('year',age(current_timestamp, timestamp '$birthday')) as age";
		$statement = $db->prepare($query);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$age = $row['age'];
		
		
		//insert information about new tennis player into tennis_player table
		$query = 'INSERT INTO tennis_players(player_name, birthday, age, country) VALUES(:name, :birthday, :age, :country)';
		$statement = $db->prepare($query);
		$statement->bindValue(':name', $name);
		$statement->bindValue(':birthday', $birthday);
		$statement->bindValue(':age', $age);
		$statement->bindValue(':country', $country);
		$statement->execute();
		
		if (!empty($_POST["imageURL"])) {
            
			echo "imageURL posts correctly";
			$imageURL = $_POST["imageURL"];
			$query = "UPDATE tennis_players SET player_image=:imageURL where player_name='$name'";
			$statement = $db->prepare($query);
			$statement->bindValue(':imageURL', $imageURL);
			$statement->execute();
		}
		
	}
	
	if (!empty($_POST["tournName"]) && !empty($_POST["tournYear"]) && !empty($_POST["playerName"]) && !empty($_POST["placeEarned"])) {
		
		$tourn_id = $_POST["tournName"];
		$tournYear = $_POST["tournYear"];
		$player_id = $_POST["playerName"];
		$placeEarned = $_POST["placeEarned"];

		//calculate how many points tennis player earned on a certain tournament by looking into points_earned table 
		//depending on kind of tournament and place which this player earned
		$query = "SELECT $placeEarned FROM points_awarded WHERE tourn_id=$tourn_id";
		$statement = $db->prepare($query);
		$statement->execute();
		$row = $statement->fetch(PDO::FETCH_ASSOC);
		$points_earned = $row[$placeEarned];

		//select how many total points tennis player had before certain tournament
		$total_points_before_stmt = $db->prepare(" SELECT total_points
									FROM tournament_results
									WHERE event_id = (select max(event_id) from tournament_results where player_id=$player_id)");
		$total_points_before_stmt->execute();
		$row = $total_points_before_stmt->fetch(PDO::FETCH_ASSOC);
		
		//if new tennis player he has 0 total points
		if (empty($row)) {
			$total_points_before = 0;
		} else {
			$total_points_before = $row['total_points'];
		}

		//calculate how many points tennis player earned on the same tournament one year ago
		$ly_points_earned_stmt = $db->prepare("select points_earned from tournament_results where year=($tournYear-1) and player_id=$player_id and tourn_id=$tourn_id");
		$ly_points_earned_stmt->execute();
		$row = $ly_points_earned_stmt->fetch(PDO::FETCH_ASSOC);
		
		//if he didn't participate in this tournament one year ago his last year points = 0
		if (empty($row)) {
			$ly_points_earned = 0;
		} else {
			$ly_points_earned = $row['points_earned'];
		}
		
		//calculate how many total points tennis player will have after a certain tournament
		$final_total_points = $total_points_before - $ly_points_earned + $points_earned;
		
		//insert information about tournament results into tournament_results table
		$query = 'INSERT INTO tournament_results(tourn_id, player_id, year, place_earned, points_earned, total_points) VALUES(:tourn_id, :player_id, :tournYear, :placeEarned, :pointsEarned, :final_total_points)';
		$statement = $db->prepare($query); 
		$statement->bindValue(':tourn_id', $tourn_id);
		$statement->bindValue(':player_id', $player_id);
		$statement->bindValue(':tournYear', $tournYear);
		$statement->bindValue(':placeEarned', $placeEarned);
		$statement->bindValue(':pointsEarned', $points_earned);
		$statement->bindValue(':final_total_points', $final_total_points);
		$statement->execute();
		$lastEntry = $db->lastInsertId("tournament_results_event_id_seq");
	}
	
?>

<!doctype html>
<html>
    <head>
        <title>Add Tournament Results</title>

        <meta charset="UTF-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">	

        <script src="https://kit.fontawesome.com/3aa9c2a23f.js"></script>

        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="tournamentResults.css">
    </head>
	
    <body>

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

            <a class="navbar-brand" href="#" id="author">Vlad Kazandzhi</a>
            <a class="navbar-brand" href="#" id="current-page">Add Tournament Results</a>

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
                        <a class="nav-link" href="http://w3playground.com/"> Home</a>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="container">

            <!-- header -->
            <span class='formName'>Add New Tournament Results:</span>

            <!-- submission form -->
            <form id="tournForm" action="tournamentResults.php" method="post">
               
                <div class="form-group">
                   
                    <label for="tournName">Tournament name:</label>

                    <select class="form-control" id="tournName" name="tournName" required>
                        <option>Choose...</option>
                        <option value="1">Grand Slam</option>
                        <option value="2">Masters 1000</option>
                        <option value="3">500 Series</option>
                        <option value="4">250 Series</option>
                    </select>
                    <br>

                    <label for="tournYear">Tournament year:</label>
                    
                    <select class="form-control" id="tournYear" name="tournYear" required>
                        <option>Choose...</option>
                        <option value="2019">2019</option>
                        <option value="2020">2020</option>
                        <option value="2021">2021</option>
                    </select>
                    <br>

                    <label for="playerName">Player name:</label>

                    <select class="form-control" id="playerName" name="playerName" required>
                       
                        <option>Choose...</option>

                        <?php 
                        //select player id and name from database
                        $statement = $db->prepare("SELECT player_id, player_name FROM tennis_players");
                        $statement->execute();

                        //display player name by using player id
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC))
                        {
                        $id = $row['player_id'];
                        $name = $row['player_name'];

                        echo '<option value="'.$id.'">'.$name.'</option>';
                        }
                        ?>

                    </select>
                    <br>

                    <label for="placeEarned">Place earned:</label>

                    <select class="form-control" id="placeEarned" name="placeEarned" required>
                        <option>Choose...</option>
                        <option value="winner">Winner</option>
                        <option value="finals">Finals</option>
                        <option value="semi_finals">Semi-finals</option>
                        <option value="quarter_finals">Quarter-finals</option>
                    </select>
                </div>

                <!-- submission button -->	
                <button id="tournamentSubmit" type="submit" class="btn btn-primary">Submit</button>
            </form>

            <?php

            if (!empty($_POST["tournName"]) && !empty($_POST["tournYear"]) && !empty($_POST["playerName"]) && !empty($_POST["placeEarned"])){

            //select player name from database
            $statement = $db->prepare("SELECT player_id,player_name FROM tennis_players where player_id = $player_id");
            $statement->execute();
            $row = $statement->fetch(PDO::FETCH_ASSOC);
            $name = $row['player_name'];

            $_SESSION["playerId"] = $player_id;

            echo '<div class="viewNewRank">
            
                    <a href="atpRankings.php">
                        <i class="fas fa-angle-left"></i>
                        View new ATP Rankings
                    </a>
                  </div>

                  <div class="newResultName">
                    Player New Result:
                  </div>';

            //display result after submittion form
            echo '<table class="table table-sm">
            
                      <tr>
                          <th scope="row"><span class="pointsInfo">Player name</span></th>
                          <td>'.$name.'</td>
                      </tr>
                      
                      <tr>
                          <th scope="row"><span class="pointsInfo">Total points before</span></th>
                          <td>'.$total_points_before.'</td>
                      </tr>
                      
                      <tr>
                          <th scope="row"><span class="pointsInfo">Points earned last year</span></th>
                          td>'.'- '.$ly_points_earned.'</td>
                      </tr>
                      
                      <tr>
                          <th scope="row"><span class="pointsInfo">Points earned this year</span></th>
                          <td>'.'+ '.$points_earned.'</td>
                      </tr>
                      
                      <tr>
                          <th scope="row"><span class="pointsInfo">Final total points</span></th>
                          <td>'.'= '.$final_total_points.'</td>
                      </tr>';
            echo '</table>';

            echo '<form id="deleteLastEntry" action="tournamentResults.php" method="post">
                      <input type="hidden" name="delete" value="'.$lastEntry.'">
                      <button id="deleteButton" type="submit" class="btn btn-danger">Delete Last Entry</button>
                  </form>';

            echo '<br><br>';
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
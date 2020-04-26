<!doctype html>
<html>
	<head>
		<title>Point Calculation</title>
				
		<meta charset="UTF-8" />
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	
	    <link rel="stylesheet" href="home.css">
	    <link rel="stylesheet" href="pointCalculation.css">
	</head>
	
	<body>	
	
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

            <a class="navbar-brand" href="#" id="author">Vlad Kazandzhi</a>
            <a class="navbar-brand" href="#" id="current-page">Point Calculation</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="nav navbar-nav mr-auto">

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

            <span class='articleName'>How Points are Calculated in Tennis</span>

            <div id="pointSystem">

                <p class='text-center'>
                    (<i>Information retrieved from</i> <a href="https://www.quora.com/How-does-the-ranking-system-work-in-tennis" target="_blank">this source</a>)
                </p>

                <span class='pointSystemText'>
                    It depends on the points one has. Every tournament has certain points associated with it and depending on where one finishes in the tournament, points are earned.<br /> <br /> 
                    In case of men's tennis, a tournament is either of 2000 points (GrandSlams), 1000 points (ATP Master events), 500 or 250 points. (Exception being World Tour Finals where a player can gain a max of 1500 points)<br /> <br /> Consider case of a Grandslam:<br /> Winner: 2000pts<br /> Runner up: 1200<br /> SemiFinalist: 720<br /> QF: 360<br /> R4: 180<br /> R3: 90<br /> R2: 45<br /> R1: 10<br /> <br /> 
                    These points are counted for 1 complete year and dropped the following year. For example, if a player won Wimbledon, he would have 2000 points till the next Wimbledon starts. <br /> <br /> 
                    eg: Player A, who was semifinalist at Wimbledon 2009, has 2500 pts just before start of Wimbledon in 2010, and happens to win it, so he would have 2500 - 720 +2000 at end of Wimbledon 2010.<br /> <br /> 
                    This way a player who has maximum points is your #1 and so on.<br /><br /> 
                </span>
            </div>


            <p class="moreInfo"><i>Check the atp site</i> (<a href="http://www.atpworldtour.com" data-qt-tooltip="atpworldtour.com" data-tooltip="attached">ATP World Tour - Official Site of Men's Professional Tennis</a>) <i>for exact distribution of points for other events.</i></p>

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
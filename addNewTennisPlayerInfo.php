

<!doctype html>
<html>
    <head>
        <title>Add Tennis Player</title>

        <meta charset="UTF-8" />
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link rel="stylesheet" href="home.css">
        <link rel="stylesheet" href="addNewTennisPlayerInfo.css">
    </head>

    <body>	
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

            <a class="navbar-brand" href="#" id="author">Vlad Kazandzhi</a>
            <a class="navbar-brand" href="#" id="current-page">Add Tennis Player</a>

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
                        <a class="nav-link" href="tournamentResults.php"> Add Tournament Results</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="http://w3playground.com/"> Home</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">

            <span class='formName'>Add a Tennis Player:</span>

            <form id="tennisForm" action="tournamentResults.php" method="post">

                <fieldset class="form-group">
                    <label for="name">Player name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="birthday">Player birthday:</label>
                    <input type="date" class="form-control" id="birthday" name="birthday" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="country">Player home country:</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </fieldset>

                <fieldset class="form-group">
                    <label for="imageURL">Player photo URL (optional):</label>
                    <input type="text" class="form-control" id="imageURL" name="imageURL">
                </fieldset>

                <button id="tennisSubmit" type="submit" class="btn btn-primary">Submit</button>

            </form> 

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
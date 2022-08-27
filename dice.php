<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
    <form class="row offset-sm-2 row-cols-lg-auto g-3 align-items-center">
        <div class="col-12">
            <label class="visually-hidden" for="player">Player</label>
            <input type="number" class="form-control" id="player" placeholder="Player">
        </div>
        <div class="col-12">
            <label class="visually-hidden" for="dice">Dice</label>            
            <input type="number" class="form-control" id="dice" placeholder="Dice">
        </div>

        <div class="col-12">
            <button type="button" onclick="seeResult()" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <div id="content_result"></div>

<script type="text/javascript">
    function seeResult() {
        var player = $('#player').val();
        var dice = $('#dice').val();

        $.ajax({
            method: "POST",
            url: "proses.php",
            data: { player: player, dice: dice },
            success: function(result) {
                $('#content_result').html(result);
            }
        });
        /* .done(function( msg ) {
            alert( "Data Saved: " + msg );
        }); */
    }   
</script>
</body>
</html>
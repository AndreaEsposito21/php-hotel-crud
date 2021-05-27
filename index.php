<?php
    require_once __DIR__ . '/database.php';

    $sql = "SELECT * FROM `stanze`;";
    $result = $conn->query($sql);

    $rooms = [];
    if ($result && $result->num_rows > 0) {
        
        while($row = $result->fetch_assoc()) {
            $rooms[] = $row;
        }
    
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stanze</title>
</head>
<body>
    <div>
        <h1>Liste stanze:</h1>

        <ul>
            <?php foreach ($rooms as $room) { ?>
                <li>
                    Numero stanza: <?php echo $room['room_number']; ?>
                    Piano: <?php echo $room['floor']; ?><br>
                    <a href="room-info.php?id=<?php echo $room['id']; ?>">Dettagli stanze</a>
                </li>
            <?php } ?>
        </ul>
    </div>    
</body>
</html>
<?php

class Form
{
    private $db;

    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function createForm()
    {
        // get fields from Database
        $days = $this->db->getDays();
        $games = $this->db->getGames();
        $times = $this->db->getTime();

        // create form
        echo '<form method="post">' .
            '<label for="day">Tag:</label>' .
            '<select name="day" id="day">';
        foreach ($days as $day) {
            echo '<option value="' . $day['id'] . '">' . $day['name'] . '</option>';
        }
        echo '</select>' .
            '<br>';

        echo '<label for="game">Spiel:</label>' .
            '<select name="game[]" id="game">';
        foreach ($games as $game) {
            echo '<option value="' . $game['id'] . '">' . $game['name'] . '</option>';
        }
        echo '</select>' .
            '<br>';

        /*echo '<label for="time">Uhrzeit:</label>' .
            '<select name="time[]" id="time" multiple>';
        foreach ($times as $time) {
            echo '<option value="' . $time['id'] . '">' . $time['time'] . '</option>';
        }
        echo '</select>' .*/
        echo '<label for="time">Uhrzeit:</label>' .
            '<input type="text" name="time" id="time" placeholder="z.B. 18 - 22">' .
            '<br>' .

            '<label for="name">Name:</label>' .
            '<input type="text" name="name" id="name">' .
            '<br>' .

            '<label for="date">Datum:</label>' .
            '<input type="date" name="date" id="date">' .
            '<br>' .

            '<input type="submit" value="Submit">' .
            '</form>';
    }

    public function validateAndSafeData()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //get fields from form
            $day = $_POST['day'];
            $game = $_POST['game'];
            $time = $_POST['time'] . " Uhr";
            $name = $_POST['name'];
            $date = $_POST['date'];

            //validate
            if (empty($day) || empty($game) || empty($time) || empty($name) || empty($date)) {
                echo 'Alle Felder müssen ausgefüllt sein';
                return;
            }
            if (!preg_match("/^[0-9]*$/", $time) && !str_contains($time, ' - ')) {
                echo "Die Uhrzeitangabe darf nur aus Zahlen, Leerzeichen und Bindestrich bestehen! z.B. 18 - 19";
                return;
            }

            //save data to database
            $stmt = $this->db->conn->prepare("INSERT INTO overview(day_id, game_id, times, name, datum)
                 VALUES (:day, :game, :times, :name, :date)");


            $stmt->bindParam(':day', $day);
            $stmt->bindParam(':game', implode(",", $game));
            $stmt->bindParam(':times', $time);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':date', $date);

            $stmt->execute();

            echo "Daten erfolgreich gespeichert!";

        }
    }
}
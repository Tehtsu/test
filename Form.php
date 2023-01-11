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
        echo '<form method="post">';
        echo '<label for="day">Tag:</label>';
        echo '<select name="day" id="day">';
        foreach ($days as $day) {
            echo '<option value="' . $day['id'] . '">' . $day['name'] . '</option>';
        }
        echo '</select>';
        echo '<br>';

        echo '<label for="game">Spiel:</label>';
        echo '<select name="game[]" id="game">';
        foreach ($games as $game) {
            echo '<option value="' . $game['id'] . '">' . $game['name'] . '</option>';
        }
        echo '</select>';
        echo '<br>';

        echo '<label for="time">Uhrzeit:</label>';
        echo '<select name="time[]" id="time" multiple>';
        foreach ($times as $time) {
            echo '<option value="' . $time['id'] . '">' . $time['time'] . '</option>';
        }
        echo '</select>';
        echo '<br>';

        echo '<label for="name">Name:</label>';
        echo '<input type="text" name="name" id="name">';
        echo '<br>';

        echo '<label for="date">Datum:</label>';
        echo '<input type="date" name="date" id="date">';
        echo '<br>';

        echo '<input type="submit" value="Submit">';
        echo '</form>';
    }public function validateAndSafeData()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //get fields from form
            $day = $_POST['day'];
            $game = $_POST['game'];
            $time = $_POST['time'];
            $name = $_POST['name'];
            $date = $_POST['date'];

            //validate
            if (empty($day) || empty($game) || empty($time) || empty($name) || empty($date)) {
                echo 'Alle Felder müssen ausgefüllt sein';
                return;
            }
            //save data to database
            $stmt = $this->db->conn->prepare("INSERT INTO overview(day_id, game_id, time_id, name, datum)
                 VALUES (:day, :game, :time, :name, :date)");
            $stmt->bindParam(':day', $day);
            $stmt->bindParam(':game', implode(",", $game));
            $stmt->bindParam(':time', implode(",", $time));
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':date', $date);

            $stmt->execute();

            echo "Daten erfolgreich gespeichert!";

        }
    }
}
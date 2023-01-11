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
        echo '<select name="game[]" id="game" multiple>';
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

        echo '<label for="datum">Datum:</label>';
        echo '<input type="date" name="datum" id="datum">';
        echo '<br>';

        echo '<input type="submit" value="Submit">';
        echo '</form>';


    }
}
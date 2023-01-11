<?php

class OverviewTable
{
    private $db;

    /**
     * @param $db
     */
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function generateTable()
    {
        $stmt = $this->db->conn->prepare("SELECT days.name as Tag, DATE_FORMAT(datum, '%d.%m.%Y') as Datum, GROUP_CONCAT(time.time) as Uhrzeit, overview.name as Name, games.name as Spiel
                                            FROM days,games,overview,time
                                            WHERE day_id = days.id AND time_id = time.id AND game_id = games.id");

        $stmt->execute();

        $overviews = $stmt->fetchAll();
        echo '<pre>';
        print_r($overviews);
        echo '</pre>';
        if (count($overviews) > 0) {
            echo '<table>';
            echo '<tr>';
            echo '<th>Tag</th>';
            echo '<th>Datum</th>';
            echo '<th>Uhrzeit</th>';
            echo '<th>Name</th>';
            echo '<th>Spiel</th>';
            echo '</tr>';

            foreach ($overviews as $overview) {
                echo '<tr>';
                echo '<td>'. $overview['Tag'] . '</td>';
                echo '<td>'. $overview['Datum'] . '</td>';
                echo '<td>'. $overview['Uhrzeit'] . '</td>';
                echo '<td>'. $overview['Name'] . '</td>';
                echo '<td>'. $overview['Spiel'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "No Data found";
        }
    }

}
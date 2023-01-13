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
        /*$stmt = $this->db->conn->prepare("SELECT days.name as Tag, DATE_FORMAT(datum, '%d.%m.%Y') as Datum, times as Uhrzeit,
                                            overview.name as Name, games.name as Spiel
                                            FROM days,games,overview,times
                                            WHERE day_id = days.id AND game_id = games.id");*/
        $stmt = $this->db->conn->prepare("SELECT d.name as Tag, DATE_FORMAT(datum, '%d.%m.%Y') as Datum,
                                            times as Uhrzeit,
                                            overview.name as Name,
                                            g.name as Spiel
                                            FROM overview
                                             join days d on d.id = overview.day_id
                                             join games g on g.id = overview.game_id");

        $stmt->execute();

        $overviews = $stmt->fetchAll();

        if (count($overviews) > 0) {
            echo '<table>' .
                '<tr>' .
                '<th>Tag</th>' .
                '<th>Datum</th>' .
                '<th>Uhrzeit</th>' .
                '<th>Name</th>' .
                '<th>Spiel</th>' .
                '</tr>';

            foreach ($overviews as $overview) {
                echo '<tr>' .
                    '<td>' . $overview['Tag'] . '</td>' .
                    '<td>' . $overview['Datum'] . '</td>' .
                    '<td>' . $overview['Uhrzeit'] . '</td>' .
                    '<td>' . $overview['Name'] . '</td>' .
                    '<td>' . $overview['Spiel'] . '</td>' .
                    '</tr>';
            }
            echo '</table>';
        } else {
            echo "No Data found";
        }
    }

}
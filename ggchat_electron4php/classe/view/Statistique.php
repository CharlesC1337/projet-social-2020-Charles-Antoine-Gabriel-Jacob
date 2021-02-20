<?php
namespace GGChat\classe;

use GGChat\classe\Page;
use GGChat\classe\dao\StatistiqueDAO;
use GGChat\includes\Dbh;
use PDO;

class Statistique extends Page
{
    public $title;

    public function __construct() // Constructeur demandant 2 paramètres
    {
        parent::__construct();

        $this->title= 'Statistique';
    }
    
    public function listerContenu()
    {
        $stringGroup = "";
        $stringLabel = "";

        $statistiqueDAO = new StatistiqueDAO();
        $listeContenuGroup = $statistiqueDAO->getNombreMsgGroup();

        foreach($listeContenuGroup as $resultat)
        {
            $listeContenuLabel = $statistiqueDAO->getListeContenuLabel($resultat);
            $stringGroup.="'".$resultat["nombre"]."',";
            $stringLabel.="'".$listeContenuLabel["groupe_nom"]."',";
        }

        //$this->doc.='<a>test</a>';

        /*echo $resultat["groupe_fkey"];
        echo $resultat["nombre"];
        $this->doc.='<ul>';*/
        $this->doc.='<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
        <h1 style="text-align: center; color: white;">Statistique</h1>
        <h2 style="text-align: center; color: white;">Nombre de messages par groupe de discussion</h2>
        <div class="chart-container" style="position: relative; height:20vh; width: 100%; text-align:center">
              <canvas id="graphique" style="display: inline;" ></canvas>
        </div>
        <script>
            var donnees = ['.$stringGroup.'];
            var ctx = document.getElementById("graphique").getContext("2d");
            var chart = new Chart(ctx, {
          // The type of chart we want to create
          type: "doughnut",

          // The data for our dataset
          data: {
              labels: ['.$stringLabel.'],
              datasets: [{
                  label: "My First dataset",
                  backgroundColor: ["rgba(4, 199, 82)","rgba(4, 193, 199, 0.9)", "rgba(255, 206, 86, 0.9)"],
                  borderColor: "rgb(0, 0, 0)",
                  data: donnees
              }]
          },

          // Configuration options go here
          options: {}
          });
          </script>';
    }
}
?>
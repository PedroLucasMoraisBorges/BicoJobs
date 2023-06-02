<?php
namespace Pi\Bicojobs\Model;
use Pi\Bicojobs\Model\User;
require "../autoload.php";

use PDO;
class Grafico{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function setServicosUser(User $usuario) : array
    {
        $id_user = $usuario->getId();
        $sql = "SELECT * FROM servicosfeitos WHERE id_usuario = '$id_user'";
        $sql_query = $this->pdo->query($sql);
        
        $meses = array(
            "quantidade" => [0,0,0,0,0,0,0,0,0,0,0,0],
            "valor" => [0.0 ,0.0 ,0.0 ,0.0 ,0.0 ,0.0 ,0.0 ,0.0 ,0.0 ,0.0 ,0.0 ,0.0 ]
        );
        while($row = $sql_query->fetch(PDO::FETCH_ASSOC)){
            $data = $row['dt'];
            $valor = $row['valor'];

            $mes = $data[5].$data[6];
            
            if($mes == "01"){
                $meses['quantidade'][0] += 1;
                $meses['valor'][0] += $valor;
            }
            else if($mes == "02"){
                $meses['quantidade'][1] += 1;
                $meses['valor'][1] += $valor;
            }
            else if($mes == "03"){
                $meses['quantidade'][2] += 1;
                $meses['valor'][2] += $valor;
            }
            else if($mes == "04"){
                $meses['quantidade'][3] += 1;
                $meses['valor'][3] += $valor;
            }
            else if($mes == "05"){
                $meses['quantidade'][4] += 1;
                $meses['valor'][4] += $valor;
            }
            else if($mes == "06"){
                $meses['quantidade'][5] += 1;
                $meses['valor'][5] += $valor;
            }
            else if($mes == "07"){
                $meses['quantidade'][6] += 1;
                $meses['valor'][6] += $valor;
            }
            else if($mes == "08"){
                $meses['quantidade'][7] += 1;
                $meses['valor'][7] += $valor;
            }
            else if($mes == "09"){
                $meses['quantidade'][8] += 1;
                $meses['valor'][8] += $valor;
            }
            else if($mes == "10"){
                $meses['quantidade'][9] += 1;
                $meses['valor'][9] += $valor;
            }
            else if($mes == "11"){
                $meses['quantidade'][10] += 1;
                $meses['valor'][10] += $valor;
            }
            else if($mes == "12"){
                $meses['quantidade'][11] += 1;
                $meses['valor'][11] += $valor;
            }
        }

        return $meses;
    }


    public function setNotasUser(User $usuario){
        $id_user = $usuario->getId();
        $sql = "SELECT notas FROM notas WHERE id_usuario = '$id_user'";
        $sql_query = $this->pdo->query($sql);
        
        $notas = array(
            "0" => 0,
            "1" => 0,
            "2" => 0,
            "3" => 0,
            "4" => 0,
            "5" => 0
        );

        while($nota = $sql_query->fetch(PDO::FETCH_ASSOC)){
            if($nota['notas'] == 1){
                $notas["1"] += 1;
            }
            else if($nota['notas'] == 2){
                $notas["2"] += 1;
            }
            else if($nota['notas'] == 3){
                $notas["3"] += 1;
            }
            else if($nota['notas'] == 4){
                $notas["4"] += 1;
            }
            else{
                $notas["5"] += 1;
            }
        }

        return $notas;
    }


    public function retornarNotas($notas){
        echo "
        <script>
            var ctx = document.getElementById('total_notas');

            // Tipos de dados e opções do gráfico
            var chartGraph = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [
                '1', '2', '3', '4', '5',
                ],
                datasets: [{
                data: [".$notas['1'].",".$notas['2'].",".$notas['3'].",".$notas['4'].",".$notas['5']."],
                backgroundColor: [
                    '#ff4040',
                    '#ffbc40',
                    '#ffff40',
                    '#4040ff',
                    '#00a000'
                ],
                hoverOffset: 8
                }]
            },
            });
      </script>";
    }


    public function retornarServicosUser($meses)
    {
        echo "
        <script>
            var total_servico = document.getElementById('total_serv');
        
            this.servicosGrafico = new Chart(total_servico , {
                type:'line',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    datasets: [{
                        label: 'Serviços concluídos - 2023',
                        data: [".$meses['quantidade'][0].",".$meses['quantidade'][1].",".$meses['quantidade'][2].",".$meses['quantidade'][3].",".$meses['quantidade'][4].",".$meses['quantidade'][5].",".$meses['quantidade'][6].",".$meses['quantidade'][7].",".$meses['quantidade'][8].",".$meses['quantidade'][9].",".$meses['quantidade'][10].",".$meses['quantidade'][11]."],
                        borderColor: '#0079AD',
                        backgroundColor: '#0079AD75',
                        pointBorderColor: '#0079AD',
                        pointBackgroundColor: '#0079AD',
                        pointHoverBackgroundColor: '#0079AD',
                        pointHoverBorderColor: '#0079AD',
                        pointBorderWidth: 3,
                    }
                ]
                },
                options: {
                    scales: {
                      yAxes: [{
                        ticks: {
                          beginAtZero: true
                        }
                      }]
                    }
                  }
                
            });
        </script>";
    }


    public function retornarServicosValor($meses){
        echo "
        <script>
            var total_valor = document.getElementById('total_valor');

            Chart.defaults.global.defaultFontColor = '#000';
            Chart.defaults.global.defaultFontSize = 12;
            this.ValorGrafico = new Chart(total_valor , {
                type:'line',
                data: {
                    labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                    datasets: [{
                        label: 'Valor Ganho - 2023',
                        data: [".$meses['valor'][0].",".$meses['valor'][1].",".$meses['valor'][2].",".$meses['valor'][3].",".$meses['valor'][4].",".$meses['valor'][5].",".$meses['valor'][6].",".$meses['valor'][7].",".$meses['valor'][8].",".$meses['valor'][9].",".$meses['valor'][10].",".$meses['valor'][11]."],
                        borderColor: '#11866F',
                        backgroundColor: '#11866F75',
                        pointBorderColor: '#11866F',
                        pointBackgroundColor: '#11866F',
                        pointHoverBackgroundColor: '#11866F',
                        pointHoverBorderColor: '#11866F',
                        pointBorderWidth: 3,
                        scaleFontColor: '#FFFFFF'
                    }
                    ]
                }
                
            });
        </script>";
    }
}
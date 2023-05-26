var total_servico = document.getElementsByClassName("total_serv");
document.querySelector
var teste =  document.getElementById

total_servico.width = 500

var mes = document.currentScript.getAttribute("data-attr1");

console.log(mes);

var data = "<?php echo $_SESSION['id_contato']; ?>"

var grafico = new Chart(total_servico , {
    type:'line',
    data: {
        labels: ["Jan", "Fev", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            label: "Taxa de cliques - 2018",
            data: [5,10,5,14,20,15,6,14,8,12,15,5,10],
            borderWidth: 6,
            borderColor: 'blue',
            backgroundColor: 'transparent',
        }]
    }
})
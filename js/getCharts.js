var doughnutData1 = [{
    value: 300,
    color: "#F7464A",
    highlight: "#FF5A5E",
    label: "Red"
  }, {
    value: 50,
    color: "#46BFBD",
    highlight: "#5AD3D1",
    label: "Green"
  }, {
    value: 100,
    color: "#FDB45C",
    highlight: "#FFC870",
    label: "Yellow"
  }, {
    value: 40,
    color: "#949FB1",
    highlight: "#A8B3C5",
    label: "Grey"
  }, {
    value: 120,
    color: "#4D5360",
    highlight: "#616774",
    label: "Dark Grey"
  }

];

var doughnutData2 = [{
    value: 300,
    color: "#F7464A",
    highlight: "#FF5A5E",
    label: "Red"
  }, {
    value: 50,
    color: "#46BFBD",
    highlight: "#5AD3D1",
    label: "Green"
  }, {
    value: 100,
    color: "#FDB45C",
    highlight: "#FFC870",
    label: "Yellow"
  }, {
    value: 40,
    color: "#949FB1",
    highlight: "#A8B3C5",
    label: "Grey"
  }, {
    value: 120,
    color: "#4D5360",
    highlight: "#616774",
    label: "Dark Grey"
  }

];

var doughnutData3 = [{
    value: 300,
    color: "#F7464A",
    highlight: "#FF5A5E",
    label: "Red"
  }, {
    value: 50,
    color: "#46BFBD",
    highlight: "#5AD3D1",
    label: "Green"
  }, {
    value: 100,
    color: "#FDB45C",
    highlight: "#FFC870",
    label: "Yellow"
  }, {
    value: 40,
    color: "#949FB1",
    highlight: "#A8B3C5",
    label: "Grey"
  }, {
    value: 120,
    color: "#4D5360",
    highlight: "#616774",
    label: "Dark Grey"
  }

];

window.onload = function() {
  var ctx1 = document.getElementById("chart-devis").getContext("2d");
  var ctx2 = document.getElementById("chart-facture").getContext("2d");
  var ctx3 = document.getElementById("chart-bons").getContext("2d");
  window.myDoughnut1 = new Chart(ctx1).Doughnut(doughnutData1, {
    responsive: true
  })
  window.myDoughnut2 = new Chart(ctx2).Doughnut(doughnutData2, {
    responsive: true
  })
  window.myDoughnut3 = new Chart(ctx3).Doughnut(doughnutData3, {
    responsive: true
  });
};

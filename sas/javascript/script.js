
const ctx1 = document.getElementById('myChart').getContext('2d');
    var currentTime = new Date();
    var mydata = {
        type: 'line',
        data: {
            labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            datasets: [{
                label: 'Data',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 5
            }],
           
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                 
                               
                  },
               
                  xAxes: [{
                    
                                      
          type: 'time',
          time: {
            displayFormats: {
              minute: 'h:mm a'
            }
          }
        }]
            }
        }
    }
    
    
    
    const myChart1 = new Chart(ctx1,mydata) ;
    
    let lastdata;
    var i=0;
    setInterval(() => {
    i++;
    var w = Math.random()
    var w1 = Math.random()
    var w2 = Math.random()
    var w3 = Math.random()
    var w4 = Math.random()
    var w5 = Math.random()
    mydata.data.datasets[0].data = [w,w1,w2,w3,w4,w5]
    
  lastData = mydata.data.datasets[0].data.slice(-1)[0];
    myChart1.update()
    
    }, 10000);


    const MAX_ROWS = 4; // Maximum number of rows to display in the table

    function generateRandomData() {
      const now = new Date();
      const date = `${now.getMonth()+1}/${now.getDate()}/${now.getFullYear().toString().substr(-2)}`;
      const time = now.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
      const data = lastData.toFixed(2);
      return [date, time, data];
    }
    
    function updateTable() {
      const tableBody = document.getElementById("data-table");
      if (tableBody.rows.length >= MAX_ROWS) {
        tableBody.deleteRow(-1); // Remove the oldest row
      }
      const newRow = tableBody.insertRow(0); // Insert the new row at the top
      const [date, time, data] = generateRandomData();
      const dateCell = newRow.insertCell(0);
      const timeCell = newRow.insertCell(1);
      const typeCell = newRow.insertCell(2);
      const dataCell = newRow.insertCell(3);
      const statusCell = newRow.insertCell(4);
      const options = ['LOW', 'MODERATE', 'STABLE', 'HIGH'];
const randomIndex = Math.floor(Math.random() * options.length);
const randomOption = options[randomIndex];

      dateCell.innerHTML = date;
      timeCell.innerHTML = time;
      typeCell.innerHTML = "Soil Moisture";
      dataCell.innerHTML = data;
      statusCell.innerHTML = randomOption;

      switch (randomOption) {
        case 'LOW':
          newRow.classList.add('status-low');
          break;
        case 'MODERATE':
          newRow.classList.add('status-moderate');
          break;
        case 'STABLE':
          newRow.classList.add('status-stable');
          break;
        case 'HIGH':
          newRow.classList.add('status-high');
          break;
        default:
          break;
      }
    }
    
    setInterval(updateTable, 10000);
    










    //

    const rand = () =>
  Array.from({ length: 10 }, () => Math.floor(Math.random() * 100));

let data = rand();

function addData(chart, data) {
  chart.data.datasets.forEach(dataset => {
    let data = dataset.data;
    const first = data.shift();
    data.push(first);
    dataset.data = data;
  });

  chart.update();
}

//chart 2
var ctx = document.getElementById("myChart2").getContext("2d");
var myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: ["00:00 AM", "01:00 AM", "02:00 AM", "03:00 AM", "04:00 AM", "05:00 AM", "06:00 AM", "07:00 AM", "01:00 AM", "09:00 AM"],
    datasets: [
      {
        label: "Sensor 1",
        data: rand(),
        backgroundColor: ["rgba(113, 88, 203, .15)"],
        borderColor: ["rgba(113, 88, 203, 1)"],
        borderWidth: 3,
        fill: "start"
      },
      {
        label: "Sensor 2",
        data: rand(),
        backgroundColor: ["rgba(161, 201, 249, .15)"],
        borderColor: ["rgba(161, 201, 249, 1)"],
        borderWidth: 3,
        fill: "start"
      },
      {
        label: "Sensor 3",
        data: rand(),
        backgroundColor: ["rgba(255, 17, 0, .15)"],
        borderColor: ["rgba(202, 0, 41, 1)"],
        borderWidth: 3,
        fill: "start"
      }
    ]
  },
  options: {
    animation: {
      duration: 250,
    },
    tooltips: {
      intersect: false,
      backgroundColor: "rgba(113, 88, 203, 1)",
      titleFontSize: 16,
      titleFontStyle: "400",
      titleSpacing: 4,
      titleMarginBottom: 8,
      bodyFontSize:	12,
      bodyFontStyle:	'400',
      bodySpacing: 4,
      xPadding: 8,
      yPadding: 8,
      cornerRadius: 4,
      displayColors: false,
      callbacks: {
        title: function (t, d) {
          const o = d.datasets.map((ds) => ds.data[t[0].index] + "%")
          
          return o.join(', ');
        },
        label: function (t, d) {
          return d.labels[t.index];
        }
      }
    },
    title: {
      text: "Public Bandwidth",
      display: true
    },
    maintainAspectRatio: true,
    spanGaps: false,
    elements: {
      line: {
        tension: 0.2
      }
    },
    plugins: {
      filler: {
        propagate: false
      }
    },
    scales: {
      xAxes: [
        {
          ticks: {
            autoSkip: false,
            maxRotation: 0
          }
        }
      ]
    }
  }
});

setInterval(() => addData(myChart), 10000);

// realtime data

var ctx = document.getElementById("myChart2").getContext("2d");
var myChart = new Chart(ctx, {
  type: "line",
  data: {
    labels: ["00:00 AM", "01:00 AM", "02:00 AM", "03:00 AM", "04:00 AM", "05:00 AM", "06:00 AM", "07:00 AM", "01:00 AM", "09:00 AM"],
    datasets: [
      {
        label: "Sensor 1",
        data: rand(),
        backgroundColor: ["rgba(113, 88, 203, .15)"],
        borderColor: ["rgba(113, 88, 203, 1)"],
        borderWidth: 3,
        fill: "start"
      },
      {
        label: "Sensor 2",
        data: rand(),
        backgroundColor: ["rgba(161, 201, 249, .15)"],
        borderColor: ["rgba(161, 201, 249, 1)"],
        borderWidth: 3,
        fill: "start"
      },
      {
        label: "Sensor 3",
        data: rand(),
        backgroundColor: ["rgba(255, 17, 0, .15)"],
        borderColor: ["rgba(202, 0, 41, 1)"],
        borderWidth: 3,
        fill: "start"
      }
    ]
  },
  options: {
    animation: {
      duration: 250
    },
    tooltips: {
      intersect: false,
      backgroundColor: "rgba(113, 88, 203, 1)",
      titleFontSize: 16,
      titleFontStyle: "400",
      titleSpacing: 4,
      titleMarginBottom: 8,
      bodyFontSize:	12,
      bodyFontStyle:	'400',
      bodySpacing: 4,
      xPadding: 8,
      yPadding: 8,
      cornerRadius: 4,
      displayColors: false,
      callbacks: {
        title: function (t, d) {
          const o = d.datasets.map((ds) => ds.data[t[0].index] + "%")
          
          return o.join(', ');
        },
        label: function (t, d) {
          return d.labels[t.index];
        }
      }
    },
    title: {
      text: "Public Bandwidth",
      display: true
    },
    maintainAspectRatio: true,
    spanGaps: false,
    elements: {
      line: {
        tension: 0.2
      }
    },
    plugins: {
      filler: {
        propagate: false
      }
    },
    scales: {
      xAxes: [
        {
          ticks: {
            autoSkip: false,
            maxRotation: 0
          }
        }
      ]
    }
  }
});

setInterval(() => addData(myChart), 1000);

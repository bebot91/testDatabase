
  $(document).ready(function(){
    TESTER = document.getElementById('tester');
    
    var data = [
      {
        x: [],
        y: [],
        type: 'scatter'
      }
    ];
    var layout = {
      autosize: false,
      showlegend: false,
      showgrid: false,
      showline: false,
      width: 150,
      height: 140,
      margin: {
        l: 8,
        r: 8,
        b: 8,
        t: 8,
        pad: 10
      },
      paper_bgcolor: '#755C86',
      plot_bgcolor: '#6600CC'
    };
  
      Plotly.newPlot('chart".$x."', data, layout);


      var cnt = 0;
      var interval = setInterval(function() {
        $.get( 'http://localhost:80/CRYBOT/Include/PHP/api/getCoindata.php/".$Coindata[$x]["ID_System"]."/".$Coindata[$x]["KursBez"]."', function( data ) {
          var datas = JSON.parse(data);
          console.log(datas);
          var d2 = new Array();
          var d1 = new Array();

          for (var i = 20; i > 0 ; i -- ){
            
            d2.push(datas.datarow1[i]);
            d1.push(i);
        }

        Plotly.update('chart".$x."', {
          y:        [d2],
          x:        [d1]

        }, [0])
        
        });

        if(++cnt === 100) clearInterval(interval);
      }, 900);


  });
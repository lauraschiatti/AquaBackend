
$(document).ready(function () {
    Highcharts.setOptions({
        global: {
            useUTC: true
        }
    });

    $.getJSON('/home/graph', function(object) {
        console.log(object);
        var date = new Array();
        var value = new Array();

        var unit = object["unit"];
        var type = object["type"];
        var sensorbynode_id = object["sensorbynode_id"];
        var node_id = object["node_id"];
        var data = object["data"];
        var count = data.length;



        for(var i=0; i<count; i++){
            var year = data[i]["time"][0]+data[i]["time"][1]+data[i]["time"][2]+data[i]["time"][3];
            var month = data[i]["time"][4]+data[i]["time"][5];
            var day = data[i]["time"][6]+data[i]["time"][7];
            var hours = data[i]["time"][8]+data[i]["time"][9];
            var minutes = data[i]["time"][10]+data[i]["time"][11];
            var seconds = data[i]["time"][12]+data[i]["time"][13];

            var date_obj = new Date(Date.UTC(year, month, day, hours, minutes, seconds));
            date.push(date_obj);
            //date.push(parseInt(data[i]["time"]));
            value.push(parseFloat(data[i]["value"]));
        }

        $('#graph').highcharts({
            title: {
                text: 'Sensor Taken Data',
                x: -20 //center
            },
            subtitle: {
                text: 'Source: aquapp.utbweb.co',
                x: -20
            },
            xAxis: {
                categories: date
            },
            yAxis: {
                title: {
                    text: type+'('+unit+')'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: '('+unit+')'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Sensor: '+ sensorbynode_id+' ( '+node_id+' ) ',
                data: value
            }]
        });
    });
});

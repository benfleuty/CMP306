function get_last_10_temps(pin) {
    $.ajax({
        type: "POST",
        url: '../controller/get-temperature-last-10.php',
        data: {
            pin: pin
        },
        success: function (response) {
            let json = JSON.parse(response);

            if (json["status"] !== "success") {
                console.error("There was an error getting the temperature data!");
            }

            let readings = json["readings"];

            let output = "";

            let list = null;

            if (pin === 8) {
                list = $(".historical-temps.historical-temps-internal");
            } else if (pin === 9) {
                list = $(".historical-temps.historical-temps-external");
            } else {
                console.error("Processing error for displaying temps");
                return;
            }

            list.html("");

            for (let i = 0; i < readings.length; i++) {
                let datetime = readings[i]["dttm"].split(' ');
                let date = datetime[0];
                let time = datetime[1];
                let temp = "<strong>" + readings[i]["value"] + "</strong>";
                let payload = date + " at " + time + ": " + temp;

                list.append("<li class='list-group-item celcius'>" + payload + "</li>\n");
            }
        },
        error: function (a, b, c) {
            console.log(c);
        }
    });
}

let internalReadings = [];
let externalReadings = [];

function get_last_temps_24h(pin, graph = true) {
    $.ajax({
        type: "POST",
        url: '../controller/get-temperature-last-24h.php',
        data: {
            pin: pin
        },
        success: function (response) {
            let json = JSON.parse(response);
            if (json["status"] !== "success") {
                console.error("There was an error getting the temperature data!");
                return;
            }

            const readings = json["readings"];

            if (pin === 8) {
                internalReadings = readings;
            } else if (pin === 9) {
                externalReadings = readings;
            } else {
                console.error("Error with readings");
                return;
            }

            if (!graph) return;
            create_graph(pin, readings);
        },
        error: function (a, b, c) {
            console.log(c);
        }
    });
}

function create_graph(pin, readings) {

    let id = null;

    if (pin === 8) {
        id = "internalChart";
    } else if (pin === 9) {
        id = "externalChart";
    } else {
        console.error("Bad id for graph rendering");
        return;
    }


    const ctx = document.getElementById(id).getContext('2d');
    let timeLabels = [];
    for (let i = 0; i < readings.length; i++) {
        timeLabels.push(readings[i]["dttm"]);
    }

    let data = [];
    for (let i = 0; i < readings.length; i++) {
        data.push(readings[i]["value"]);
    }
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: timeLabels,
            datasets: [{
                label: 'Temperature',
                data: data,
                borderColor: [
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1,
                tension:0.1
            }]
        }
    });
}

$(function () {
    get_last_10_temps(8);
    get_last_10_temps(9);

    get_last_temps_24h(8);
    get_last_temps_24h(9);
})
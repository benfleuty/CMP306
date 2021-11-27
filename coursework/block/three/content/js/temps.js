function get_last_10_temps(pin) {
    $.ajax({
        type: "POST",
        url: '../controller/gettemperaturedata.php',
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

            if(pin === 8){
                list = $(".historical-temps.historical-temps-internal");
            } else if (pin === 9){
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
                let payload = date + " at " + time +": " + temp;

                list.append("<li class='list-group-item celcius'>" + payload + "</li>\n");
            }
        },
        error: function (a, b, c) {
            console.log(c);
        }
    });
}

$(function () {
    get_last_10_temps(8);
    get_last_10_temps(9);
})
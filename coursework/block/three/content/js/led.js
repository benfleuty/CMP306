$(function () {
    let redPin = 5;
    let greenPin = 7;

    let ledOn = 1;
    let ledOff = 0;

    let redLedOnBtn = $("#btnRedOn");
    let redLedOffBtn = $("#btnRedOff");
    let greenLedOnBtn = $("#btnGreenOn");
    let greenLedOffBtn = $("#btnGreenOff");

    hide(redLedOnBtn);
    hide(redLedOffBtn);
    hide(greenLedOnBtn);
    hide(greenLedOffBtn);

    function hide(element) {
        $(element).disabled = true;
        $(element).hide();
    }

    function show(element) {
        $(element).disabled = false;
        $(element).show();
    }

    $(".btn-led").on("click", function (e) {
        e.preventDefault();

        ledButtonClicked(e.target.id);
    });

    function ledButtonClicked(id) {
        let clicked = $(`#${id}`);

        let action = "";

        switch (id) {
            case "btnRedOn":
                ajaxGetSendLedCommand(redPin, ledOn);
                break;
            case "btnRedOff":
                ajaxGetSendLedCommand(redPin, ledOff);
                break;
            case "btnGreenOn":
                ajaxGetSendLedCommand(greenPin, ledOn);
                break;
            case "btnGreenOff":
                ajaxGetSendLedCommand(greenPin, ledOff);
                break;
        }
    }

    function ajaxGetSendLedCommand(pin, state) {
        let url = `https://agent.electricimp.com/nXgBWwvudB8w`;
        $.ajax({
            type: "get",
            url: url,
            data: {
                pin: pin,
                state: state
            },
            success: function () {
                check_led(pin);
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    }

    function check_led(pin) {
        let url = 'https://agent.electricimp.com/nXgBWwvudB8w';
        $.ajax({
            type: "get",
            url: url,
            data: {
                pin: pin
            },
            success: function (response) {
                let state = JSON.parse(response)["value"];
                switch (state) {
                    case 0:
                        ledIsOff(pin);
                        break;
                    case 1:
                        ledIsOn(pin);
                        break;
                    default:
                        console.error("Error getting led state!");
                        console.error(response)
                }
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    }

    function ledIsOff(pin) {
        if (pin === 5) {
            redIsOff();
        } else if (pin === 7) {
            greenIsOff();
        }
    }

    function redIsOn() {
        hide(redLedOnBtn);
        show(redLedOffBtn);
    }

    function redIsOff() {
        hide(redLedOffBtn);
        show(redLedOnBtn);
    }

    function greenIsOn() {
        hide(greenLedOnBtn);
        show(greenLedOffBtn);
    }

    function greenIsOff() {
        hide(greenLedOffBtn);
        show(greenLedOnBtn);
    }

    function ledIsOn(pin) {
        if (pin === 5) {
            redIsOn();
        } else if (pin === 7) {
            greenIsOn();
        }
    }

    check_led(5);
    check_led(7);

    function check_temp(temp) {
        let url = 'https://agent.electricimp.com/nXgBWwvudB8w';
        $.ajax({
            type: "get",
            url: url,
            data: {
                temp: temp
            },
            success: function (response) {
                let res = JSON.parse(response);

                let currtemp = res["value"];
                $(".temp-" + temp).html(currtemp);
            },
            error: function (a, b, c) {
                console.log(c);
            }
        });
    }

    check_temp("internal");
    check_temp("external");
})
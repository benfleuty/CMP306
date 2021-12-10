<?php ?>

<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css'>
    <link rel='stylesheet' href='../content/css/index.css'>

    <script src='https://code.jquery.com/jquery-3.3.1.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js'></script>
    <script src='../content/js/led.js'></script>
    <script src='../content/js/temps.js'></script>
</head>
<body>
<header>
    <div class="jumbotron mb-0">
        <h1 class="display-3">Block Three</h1>
        <p class="lead">Internet of Things</p>
        <hr class="my-2">
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="../report" role="button">View the report</a>
        </p>
    </div>
    <nav class="navbar navbar-expand navbar-light bg-light my-0">
        <div class="nav navbar-nav">
            <a class='nav-item nav-link' href='../../one'>Block One</a>
            <a class='nav-item nav-link' href='../../two'>Block Two</a>
            <a class="nav-item nav-link active" href="../">Block Three <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="../../four">Block Four</a>
        </div>
    </nav>
</header>

<section>
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Red LED</h3>
                    <button class="btn btn-primary btn-led" id="btnRedOn" name="on">Turn on</button>
                    <button class="btn btn-danger btn-led" id='btnRedOff' name="off">Turn off</button>
                </div>
            </div>
        </div>
        <div class='col-sm-6'>
            <div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>Green LED</h3>
                    <button class='btn btn-success btn-led' id='btnGreenOn' name='on'>Turn on</button>
                    <button class='btn btn-danger btn-led' id='btnGreenOff' name='off'>Turn off</button>
                </div>
            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-6'>
            <div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>Internal temperature</h3>
                    <p class='text-center'>
                        <span class='temp-internal-temp celcius'>getting temp</span>
                        <br/>
                        <span class='temp-update-time temp-internal-time text-muted'>updating now</span>
                    </p>
                    <div class='temps-options'>
                        <div id='internalTempsAccordion' role='tablist' aria-multiselectable='true'>
                            <div class='card'>
                                <div class='card-header' role='tab' id='internalTempListHeader'>
                                    <h5 class='mb-0'>
                                        <a data-toggle='collapse' data-parent='#internalTempsAccordion'
                                           href='#internalTempContent'
                                           aria-expanded='true' aria-controls='internalTempContent'>
                                            Historical Temperatures
                                        </a>
                                    </h5>
                                </div>
                                <div id='internalTempContent' class='collapse in' role='tabpanel'
                                     aria-labelledby='internalTempListHeader'>
                                    <div class='card-body'>
                                        <ul class='historical-temps historical-temps-internal list-group list-group-flush'>
                                            <li>getting historical temperatures...</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class='card'>
                                <div class='card-header' role='tab' id='internalTempGraphHeader'>
                                    <h5 class='mb-0'>
                                        <a data-toggle='collapse' data-parent='#internalTempsAccordion'
                                           href='#internalTempGraphContent'
                                           aria-expanded='true' aria-controls='section2ContentId'>
                                            Graphed Temperatures (24h)
                                        </a>
                                    </h5>
                                </div>
                                <div id='internalTempGraphContent' class='collapse in' role='tabpanel'
                                     aria-labelledby='internalTempGraphHeader'>
                                    <div class='card-body'>
                                        <div class='internal-temperature-graph'>
                                            <canvas id='internalChart' width='500' height='500'></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class='col-lg-6'>
            <div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>External Temperature</h3>
                    <p class='text-center'>
                        <span class='temp-external-temp celcius'>getting temp</span>
                        <br/>
                        <span class='temp-update-time temp-external-time text-muted'>updating now</span>
                    </p>
                    <div class='temps-options'>
                        <div id='externalTempsAccordion' role='tablist' aria-multiselectable='true'>
                            <div class='card'>
                                <div class='card-header' role='tab' id='externalTempListHeader'>
                                    <h5 class='mb-0'>
                                        <a data-toggle='collapse' data-parent='#externalTempsAccordion'
                                           href='#externalTempContent'
                                           aria-expanded='true' aria-controls='externalTempContent'>
                                            Historical Temperatures
                                        </a>
                                    </h5>
                                </div>
                                <div id='externalTempContent' class='collapse in' role='tabpanel'
                                     aria-labelledby='externalTempListHeader'>
                                    <div class='card-body'>
                                        <ul class='historical-temps historical-temps-external list-group list-group-flush'>
                                            <li>getting historical temperatures...</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class='card'>
                                <div class='card-header' role='tab' id='externalTempGraphHeader'>
                                    <h5 class='mb-0'>
                                        <a data-toggle='collapse' data-parent='#externalTempsAccordion'
                                           href='#externalTempGraphContent'
                                           aria-expanded='true' aria-controls='section2ContentId'>
                                            Graphed Temperatures (24h)
                                        </a>
                                    </h5>
                                </div>
                                <div id='externalTempGraphContent' class='collapse in' role='tabpanel'
                                     aria-labelledby='externalTempGraphHeader'>
                                    <div class='card-body'>
                                        <div class='external-temperature-graph'>
                                            <canvas id='externalChart' width='500' height='500'></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class='row'>
        <div class='col-lg-6'>
            <div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>Agent Code</h3>
                    <div class='agent-code'>
                        <div id='agentCodeAccordion' role='tablist' aria-multiselectable='true'>
                            <div class='card'>
                                <div class='card-header' role='tab' id='agentCodeAccordion'>
                                    <h5 class='mb-0'>
                                        <a data-toggle='collapse' data-parent='#agentCodeAccordion'
                                           href='#agentCodeContent'
                                           aria-expanded='true' aria-controls='agentCodeContent'>
                                            View agent code
                                        </a>
                                    </h5>
                                </div>
                                <div id='agentCodeContent' class='collapse in' role='tabpanel'
                                     aria-labelledby='agentCodeContentListHeader'>
                                    <div class='card-body'>
                                        <code class='device-code-display'>
                                            <embed src='../content/imp/agent.txt'>
                                        </code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class='col-lg-6'>
            <div class='card'>
                <div class='card-body'>
                    <h3 class='card-title'>Device Code</h3>
                    <div class='device-code'>
                        <div id='deviceCodeAccordion' role='tablist' aria-multiselectable='true'>
                            <div class='card'>
                                <div class='card-header' role='tab' id='deviceCodeAccordion'>
                                    <h5 class='mb-0'>
                                        <a data-toggle='collapse' data-parent='#deviceCodeAccordion'
                                           href='#deviceCodeContent'
                                           aria-expanded='true' aria-controls='deviceCodeContent'>
                                            View device code
                                        </a>
                                    </h5>
                                </div>
                                <div id='deviceCodeContent' class='collapse in' role='tabpanel'
                                     aria-labelledby='deviceCodeContentListHeader'>
                                    <div class='card-body'>
                                        <code class='device-code-display'><embed src="../content/imp/device.txt"></code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
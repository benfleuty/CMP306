<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Block Two Report</title>
    <link rel="stylesheet" href="/~1900040/cmp306/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bitter:400,700">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Article-Clean.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Article-List.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Header-Blue.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Header-Dark.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Projects-Horizontal.css">
    <link rel="stylesheet" href="/~1900040/cmp306/assets/css/Team-Boxed.css">
    <link rel="stylesheet" href="../content/css/report.css">
</head>

<body>
<header class="header-blue">
    <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
        <div class="container-fluid"><a class="navbar-brand" href="#">Ben Fleuty |&nbsp;CMP 306<br>Dynamic Web
                Development</a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span
                        class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                                                     data-bs-toggle="dropdown">Block One</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../../../one">Work</a>
                            <a class="dropdown-item" href="../../../one/report">Report</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" aria-expanded="false"
                                                     data-bs-toggle="dropdown">Block Two</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="../../">Work</a>
                            <a class="dropdown-item" href="./">Report</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container hero">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                <h1>Block Two Report</h1><a class="btn btn-light btn-lg action-button" role="button" href="../..">View
                    the work</a>
            </div>
        </div>
    </div>
</header>
<section class="article-clean">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-8 offset-lg-1 offset-xl-2">
                <div class="intro">
                    <h1 class="text-center">User Input & Security</h1>
                    <p class="text-center"><span class="by">by</span> <a href="#">Ben Fleuty</a>
                    </p>
                </div>
                <div class="text">
                    <div>
                        <h2>Overview</h2>
                        <p>
                            The work in this blocks allows for the user to interact with the database through an API.
                            This opens the site to cross-site scripting attacks, and SQL injection. Throughout the site,
                            I have implemented measures to combat these attacks.
                        </p>

                        <h3>SQL Injection</h3>
                        <p>
                            A malicious user can try to inject SQL through forms and get requests since this data is
                            processed by PHP. To combat this I have implemented a couple measures:
                        </p>
                        <h4>
                            GET Requests
                        </h4>
                        <p>
                            When passing data via GET, the first thing I check is that the data is in an expected form.
                            The code below shows how this happens:
                        </p>
                        <pre>$fail = !isset($_GET['id']) || empty($_GET['id']) || !ctype_digit($_GET['id']);</pre>
                        <p>
                            First, I check that the variable that I want to check is set and then flip the value, since
                            I want to know if it is not set. Empty is a cause for failure.
                            Then I check to see if the value is empty. If so, there is a problem.
                            Lastly, I check that the value is not a digit. I do this as I want a true result for fail if
                            the input is not a valid integer.
                        </p>
                        <p>
                            If any of these return true, then an error is shown to the user and the bad data is no
                            longer used.
                        </p>

                        <h4>
                            Forms
                        </h4>
                        <p>
                            When a user enters data through a form, it is processed by PHP. PHP ensures that the data
                            meets any business logic requirements and then sends it to the database through the API. To
                            mitigate SQL injection, the values are bound to the script being ran. This prevents
                            injection as the developer's code is executed and verified on the database. After this has
                            happened, the data is entered into the database. As the script has already executed, any
                            malicious code cannot execute.
                        </p>

                        <h3>
                            Cross-Site Attacks
                        </h3>
                        <p>
                            I am mitigating cross-site attacks by ensuring that anything that is output to the DOM by
                            PHP that may contain any malicious code is made safe first. PHP's htmlspecialchars() ensures
                            that any html tags are not executed by the DOM.
                        </p>
                        <p>
                            For example, getting the following text from a database
                        </p>
                        <pre>
displayed:    nothing will be displayed as the browser will execute the script
source:       &lt;script&gt;window.location.href="www.malicious.site";&lt;/script&gt;
                        </pre>
                        <p>
                            and displaying it without htmlspecialchars() would be executed by the browser. The user
                            would be
                            redirected to another website. This is dangerous as the website is most likely malicious as
                            the
                            code taking users to it has been maliciously entered.
                        </p>
                        <p>
                            In contrast, htmlspecialchars() will alter this code
                        </p>
                        <pre>
displayed:    &lt;script&gt;window.location.href='www.malicious.site';&lt;/script&gt;
source:       &amp;lt;script&amp;gt;window.location.href='www.malicious.site';&amp;lt;/script&amp;gt;
                        </pre>
                        <p>
                            The tag brackets have been altered to their alphanumeric values. These are understood by the
                            browser and displayed as the correct character. As the values are not tags, they are not
                            processed, therefore stopping any malicious code being run using this attack vector.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="footer-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-6 item text">
                <h3>Ben Fleuty | 1900040</h3>
                <p>This website is for educational purposes only. Content may be subject to copyright.</p>
            </div>
        </div>
        <p class="copyright">Ben Fleuty and whoever owns the stuff I'm... borrowing © 2021</p>
    </div>
</footer>
<script src="/~1900040/cmp306/assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
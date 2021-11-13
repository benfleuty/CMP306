<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Block One Report</title>
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
                            <a class="dropdown-item" href="../coursework/block/one">Work</a>
                            <a class="dropdown-item" href="../coursework/block/one/report">Report</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container hero">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-5 offset-xl-1">
                <h1>Block One Report</h1><a class="btn btn-light btn-lg action-button" role="button" href="../..">View
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
                    <h1 class="text-center">Relational Databases</h1>
                    <p class="text-center"><span class="by">by</span> <a href="#">Ben Fleuty</a><span class="date">WC 2021/09/27</span>
                    </p>
                </div>
                <div class="text">
                    <div>
                        <h2>Database Schema</h2>
                        <p>Below is the schema for this database. <span class="pk">Primary Keys</span> are <span
                                    class="pk">bold and underlined</span>
                            and <span class="fk">Foreign Keys</span> are <span class="fk">italic and underlined</span>.
                        </p>


                        <p><strong>Plants</strong></p>
                        <pre class="schema"><span
                                    class="pk">id</span>, scientific_name, common_name, ink, description</pre>

                        <p><strong>PlantsImages</strong></p>
                        <pre class="schema"><span class="pk">id</span>, <span
                                    class="fk">plant_id</span>, isHeader, image</pre>

                        <p><strong>PlantArticles</strong></p>
                        <pre class="schema"><span class="pk">id</span>, <span class="fk">plant_id</span>, <span
                                    class="fk">article_id</span></pre>

                        <p><strong>Articles</strong></p>
                        <pre class="schema"><span class="pk">id</span>, author, title, date, text</pre>

                        <p>
                            By mapping out the schema, I have been able to identify appropriate fields and their
                            relations to other tables.
                        </p>
                    </div>
                    <div>
                        <h2>Entity Relationship Diagrams</h2>
                        <figure class="figure d-block">
                            <img class="figure-img" src="../content/image/block-one-erd-full.png" alt="ERD">
                            <figcaption id="fig1" class="figure-caption">Fig. 1</figcaption>
                        </figure>
                        <figure class="figure d-block">
                            <img class="figure-img" src="../content/image/block-one-erd-min.png" alt="ERD Simple">
                            <figcaption id="fig2" class="figure-caption">Fig. 2</figcaption>
                        </figure>
                        <p>
                            Above are two diagrams for the same database. <a href="#fig1">Fig. 1</a> shows the tables
                            and
                            their respective fields.
                            This is okay in a small database like this but this is not a scalable representation. <a
                                    href="#fig2">Fig. 2</a> shows the same
                            tables but without their attributes. This is a more scalable representation since the tables
                            and
                            their
                            relations are still shown, but in a compact and clutter-free manner. This is preferable for
                            large
                            databases as the structure of the database can easily be seen.
                        </p>
                        <p>
                            The above schema is in the third normal form. No data is unnecessarily repeated, and
                            repeating data is safely stored in a suitable table. For example, a plant can link to one or
                            many articles. These links are stored in the separate table PlantArticles. Here, just the
                            IDs of the link items are stored, meaning that no unnecessary data is repeatedly stored.
                            This also allows actions to be performed if an item is removed or altered in the one of the
                            tables.
                        </p>
                        <p>
                            This schema is suitable in this scenario as there is relatively little data to store. Even
                            if there was a million plants to store, there would be little wasted space as the table
                            fields are all used for the plants.
                        </p>
                        <p>However, this is not suitable for an application working with Big Data. Take Google and
                            Amazon - both collect incredible amounts of data on their users and use this for targeted
                            advertising. Due to the sheer quantity of rows of information that can be collected about
                            products, or customers, or interactions, it is unreasonable to try to draw relations between
                            all this data.
                        </p>
                        <p>
                            This is where relational database lack capability. While they can handle structured data
                            well, all this random data cannot be processed efficiently.
                        </p>
                    </div>

                    <div>
                        <h2>Data Dictionary</h2>
                        <p><strong>Plants</strong></p>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Datatype</th>
                                <th>Value</th>
                                <th>Notes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>id</td>
                                <td>int</td>
                                <td>11</td>
                                <td>autoincrement</td>
                            </tr>
                            <tr>
                                <td>scientific_name</td>
                                <td>varchar</td>
                                <td>255</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>common_name</td>
                                <td>varchar</td>
                                <td>255</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>link</td>
                                <td>text</td>
                                <td>65535</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>description</td>
                                <td>longtext</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                        <p><strong>PlantsImages</strong></p>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Datatype</th>
                                <th>Value</th>
                                <th>Notes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>id</td>
                                <td>int</td>
                                <td>11</td>
                                <td>autoincrement</td>
                            </tr>
                            <tr>
                                <td>plant_id</td>
                                <td>int</td>
                                <td>11</td>
                                <td class="fk">Plants(id)</td>
                            </tr>
                            <tr>
                                <td>isHeader</td>
                                <td>tinyint</td>
                                <td>1</td>
                                <td>Boolean</td>
                            </tr>
                            <tr>
                                <td>Image</td>
                                <td>varchar</td>
                                <td>255</td>
                                <td>Name of image</td>
                            </tr>
                            </tbody>
                        </table>

                        <p><strong>PlantArticles</strong></p>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Datatype</th>
                                <th>Value</th>
                                <th>Notes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>id</td>
                                <td>int</td>
                                <td>11</td>
                                <td>autoincrement</td>
                            </tr>
                            <tr>
                                <td>plant_id</td>
                                <td>int</td>
                                <td>11</td>
                                <td class="fk">Plants(id)</td>
                            </tr>
                            <tr>
                                <td>article_id</td>
                                <td>int</td>
                                <td>11</td>
                                <td class="fk">Articles(id)</td>
                            </tr>
                            </tbody>
                        </table>

                        <p><strong>Articles</strong></p>
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Field</th>
                                <th>Datatype</th>
                                <th>Value</th>
                                <th>Notes</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>id</td>
                                <td>int</td>
                                <td>11</td>
                                <td>autoincrement</td>
                            </tr>
                            <tr>
                                <td>author</td>
                                <td>varchar</td>
                                <td>255</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>title</td>
                                <td>text</td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>date</td>
                                <td>timestamp</td>
                                <td>CURRENT_TIMESTAMP</td>
                                <td>Default value</td>
                            </tr>
                            <tr>
                                <td>text</td>
                                <td>longtext</td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <p>
                            By planning the data types for each table, I was able to select the optimal datatype for
                            each field. This reduces the chance of bad data, whether accidental or malicious, from
                            entering the database as it is less likely to conform to the field's definition.
                        </p>
                    </div>
                    <div>
                        <h2>API</h2>
                        <p>
                            I have created an API to interface with my database to standardise & centralise operations
                            with the database. By doing this, data can be accessed with predictable results. Points of
                            failure are minimised as using the API ensures that the codebase is DRY (don't repeat
                            yourself). By reusing code, there are fewer failure points as the one function/method is
                            used, meaning changes are only needed in one place.
                        </p>
                        <p>
                            The data returned by the API is in JSON format to allow the API to be used in any
                            environment that supports JSON.
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
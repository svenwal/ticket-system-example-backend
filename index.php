<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticket system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="/images/logo.png">
    <script src="https://unpkg.com/htmx.org@1.9.3" integrity="sha384-lVb3Rd/Ca0AxaoZg5sACe8FJKF0tnUgR2Kd7ehUOG5GCcROv5uBIZsOqovBAcWua" crossorigin="anonymous"></script>
    <style>
        .navbar {
            background-color: #266FEB !important;
        }

        .container {
            margin-top: 2em;
        }
    </style>

</head>
<?php
if (isset($_ENV["PORTAL_URI"])) {
    $portal_uri = $_ENV["PORTAL_URI"];
} else {
    $portal_uri = "https://developer.bankong.cloud/";
}
?>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="/images/logo.png" height="40px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Internal Ticketing System</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $portal_uri ?>">Developer Portal</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://konghq.com/products/kong-konnect">Kong Konnect</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://github.com/svenwal/ticket-system-example-backend">Sourcecode at Github</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input name="query" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" hx-post="/search/" hx-headers='{"apikey":"jkorlnoxltg5fgkbvzuTZViuztvtlhj"}' hx-trigger="load,keyup changed delay:10ms, search" hx-target="#results" hx-indicator=".htmx-indicator">
                </form>
            </div>
        </div>
    </nav>

    <main class="container">
        <div class="bg-light p-5 rounded">
            <h1>Ticketing System - demo backend</h1>
            <p class="lead">This example ticket system has been created to show a backend system the Konnect developer portal can automatically push tickets into.</p>
            <p>To create a ticket here log into the Konnect developer portal, choose a documentation from the catalogue and raise a ticket there</p>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Service Path</th>
                        <th scope="col">Request Type</th>
                        <th scope="col">Developer ID</th>
                        <th scope="col">Details</th>
                    </tr>
                </thead>
                <tbody id="results">
                </tbody>
            </table>
            <p class="lead">Use the search field on upper right to filter the tickets</p>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
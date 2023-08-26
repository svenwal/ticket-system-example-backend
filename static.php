<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Axa ticket system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="icon" href="https://www.axa.com/static/favicon.ico?version=3.29.0">
    <style>
      .navbar {
        background-color: #000280 !important;
      }    
      .container {
        margin-top: 2em;
      }
    </style>

  </head>
  <body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/94/AXA_Logo.svg/240px-AXA_Logo.svg.png" height="40px" /></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Axa Ticketing System</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://axa-eu.dev-portal.de/">Developer Portal EU</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://axa-us.dev-portal.de/">Developer Portal US</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">more...</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<main class="container">
  <div class="bg-light p-5 rounded">
    <h1>Axa Ticketing System - demo backend</h1>
    <p class="lead">This example ticket system has been created to show a backend system the Konnect developer portal can automatically push tickets into.</p>
    <p>It is just a showcase as access to the Axa ServiceNow system has not been available for the PoC.</p>
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
  <tbody>
    <?php
     $path = 'post/data/all_tickets.json';
     $raw = file_get_contents($path);
     $jsonData = json_decode($raw);
     $number = 1;
     foreach($jsonData as $ticket) {
       $class="table-default";
       if ($ticket->priority == "High") {
         $class="table-danger";
       } else if ($ticket->priority == "Medium") {
         $class="table-warning";
       } else if ($ticket->priority == "Moderate") {
         $class="table-primary";
       }
       echo "<tr class=\"$class\">\n<th scope=\"row\">$number</th>\n";
       echo "<td>";
       echo $ticket->priority;
       echo "</td>\n";
       echo "<td>";
       echo $ticket->servicePath;
       echo "</td>\n";
       echo "<td class=\"$class\">";
       echo $ticket->requestType;
       echo "</td>\n";
       echo "<td>";
       echo "<a href=\"mailto:$ticket->developerId\">$ticket->developerId</a>";
       echo "</td>\n";
       echo "<td>";
       echo $ticket->issueDetails;
       echo "</td>\n";
       echo "</tr>\n";
       $number++;
    }
    ?>
  </tbody>
</table>
    <a class="btn btn-lg btn-primary" href="/?apikey=jkorlnoxltg5fgkbvzuTZViuztvtlhj" role="button">Refresh</a>
  </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>

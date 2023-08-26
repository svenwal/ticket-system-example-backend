<?php
     $query = htmlspecialchars($_POST["query"]);
     $path = '../post/data/all_tickets.json';
     $raw = file_get_contents($path);
     $jsonData = json_decode($raw);
     $number = 1;
     foreach($jsonData as $ticket) {
       if (!empty($query)) {
	       if (!str_contains(strtolower($ticket->issueDetails),strtolower($query)) &&
	       !str_contains(strtolower($ticket->priority),strtolower($query)) &&
	       !str_contains(strtolower($ticket->servicePath),strtolower($query)) &&
	       !str_contains(strtolower($ticket->developerId),strtolower($query)) &&
	       !str_contains(strtolower($ticket->requestType),strtolower($query))
	       ) {
           continue;
         }
       }
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

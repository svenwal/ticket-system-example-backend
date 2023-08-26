<?php
  $ticket = file_get_contents('php://input');
  $tickets = fopen("data/tickets.json", "a") or die("Unable to open file!");
  fwrite($tickets, ",\n");
  fwrite($tickets, $ticket);
  fclose($tickets);
  $raw_tickets = file_get_contents('data/tickets.json');
  $database =  fopen("data/all_tickets.json", "w") or die("Unable to open file!");
  fwrite($database, "[\n");
  fwrite($database, $raw_tickets);
  fwrite($database, "\n]");
  fclose($database);
?>

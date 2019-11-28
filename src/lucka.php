<?php

// Define year for date check to work in archive later
define('YEAR', 2019);

$lucka = '';

// Check if parameter "nr" is set and is in the range [1,24]
if (!isset($_GET['nr']) ||
    $_GET['nr'] < 1 ||
    $_GET['nr'] > 24) {
  $lucka = 'error';
}
else {
  // Transfer date to local variable for readability
  $day = $_GET['nr'];

  // Set timezone to Sweden to get correct time comparisions
  date_default_timezone_set('Europe/Stockholm');

  // Construct a date from input
  $numberDate = new DateTime(YEAR . '-12-' . $day);

  // Get current date
  $now = new DateTime();

  // If date is before now, return page, otherwise return the peeking page
  if ($now->diff($numberDate)->invert) {
    $lucka = $_GET['nr'];
  }
  else {
    $lucka = 'peeking';
  }
}
?>
<!DOCTYPE html>
<html lang="sv">
  <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./vendor/bootstrap/dist/css/bootstrap.min.css">

    <!-- Common styles -->
    <link rel="stylesheet" href="./css/style.css">

    <!-- Page specific styling -->
    <link rel="stylesheet" href="./css/lucka.css">

    <title>
      <?php if ($lucka !== 'error' && $lucka !== 'peeking') echo 'Lucka ' . $lucka . ' '; ?>
      Julkalendern 2019
    </title>
  </head>
  <body>
    <?php require 'luckor/' . $lucka . '.html'; ?>
  </body>
</html>

<?php

// Define year for date check to work in archive later
define('YEAR', 2019);

// Check if parameter "nr" is set and is in the range [1,24]
if (!isset($_GET['nr']) ||
    $_GET['nr'] < 1 ||
    $_GET['nr'] > 24) {
  require_once 'luckor/error.html';
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
    require_once 'luckor/' . $_GET['nr'] . '.html';
  }
  else {
    require_once 'luckor/peeking.html';
  }
}

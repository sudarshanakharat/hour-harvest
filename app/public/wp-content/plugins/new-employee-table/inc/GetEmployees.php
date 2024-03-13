<?php

class GetEmployees{
  function __construct() {
    global $wpdb;
    $tablename = $wpdb->prefix . 'employee_master';
    $ourQuery = $wpdb->prepare("SELECT * FROM $tablename LIMIT 10");
    $this->employees = $wpdb->get_results($ourQuery);   
  }
}
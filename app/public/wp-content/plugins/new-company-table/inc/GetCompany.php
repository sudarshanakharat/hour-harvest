<?php

class GetCompany{
  function __construct() {
    global $wpdb;
    $tablename = $wpdb->prefix . 'company_master';
    $ourQuery = $wpdb->prepare("SELECT * FROM $tablename LIMIT 10");
    $this->Company = $wpdb->get_results($ourQuery);   
  }
}
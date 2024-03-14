<?php

class GetCompany{
  function __construct() {
      global $wpdb;
      $tablename = $wpdb->prefix . 'company_master';
      $ourQuery = "SELECT * FROM $tablename LIMIT 10";
      $this->company = $wpdb->get_results($ourQuery);
  }
}

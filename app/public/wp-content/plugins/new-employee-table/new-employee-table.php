<?php

/*
  Plugin Name: Employee
  Version: 1.0
  Author: Boldbytes
  Description: Employee Plug-in
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once plugin_dir_path(__FILE__) . 'inc/generateEmployee.php';

class EmployeeTablePlugin {
  function __construct() {
    global $wpdb;
    $this->charset = $wpdb->get_charset_collate();
    $this->tablename = $wpdb->prefix . 'employee_master';

    add_action('activate_new-employee-table/new-employee-table.php', array($this, 'onActivate'));
    add_action('admin_post_createemployee', array($this, 'createEmployee'));
    add_action('admin_post_nopriv_createemployee', array($this, 'createEmployee'));
    //add_action('admin_head', array($this, 'populateFast'));
    add_action('wp_enqueue_scripts', array($this, 'loadAssets'));
    add_filter('template_include', array($this, 'loadTemplate'), 99);
  }

 /*
 function createEmployee() {
    if(current_user_can('administrator')) {
      $employee = generateEmployee(); 
      $employee['employee_name'] = sanitize_text_field($_POST['incomingemployeename']);
      global $wpdb;
      $wpdb->insert($this->tablename, $employee);
      wp_redirect(site_url('/employee'));
    } else {
      wp_redirect(site_url());
    }
  } 
  */

  function createEmployee() {
    if(current_user_can('administrator')) {
        $employee = array(); // Initialize an array to store employee data

        // Validate and sanitize each form field
        $employee['employee_name'] = sanitize_text_field($_POST['employee_name']);
        $employee['date_of_join'] = sanitize_text_field($_POST['date_of_join']);
        $employee['designation'] = sanitize_text_field($_POST['designation']);
        $employee['ssn'] = intval($_POST['ssn']); // Assuming SSN is a numeric field
        $employee['phone_cell'] = sanitize_text_field($_POST['phone_cell']);
        $employee['phone_home'] = sanitize_text_field($_POST['phone_home']);
        $employee['work_authorization'] = sanitize_text_field($_POST['work_authorization']);
        $employee['hourly_rate'] = floatval($_POST['hourly_rate']); // Assuming hourly rate is a numeric field
        $employee['employment_type'] = sanitize_text_field($_POST['employment_type']);

        global $wpdb;
        $result = $wpdb->insert($this->tablename, $employee); // Insert the employee data into the database

        if ($result) {
            // Employee inserted successfully
            wp_redirect(site_url('/employee')); // Redirect to the employee page after adding the employee
            exit;
        } else {
            // Handle insertion error
            wp_die('Error inserting employee into the database.');
        }
    } else {
        wp_redirect(site_url()); // Redirect to homepage if user is not an administrator
        exit;
    }
}

  
function onActivate() {
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');   

    dbDelta("CREATE TABLE $this->tablename (
        id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
        employee_id varchar(50) NOT NULL,
        employee_name varchar(255) NOT NULL,
        date_of_join date NOT NULL,
        designation varchar(255) NOT NULL,
        ssn varchar(50) NOT NULL,
        phone_cell varchar(20) NOT NULL,
        phone_home varchar(20) NOT NULL,
        work_authorization varchar(50) NOT NULL,
        hourly_rate decimal(10, 2) NOT NULL,
        employment_type varchar(50) NOT NULL,
        PRIMARY KEY  (id)
    ) $this->charset;");
}

  function onAdminRefresh() {
      global $wpdb;
      $wpdb->insert($this->tablename, generateEmployee());
  }

  function loadAssets() {
    if (is_page('employee')) {
      wp_enqueue_style('employeecss', plugin_dir_url(__FILE__) . 'employee.css');
    }
  }

  function loadTemplate($template) {
    if (is_page('employee')) {
      return plugin_dir_path(__FILE__) . 'inc/template-employee.php';
    }
    return $template;
  }

  function populateFast() {
    $query = "INSERT INTO $this->tablename (`employee_id`, `employee_name`, `date_of_join`, `designation`, `ssn`, `phone_cell`, `phone_home`, `work_authorization`, `hourly_rate`, `employment_type`) VALUES ";
    $numberofemployees = 10;
    for ($i = 0; $i < $numberofemployees; $i++) {
      $employee = generateEmployee();
      $query .= "('{$employee['employee_id']}', '{$employee['employee_name']}', '{$employee['date_of_join']}', '{$employee['designation']}', '{$employee['ssn']}', '{$employee['phone_cell']}', '{$employee['phone_home']}', '{$employee['work_authorization']}', {$employee['hourly_rate']}, '{$employee['employment_type']}')";
      if ($i != $numberofemployees - 1) {
        $query .= ", ";
      }
    }

/*
    Never use query directly like this without using $wpdb->prepare in the
    real world. I'm only using it this way here because the values I'm 
    inserting are coming fromy my innocent pet generator function so I
    know they are not malicious, and I simply want this example script
    to execute as quickly as possible and not use too much memory.
    */
    global $wpdb;
    $wpdb->query($query);
  }

}

$employeePlugin = new employeeTablePlugin();
<?php

/*
  Plugin Name: Company
  Version: 1.0
  Author: Boldbytes
  Description: Company Plug-in
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once plugin_dir_path(__FILE__) . 'inc/generateCompany.php';

class CompanyTablePlugin {
  function __construct() {
    global $wpdb;
    $this->charset = $wpdb->get_charset_collate();
    $this->tablename = $wpdb->prefix . 'Company_master';

    add_action('activate_new-Company-table/new-Company-table.php', array($this, 'onActivate'));
    add_action('admin_post_createCompany', array($this, 'createCompany'));
    add_action('admin_post_nopriv_createCompany', array($this, 'createCompany'));
    //add_action('admin_head', array($this, 'populateFast'));
    add_action('wp_enqueue_scripts', array($this, 'loadAssets'));
    add_filter('template_include', array($this, 'loadTemplate'), 99);
  }

 /*
 function createCompany() {
    if(current_user_can('administrator')) {
      $Company = generateCompany(); 
      $Company['Company_name'] = sanitize_text_field($_POST['incomingCompanyname']);
      global $wpdb;
      $wpdb->insert($this->tablename, $Company);
      wp_redirect(site_url('/Company'));
    } else {
      wp_redirect(site_url());
    }
  } 
  */

  function createCompany() {
    if(current_user_can('administrator')) {
        $company = array(); // Initialize an array to store Company data

        // Validate and sanitize each form field
        $company['company_name'] = sanitize_text_field($_POST['company_name']);
        $company['address_line1'] = sanitize_text_field($_POST['address_line1']);
        $company['address_line2'] = sanitize_text_field($_POST['address_line2']);
        $company['city'] = sanitize_text_field($_POST['city']);
        $company['zip'] = sanitize_text_field($_POST['zip']);
        $company['state'] = sanitize_text_field($_POST['state']);
        $company['company_type'] = sanitize_text_field($_POST['company_type']);
        $company['date_of_formation'] = sanitize_text_field($_POST['date_of_formation']);
        $company['email_address'] = sanitize_text_field($_POST['email_address']);
        $company['phone_number'] = sanitize_text_field($_POST['phone_number']);

        global $wpdb;
        $result = $wpdb->insert($this->tablename, $company); // Insert the Company data into the database

        if ($result) {
            // Company inserted successfully
            wp_redirect(site_url('/Company')); // Redirect to the Company page after adding the Company
            exit;
        } else {
            // Handle insertion error
            wp_die('Error inserting Company into the database.');
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
      company_id varchar(50) NOT NULL,
      company_name varchar(255) NOT NULL,
      address_line1 varchar(255) NOT NULL,
      address_line2 varchar(255) NOT NULL,
      city varchar(100) NOT NULL,
      zip varchar(20) NOT NULL,
      state varchar(100) NOT NULL,
      company_type varchar(50) NOT NULL,
      date_of_formation date NOT NULL,
      email_address varchar(255) NOT NULL,
      phone_number varchar(20) NOT NULL,
      PRIMARY KEY  (id)
  ) $this->charset;");
}



  function onAdminRefresh() {
      global $wpdb;
      $wpdb->insert($this->tablename, generateCompany());
  }

  function loadAssets() {
    if (is_page('Company')) {
      wp_enqueue_style('Companycss', plugin_dir_url(__FILE__) . 'Company.css');
    }
  }

  function loadTemplate($template) {
    if (is_page('Company')) {
      return plugin_dir_path(__FILE__) . 'inc/template-Company.php';
    }
    return $template;
  }

  function populateFast() {
    $query = "INSERT INTO $this->tablename (`Company_id`, `Company_name`, `date_of_join`, `designation`, `ssn`, `phone_cell`, `phone_home`, `work_authorization`, `hourly_rate`, `employment_type`) VALUES ";
    $numberofCompanys = 10;
    for ($i = 0; $i < $numberofCompanys; $i++) {
      $Company = generateCompany();
      $query .= "('{$Company['Company_id']}', '{$Company['Company_name']}', '{$Company['date_of_join']}', '{$Company['designation']}', '{$Company['ssn']}', '{$Company['phone_cell']}', '{$Company['phone_home']}', '{$Company['work_authorization']}', {$Company['hourly_rate']}, '{$Company['employment_type']}')";
      if ($i != $numberofCompanys - 1) {
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

$CompanyPlugin = new CompanyTablePlugin();
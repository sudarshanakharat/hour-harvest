<?php

function generateEmployee() {
  $names = array("John", "Alice", "Michael", "Emily", "David", "Sarah", "James", "Jennifer", "Robert", "Jessica", "William", "Linda", "Daniel", "Karen", "Mark", "Susan", "Steven", "Nancy", "Joseph", "Margaret");
  $designations = array("Software Engineer", "Accountant", "HR Manager", "Sales Representative", "Marketing Specialist", "Project Manager", "Graphic Designer", "Financial Analyst", "Customer Service Representative", "Operations Manager", "Data Analyst");
  $work_authorizations = array("Green Card", "EAD", "Citizen", "H1B");
  $employment_types = array("Part Time", "Full Time");

  $employee_id = rand(1000, 9999);
  $employee_name = $names[array_rand($names, 1)];
  $date_of_join = date("Y-m-d", mt_rand(strtotime("-10 years"), strtotime("-1 month")));
  $designation = $designations[array_rand($designations, 1)];
  $ssn = rand(100000000, 999999999);
  $phone_cell = "1-" . rand(200, 999) . "-" . rand(100, 999) . "-" . rand(1000, 9999);
  $phone_home = "1-" . rand(200, 999) . "-" . rand(100, 999) . "-" . rand(1000, 9999);
  $work_authorization = $work_authorizations[array_rand($work_authorizations, 1)];
  $hourly_rate = rand(15, 50);
  $employment_type = $employment_types[array_rand($employment_types, 1)];

  return array(
    'employee_id' => $employee_id,
    'employee_name' => $employee_name,
    'date_of_join' => $date_of_join,
    'designation' => $designation,
    'ssn' => $ssn,
    'phone_cell' => $phone_cell,
    'phone_home' => $phone_home,
    'work_authorization' => $work_authorization,
    'hourly_rate' => $hourly_rate,
    'employment_type' => $employment_type
  );
}

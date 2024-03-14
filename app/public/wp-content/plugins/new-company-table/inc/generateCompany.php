<?php

function generateCompany() {
  $companyNames = array(
    "Tech Innovations Inc.",
    "Global Solutions Ltd.",
    "Citywide Enterprises",
    "Alpha Industries",
    "Pinnacle Group",
    "Apex Innovations",
    "Blue Sky Corporation",
    "Summit Enterprises",
    "Elite Solutions",
    "Innovative Ventures",
    "Vanguard Technologies",
    "Horizon Corporation",
    "Prime Solutions",
    "Bright Future Inc.",
    "Frontier Enterprises",
    "Omega Industries",
    "Visionary Ventures",
    "Infinity Corporation",
    "Dynamic Solutions",
    "Evergreen Enterprises"
  );

  $companyTypes = array("Public", "Private", "Non-profit");

  $companyId = rand(1000, 9999);
  $companyName = $companyNames[array_rand($companyNames, 1)];
  $addressLine1 = "123 " . $companyName . " St"; // Example address line 1
  $addressLine2 = ""; // Example address line 2, can be left empty
  $city = "New York"; // Example city
  $zip = rand(10000, 99999); // Example zip code
  $states = array("New York", "California", "Texas", "Florida", "Illinois"); // Example list of states
  $state = $states[array_rand($states)]; // Randomly select a state from the list
  $companyType = $companyTypes[array_rand($companyTypes)]; // Randomly select a company type
  $dateOfFormation = date("m/d/Y", mt_rand(strtotime("-50 years"), strtotime("-1 month"))); // Random date within the last 50 years
  $emailAddress = strtolower(str_replace(' ', '', $companyName)) . "@example.com"; // Example email address based on company name
  $phoneNumber = "1-" . rand(200, 999) . "-" . rand(100, 999) . "-" . rand(1000, 9999); // Example phone number

  return array(
    'Company_ID' => $companyId,
    'Company_Name' => $companyName,
    'Address_Line1' => $addressLine1,
    'Address_Line2' => $addressLine2,
    'City' => $city,
    'Zip' => $zip,
    'State' => $state,
    'Company_Type' => $companyType,
    'Date_of_Formation' => $dateOfFormation,
    'Email_Address' => $emailAddress,
    'Phone_Number' => $phoneNumber
  );
}
?>
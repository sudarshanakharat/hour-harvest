<?php
/*
Template Name: Company Page Template
*/

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        // Check if the current user is an administrator
        if (current_user_can('administrator')) {
            // Add your HTML form code here
            ?>
            <form id="company-form" method="post">
                <label for="company-name">Company Name:</label>
                <input type="text" id="company-name" name="company_name" required><br>

                <label for="address-line-1">Address Line 1:</label>
                <input type="text" id="address-line-1" name="address_line_1"><br>
                
                <label for="address-line-2">Address Line 2:</label>
                <input type="text" id="address-line-2" name="address_line_2"><br>
                
                <label for="city">City:</label>
                <input type="text" id="city" name="city"><br>
                
                <label for="zip">Zip:</label>
                <input type="text" id="zip" name="zip"><br>
                
                <label for="state">State:</label>
                <select id="state" name="state">
                    <option value="state1">State 1</option>
                    <option value="state2">State 2</option>
                    <!-- Add options for other states -->
                </select><br>
                
                <label for="company-type">Company Type:</label>
                <select id="company-type" name="company_type">
                    <option value="type1">Type 1</option>
                    <option value="type2">Type 2</option>
                    <!-- Add options for other company types -->
                </select><br>
                
                <label for="date-of-formation">Date of Formation:</label>
                <input type="text" id="date-of-formation" name="date_of_formation" placeholder="mm/dd/yyyy"><br>
                
                <label for="email-address">Email Address:</label>
                <input type="email" id="email-address" name="email_address"><br>
                
                <label for="phone-number">Phone Number:</label>
                <input type="tel" id="phone-number" name="phone_number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="xxx-xxx-xxxx"><br>

                <input type="submit" value="Submit">
            </form>

            <?php

            // Handle form submission
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Retrieve form data
                $company_name = $_POST['company_name'];
                $address_line_1 = $_POST['address_line_1'];
                $address_line_2 = $_POST['address_line_2'];
                $city = $_POST['city'];
                $zip = $_POST['zip'];
                $state = $_POST['state'];
                $company_type = $_POST['company_type'];
                $date_of_formation = $_POST['date_of_formation'];
                $email_address = $_POST['email_address'];
                $phone_number = $_POST['phone_number'];
                
                // Insert data into the database
                global $wpdb;
                $table_name = $wpdb->prefix . 'companies';

                $wpdb->insert(
                    $table_name,
                    array(
                        'company_name' => $company_name,
                        'address_line_1' => $address_line_1,
                        'address_line_2' => $address_line_2,
                        'city' => $city,
                        'zip' => $zip,
                        'state' => $state,
                        'company_type' => $company_type,
                        'date_of_formation' => $date_of_formation,
                        'email_address' => $email_address,
                        'phone_number' => $phone_number
                    )
                );

                echo "Company added successfully!";
            }
        } else {
            // If the user is not an administrator, display an error message
            echo "You do not have permission to access this page.";
        }
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>

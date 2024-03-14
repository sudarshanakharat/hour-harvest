<?php 

require_once plugin_dir_path(__FILE__)  .  'GetCompany.php';
$getCompanys = new GetCompany();

get_header(); ?>

<div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri('/images/ocean.jpg'); ?>);"></div>
  <div class="page-banner__content container container--narrow">
    <h1 class="page-banner__title">Company Management</h1>
    <div class="page-banner__intro">
      <p>Managing Companies Effectively.</p>
    </div>
  </div>  
</div>

<div class="container container--narrow page-section">

<?php
if (current_user_can('administrator')) { ?>
    <form action="<?php echo esc_url(admin_url('admin-post.php')) ?>" class="create-Company-form" method="POST">
    <h2>Enter Details of New Company</h2>
        <input type="hidden" name="action" value="createCompany">
    <div class="form-group">
            <label for="Company_name">Name:</label>
            <input type="text" id="Company_name" name="Company_name" placeholder="Enter Company name...">
        </div>
        <div class="form-group">
            <label for="date_of_join">Date of Joining:</label>
            <input type="date" id="date_of_join" name="date_of_join">
        </div>
        <div class="form-group">
            <label for="designation">Designation:</label>
            <input type="text" id="designation" name="designation" placeholder="Enter Company designation...">
        </div>
        <div class="form-group">
            <label for="ssn">SSN:</label>
            <input type="number" id="ssn" name="ssn" placeholder="Enter Company SSN...">
        </div>
        <div class="form-group">
            <label for="phone_cell">Cell Phone:</label>
            <input type="tel" id="phone_cell" name="phone_cell" placeholder="Enter Company cell phone...">
        </div>
        <div class="form-group">
            <label for="phone_home">Home Phone:</label>
            <input type="tel" id="phone_home" name="phone_home" placeholder="Enter Company home phone...">
        </div>
        <div class="form-group">
            <label for="work_authorization">Work Authorization Type:</label>
            <select id="work_authorization" name="work_authorization">
                <option value="Green Card">Green Card</option>
                <option value="EAD">EAD</option>
                <option value="Citizen">Citizen</option>
                <option value="H1B">H1B</option>
            </select>
        </div>
        <div class="form-group">
            <label for="hourly_rate">Hourly Rate:</label>
            <input type="number" id="hourly_rate" name="hourly_rate" placeholder="Enter hourly rate...">
        </div>
        <div class="form-group">
            <label for="employment_type">Employment Type:</label>
            <select id="employment_type" name="employment_type">
                <option value="full_time">Full Time</option>
                <option value="part_time">Part Time</option>
                <option value="contract">Contract</option>
            </select>
        </div>
        <button type="submit" id="add_Company_button">Add Company</button>

    </form>
<?php }
?>

</div>

<?php get_footer(); ?>

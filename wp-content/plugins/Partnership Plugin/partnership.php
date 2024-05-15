<?php
/*
Plugin Name: Partnership Form
Description: Plugin to generate a custom contact form and send emails upon submission.
Version: 1.0
Author: Nydoz Team
*/

// Enqueue scripts and styles
function custom_contact_form_scripts() {
    // Enqueue scripts and styles here if needed
}
add_action('wp_enqueue_scripts', 'custom_contact_form_scripts');

// Define the form markup
function custom_contact_form_shortcode() {
    ob_start();
    ?>
    <style>
        .label-color{
            color: white!important;
        }
        input, select {
          width: 100%;
        }
        .custom-theme-button{
            background-color: black!important;
            width: 94%;
            margin-left: 15px;
        }
    </style>
    
    <form id="custom-contact-form" method="post" action="" enctype="multipart/form-data">
       <input type="hidden" name="custom_contact_form_submit" value="1">
            <div class="col-sm-12 col-xs-12">
                <label class="label-color" for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
        
            <div class="col-sm-12 col-xs-12">
            <label class="label-color" for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            </div>
        
        <div class="col-sm-12 col-xs-12">
            <label class="label-color" for="country">Country </label><br/>
            <select id="country" name="country" required>
                <option value="">Select a country</option>
                <option value="Afghanistan">Afghanistan</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Brazil">Brazil</option>
                <option value="Brunei">Brunei</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Côte d'Ivoire">Côte d'Ivoire</option>
                <option value="Cabo Verde">Cabo Verde</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czechia (Czech Republic)">Czechia (Czech Republic)</option>
                <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Eswatini (fmr. "Swaziland")">Eswatini (fmr. "Swaziland")</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Greece">Greece</option>
                <option value="Grenada">Grenada</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-Bissau">Guinea-Bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Holy See">Holy See</option>
                <option value="Honduras">Honduras</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran">Iran</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Laos">Laos</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libya">Libya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia">Micronesia</option>
                <option value="Moldova">Moldova</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar (formerly Burma)">Myanmar (formerly Burma)</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="North Korea">North Korea</option>
                <option value="North Macedonia">North Macedonia</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestine State">Palestine State</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Qatar">Qatar</option>
                <option value="Romania">Romania</option>
                <option value="Russia">Russia</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Korea">South Korea</option>
                <option value="South Sudan">South Sudan</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syria">Syria</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania">Tanzania</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-Leste">Timor-Leste</option>
                <option value="Togo">Togo</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States of America">United States of America</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Vietnam">Vietnam</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>

        </div>
       
            <div class="col-sm-12 col-xs-12">
            <label class="label-color" for="phonenumber">Phone Number:</label>
            <input type="number" id="nuber" name="number" required>
            </div>
        
            <div class="col-sm-12 col-xs-12">
            <label class="label-color" for="investmentType">Partnership Type</label></br>
            <select id="investmentType" onchange="toggleCheckboxes()">
                <option value="">Select One</option>
                <option value="professional">Professional</option>
                <option value="investing">Investing</option>
                <option value="both">Both</option>
            </select>
            <input type="hidden" id="investmentTypeInput" name="investmentType" value="">
            </div>
        <style>
            
        </style>
            <div class="col-sm-12 col-xs-12" style="clear: both;">
            <div id="checkboxesProfessional" style="display:none">
                <div class="checkbox-group cat action">
                    <label class="label-color" for="legal">
                    <input type="checkbox" id="legal" name="legal" value="legal">
                    <span>Legal Advisor</span></label><br>
                </div>
            
                <div class="checkbox-group cat action">
                    <label class="label-color" for="accountant">
                    <input type="checkbox" id="accountant" name="accountant" value="accountant">
                    <span>Accountant</span></label><br>
                </div>
            
                <div class="checkbox-group cat action">
                    <label class="label-color" for="content">
                    <input type="checkbox" id="content" name="content" value="content">
                    <span>Content Creator</span></label><br>
                </div>
                
                <div class="checkbox-group cat action">
                    <label class="label-color" for="legal_representative">
                    <input type="checkbox" id="legal_representative" name="legal_representative" value="legal_representative">
                    <span>Legal Representative</span></label><br>
                </div>
            
                <div class="checkbox-group cat action">
                    <label class="label-color" for="marketing">
                    <input type="checkbox" id="marketing" name="marketing" value="marketing">
                    <span>Marketing</span></label><br>
                </div>
            
                <div class="checkbox-group cat action">
                    <label class="label-color" for="other">
                    <input type="checkbox" id="other" name="other" value="other" onclick="toggleTextField()">
                    <span>Other</span></label><br>
                </div>
            </div>
            </div>
        
            <div class="col-sm-12 col-xs-12" style="clear: both;">
                <div id="checkboxesInvesting" style="display:none; clear: both;">
                    <div class="checkbox-group cat action">
                        <label class="label-color" for="equity">
                        <input type="checkbox" id="equity" name="equity" value="equity">
                        <span>Equity Investing</span></label><br>
                    </div>
                
                    <div class="checkbox-group cat action">
                        <label class="label-color" for="debt">
                        <input type="checkbox" id="debt" name="debt" value="debt">
                        <span>Debt Investing</span></label><br>
                    </div>
                </div>
                
                <div id="textFieldDiv" style="display:none; clear: both;">
                    
                        <label class="label-color" for="otherText">
                        <span>Other (Please Specify):</span></label>
                        <input type="text" id="otherText" name="otherText">
                    
                </div>
            </div>
            <div style="clear: both;">
                <div class="col-sm-12 col-xs-12">
                    <label class="label-color" for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
            </div>
        <!--<div class="row">-->
        <!--    <div class="col-sm-12 col-xs-12">-->
        <!--        <div id="fileUploadDiv">-->
        <!--            <input type="file" id="fileUpload" name="fileUpload">-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <input class="custom-theme-button" type="submit" name="submit" value="Submit">
    </form>
    <style>
       
.cat{
  margin: 4px;
  background-color: ##00A9A5;
  border-radius: 4px;
  border: 1px solid #fff;
  overflow: hidden;
  float: left;
}

.cat label {
  float: left; line-height: 3.0em;
  
}

.cat label span {
  text-align: center;
  padding: 10px;
  display: block;
}

.cat label input {
  position: absolute;
  display: none!important;
  color: #fff !important;
}
/* selects all of the text within the input element and changes the color of the text */
.cat label input + span{color: #fff;}


/* This will declare how a selected input will look giving generic properties */
.cat input:checked + span {
    color: #ffffff;
   
}


/*
This following statements selects each category individually that contains an input element that is a checkbox and is checked (or selected) and chabges the background color of the span element.
*/

 
.action input:checked + span{background-color: #1b1f2e;}

    </style>
  
   <script>
        function toggleCheckboxes() {
            var investmentTypeSelect = document.getElementById("investmentType");
            var investmentType = investmentTypeSelect.options[investmentTypeSelect.selectedIndex].value;
            var checkboxesProfessionalDiv = document.getElementById("checkboxesProfessional");
            var checkboxesInvestingDiv = document.getElementById("checkboxesInvesting");
        
            document.getElementById("investmentTypeInput").value = investmentType; // Set value here
        
            if (investmentType === "professional") {
                checkboxesProfessionalDiv.style.display = "block";
                checkboxesInvestingDiv.style.display = "none";
            } else if (investmentType === "investing") {
                checkboxesProfessionalDiv.style.display = "none";
                checkboxesInvestingDiv.style.display = "block";
            } else {
                checkboxesProfessionalDiv.style.display = "block";
                checkboxesInvestingDiv.style.display = "block";
            }
        }

        
        function toggleTextField() {
            var otherCheckbox = document.getElementById("other");
            var textFieldDiv = document.getElementById("textFieldDiv");
            
            if (otherCheckbox.checked) {
                textFieldDiv.style.display = "block";
            } else {
                textFieldDiv.style.display = "none";
            }
        }
        </script>



    <?php
    return ob_get_clean();
    }
    add_shortcode('custom_contact_form', 'custom_contact_form_shortcode');
    
    function process_custom_contact_form() {
        if (isset($_POST['submit'])) {
            $name = sanitize_text_field($_POST['name']);
            $email = sanitize_email($_POST['email']);
            $country = sanitize_text_field($_POST['country']);
            $phoneNumber = sanitize_text_field($_POST['number']);
            $message = sanitize_text_field($_POST['message']);
            $investmentType = isset($_POST['investmentType']) ? sanitize_text_field($_POST['investmentType']) : '';
   $attachments = array(); // Initialize attachments array
        if(isset($_FILES['fileUpload'])) {
            $file_name = $_FILES['fileUpload']['name'];
            $file_tmp = $_FILES['fileUpload']['tmp_name'];
            // Move uploaded file to desired directory
            move_uploaded_file($file_tmp,"/path/to/directory/" . $file_name);
            // Include file information in the email or process it as needed
            $attachments[] = $file_name; // Add file path to attachments array
        }

       
            // Additional fields for checkboxes
            $checkboxes = "";
            if(isset($_POST['legal'])) $checkboxes .= "Legal, ";
            if(isset($_POST['accountant'])) $checkboxes .= "Accountant, ";
            if(isset($_POST['content'])) $checkboxes .= "Content, ";
            if(isset($_POST['marketing'])) $checkboxes .= "Marketing, ";
            if(isset($_POST['equity'])) $checkboxes .= "Equity, ";
            if(isset($_POST['debt'])) $checkboxes .= "Debt, ";
             if(isset($_POST['legal_representative'])) $checkboxes .= "Legal Representative, ";
            // Remove trailing comma and space
            $checkboxes = rtrim($checkboxes, ", ");
    
            // Additional field for 'Other' text
            $otherText = "";
            if(isset($_POST['other'])) {
                $otherText = sanitize_text_field($_POST['otherText']);
            }
    
            // Send email to admin
            $admin_email = 'info@gowithfund.com';
            $admin_subject = 'New Partnership Request Submission';
            $admin_message = "Name: $name\n";
            $admin_message .= "Email: $email\n";
            $admin_message .= "Country: $country\n";
            $admin_message .= "Phone Number: $phoneNumber\n";
            $admin_message .= "Investment Type: $investmentType\n"; // Include selected value
            $admin_message .= "Message: $message\n";
            $admin_message .= "Interests: $checkboxes\n";
            if(!empty($otherText)) {
                $admin_message .= "Other Interest: $otherText\n";
            }
            $admin_headers = array(
                'From: GoWithFund <info@gowithfund.com>',
                'Content-Type: text/html; charset=UTF-8'
            );
             wp_mail($admin_email, $admin_subject, $admin_message, $admin_headers, $attachments);
    
            // Send email to client
            $client_headers = array(
                'From: GoWithFund <info@gowithfund.com>',
                'Content-Type: text/html; charset=UTF-8'
            );
            $client_subject = 'Thank you for contacting us';
             $client_message = "<div style='text-align: center; background-color: #00A9A5;'><img width='200' src='https://gowithfund.com/wp-content/uploads/2015/12/Final-Logo-white.png'/></div></br><div><h2>Dear $name,</h2></div><p>Thank you for expressing your interest in becoming a partner with GoWithFund. We appreciate your support and enthusiasm for our crowdfunding platform. Our team will review your submission and get back to you soon with further details.</p><div><p>Best regards,</p><p>The GoWithFund Team</p><p>943, 447 Broadway, 2nd Floor</p><p>New York, US</p></div><div><img width='150' src='https://gowithfund.com/wp-content/uploads/2024/05/Gowithfund-Final-Logo-Transparancy-BG.png'/></div>";
            wp_mail($email, $client_subject, $client_message, $client_headers);
    // Check if the request is from a web browser
// Check if the request is from a web browser and the specific form is submitted
if (!is_admin() && !wp_doing_ajax() && isset($_POST['custom_contact_form_submit'])) {
    wp_redirect(home_url('/become-a-partner'));
    exit();
}

            // Redirect after submission
           
        }
    }
    add_action('init', 'process_custom_contact_form');
    

Sitemap: 
- main: 
	+ contact.php
	+ thankyou.php
	+ process.php
- other: 
	+ css: style.css
	+ js: script.js
	+ .env 
        > Password using PHPMailer is an App Password of account Google, you must to create that.
	+ composer.json
    + vendor


Flowchart: 
1. User visit "contact.php"
2. User fills out the form
3. Client-side validation 
	a. If validation fails -> Highlight the input fields with errors by adding a red border color and disabled button submit
	b. If validation passes -> Submit the form via AJAX and send the form data to the server
4. Server-side validation 
	a. If validation fails -> Send the error data back to contact.php via the AJAX response.
	b. If validation passes -> Send the email using PHPMailer, save the form data into the session, and send a response back to the client-side.
5. Client-side (handling server response)
    a. If validation fails -> Display a modal error using SweetAlert, and when the modal is closed, highlight the input fields with errors by adding a red border.
    b. If validation passes -> Redirect the user to thankyou.php
6. End


Pseudocode:
Client-side validation (script.js): 
    1. When visiting "contact.php":
        1.1 Check if the "email" and "phone" fields is not empty
            - If either field is empty, disable the submit button.
    2. When the user fills in the input fields: 
        2.1. Check if the "email" contains a valid email format
            - If invalid, highlight this input with a red border color and disable the submit button.
        2.2. Check if the "phone" contains a valid phone format
            - If invalid, highlight this input with a red border color and disable the submit button.
    3. When the user clicks the submit button:
        3.1. Prevent the default form submission
        3.2. If the "email" and "phone" fields are valid, allow the form to be submitted via AJAX
        3.3. Before sending, remove the display: none; class from the loading indicator to show it
        3.4. Send the form data to the server using AJAX
        3.5. If the AJAX request is successful, handle the server response and reapply the display: none; class to the loading indicator
        3.6. Check the "status", "sent_email" and "data" variables in the server response
            - If status is false:
                + Display an appropriate SweetAlert error message.
                + When the user clicks "Try Again" in SweetAlert:
                    > Loop through the response "data" containing invalid fields.
                    > For each invalid field, highlight the corresponding input by adding a red border color.
                    > Disable the submit button.
            - If status is true and sent_email is also true, redirect to "thankyou.php".
Server-side validation (process.php):
    1. Install library PHPMailer send email, library PHPdotenv manage enviroment variables.
    2. Create file .env, store enviroment variables in this file (email, password using config PHPMailer ).
    3. Load library PHPMailer and PHPdotenv, load variable enviroment from the .env file.
    4. Capture the POST data 
        4.1. Retrieve the name, email, phone, company, and message from the POST request.
        4.2. Store this data in an associative array $args.
    5. Initialize an empty array $temp to hold any validation errors
    6. Create function check empty of parameters received and return an array of status and data (isEmpty($value, $key))
        6.1. Check if $value empty return status = false, and return data = $key of that $value.
        6.2. Check if $value not empty return status = true and return string empty.
    7. Loop through each key-value pair in $args, call function isEmpty() and pass parameters for pair
        7.1 Check if returned status is false then push data to variable empty ($temp).
    8. Check if the $temp array is empty:
        8.1. If $temp is empty, all fields are valid, and $isEmpty is set to true.
        8.2. If $temp is not empty, set $isEmpty to false.
    9. Store form data in session:
        9.1 If $isEmpty is true, store the $args array in the session.
        9.2 If $isEmpty is false, store an empty string in the session.
    10. If $isEmpty is true, call the sendMail($args) function:
        10.1. Configure the PHPMailer object with server details.
        10.2. Set the recipient’s email and name from the $args array.
        10.3. Set the email content using the templateEmail($info) function.
        10.4. Try to send the email, and return true if successful or an error message if it fails.
    11. Return a JSON object containing
        11.1. status: the value of $isEmpty.
        11.2. data: the array $temp with any validation errors.
        11.3. sent_email: the result of sendMail() (true if the email was sent).


Wireframing: 
Contact Page (contact.php):
- Header: A title at the top-left
- Form Fields: Four fields organized in a two-column grid
    Name: Input field
    Email: Input field
    Phone: Input field
    Below these fields, a larger text area for the "Message."
    Submit Button:  Positioned at the bottom-right of the form
- Contact Information Section: Located on the right side, separate from the form, containing:
    Address
    Phone Number
    Email Address
    Social Media Icons (Twitter, LinkedIn, Instagram)
Thank You Page (thankyou.php):
- Header: Title at the top-left
- Description Short: Text confirming the form submission
- Submitted data display:
    Name
    Phone
    Email Address
    Company

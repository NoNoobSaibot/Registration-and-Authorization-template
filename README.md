# This is template view and process forms authorization and registration. (procedural programming style)

*This template was developed for further use in other projects.

## The technology stack used:

- PHP 8.3.1 (Thread Safe for Windows OS)
- Apache 2.4.58 win64
- HTML,CSS
- JS
- MYSQL 8.3
  
## Project structure (without going into details):

(HTML structure)
Authorization Form:
 * Login field
 * Password Field
 * Send Button
 * Link to registration
Registration Form:
 * Name Field
 * Phone Number field
 * Login field
 * Password field
 * Repeat Password field
 * Save button
 * Back button (to the authorization page)

(CSS structure)
Styles are applied to pages:
* index.php
* registration.php
    
(PHP structure)


 Authorization * auth.php  
1. Server-side data filtering   
2. preparing and sending the sql SELECT query (selection by username and password)  
3. receiving and processing the result  

 
Registration * datasend.php  
1. Server-side data filtering  
2. preparing and sending several sql queries SELECT (login selection), INSERT (saving all data from the form)  
3. processing the result  

 
The user's home page * main.php  
1. Welcome text  

 
Authorization page * index.php:  
1. Authorization form  

 
Registration page * registrarion.php:  
1. Registration form  

 
Session destruction * outaccount.php:  
1. Log out to the authorization page  
2. Clearing session data  
    

# Reflection Questions - Activity 2: Forms in Laravel

## 1. What is the difference between GET and POST?

GET is used to request data from a server without modifying it. It appends parameters to the URL, making it visible and suitable for retrieving information. POST is used to submit data to the server that will create or modify resources. It sends data in the request body, keeping it hidden and secure, making it appropriate for handling sensitive information like form submissions.

## 2. Why do we use @csrf in forms?

@csrf generates a CSRF (Cross-Site Request Forgery) token that is embedded in the form. This token prevents unauthorized requests from other websites by ensuring that form submissions originate from your own application. When a form is submitted, Laravel verifies the token matches the one stored in the session, protecting against malicious attacks.

## 3. What is session used for in this activity?

Session in this activity is used to store the list of emails entered by the user. It persists data across page requests without using a database, allowing us to maintain state between the form submission and page reload. The session data remains available throughout the user's browser session until it is explicitly cleared or the session expires.

## 4. What happens if session is cleared?

If session is cleared, all stored emails list is deleted and lost. The user would see an empty email list on the next page load. Any data that was being held in the session becomes unavailable, and the application would start fresh as if no emails had been added. This is why we have the "Clear All" button functionality to explicitly manage session data.

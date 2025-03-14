/*!
* Start Bootstrap - Modern Business v5.0.7 (https://startbootstrap.com/template-overviews/modern-business)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-modern-business/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project
 // Dark mode & light mode
 const modeToggle = document.getElementById('modeToggle');
 const body = document.getElementById('body');
 const modeIcon = document.getElementById('modeIcon');

 // Check localStorage for the user's preference
 const currentMode = localStorage.getItem('mode');
 if (currentMode === 'dark') {
     body.classList.add('dark-mode');
     modeIcon.classList.remove('bi-brightness-high');
     modeIcon.classList.add('bi-moon');
 } else {
     body.classList.add('light-mode');
     modeIcon.classList.remove('bi-moon');
     modeIcon.classList.add('bi-brightness-high');
 }

 // Add click event listener to the toggle button
 modeToggle.addEventListener('click', () => {
     body.classList.toggle('dark-mode');
     body.classList.toggle('light-mode');

     // Update localStorage and icon based on the current mode
     if (body.classList.contains('dark-mode')) {
         localStorage.setItem('mode', 'dark');
         modeIcon.classList.remove('bi-brightness-high');
         modeIcon.classList.add('bi-moon');
     } else {
         localStorage.setItem('mode', 'light');
         modeIcon.classList.remove('bi-moon');
         modeIcon.classList.add('bi-brightness-high');
     }
 });
 

// Function to handle form submission
function handleSubmit(event) {
        event.preventDefault(); // Prevent the default form submission

        // Show notification message
        document.getElementById('notification').style.display = 'block';

        // Reset the form fields
        document.getElementById('contactForm').reset();

        // Optionally, you can hide the notification after a few seconds
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
        }, 3000); // Hides notification after 3 seconds

        return false; // Prevents the form from being submitted in the traditional way
    }

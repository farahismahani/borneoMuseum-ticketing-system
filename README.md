# borneoMuseum-ticketing-system
A responsive museum ticketing website built with Bootstrap &amp; Laravel, featuring an online booking system, slot availability, and a light/dark mode toggle.
Sure! Here’s your complete README.md for your Borneo Museum Ticketing System web development project. 🚀  

Borneo Museum Ticketing System  
A responsive web-based ticketing system for museum visitors, built using Bootstrap, Laravel, and MySQL.

Project Overview  
The Borneo Museum Ticketing System is a web application that allows visitors to book tickets online, check slot availability, and manage reservations efficiently. The system includes a user-friendly light/dark mode toggle and provides real-time booking updates.  

Features  
i.   Online Ticket Booking – Secure and efficient ticket purchase system  
ii.  Real-Time Slot Availability – Ensures users book within available slots  
iii. Light/Dark Mode Toggle – Improves accessibility for all users  
iv.  Admin Dashboard – Manage bookings, availability, and user data  
v.   Fully Responsive UI – Optimized for desktop, tablet, and mobile  

How to Run the Project  
A. Clone the Repository  
```
git clone https://github.com/yourusername/borneoMuseum-ticketing.git
cd borneoMuseum-ticketing
```
B. Install Dependencies  
Ensure Laravel, Composer, and MySQL are installed. Then, run:  
```
composer install
npm install
```
C. Set Up the Database  
1️⃣ Create a new MySQL database:  
```sql
CREATE DATABASE museum_ticketing;
```
2️⃣ Configure `.env` file:  
```sh
cp .env.example .env
php artisan key:generate
```
3️⃣ Run migrations & seed database:  
```sh
php artisan migrate --seed
```

D. Start the Server  
```sh
php artisan serve
```
Visit `http://127.0.0.1:8000/` to use the system.  

Tech Stack  
🔹 Frontend: HTML, CSS, Bootstrap, JavaScript  
🔹 Backend: Laravel (PHP Framework)  
🔹 Database: MySQL  
🔹 Version Control: Git & GitHub  


Screenshots / Demo  
🖼️ Booking Page UI ![image](https://github.com/user-attachments/assets/1f7e1d4b-41be-4808-9510-1794116035d5)
🖼️ Light & Dark Mode Toggle ![image](https://github.com/user-attachments/assets/1672476a-f4bc-4846-b8d6-b95c4cee3e94)
🖼️ About Page ![image](https://github.com/user-attachments/assets/d0a1df09-d19b-4f15-ac19-bc62e69662c0)


 👥 7. Author / Credits  
Developed by:  
- farah ismahani
- abdul mujar

Special thanks to UNIMAS, Dr Rehman and the Laravel community.  

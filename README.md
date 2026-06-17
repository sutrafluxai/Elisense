# Elisense Enterprise - Corporate Website 🌍🚢

A dynamic, fully responsive corporate website built for **Elisense Enterprise**, a company specializing in International Product Sourcing and Global Trade. This project showcases the company's services, global reach, success stories, and industry insights, while providing interactive tools for clients to connect and book meetings.

## 🚀 Key Features

* **Interactive UI/UX:** Smooth scrolling, hover animations, and dynamic carousels using pure HTML, CSS, and Vanilla JavaScript.
* **Fully Responsive Design:** Optimized for desktop, tablet, and mobile viewing with a custom hamburger navigation menu.
* **Integrated Booking System:** Direct Google Calendar integration (`bookmeeting.php`) allowing clients to schedule consultations seamlessly.
* **Dynamic Contact Form:** A functional contact page (`contact.php`) that securely captures user inquiries and stores them in a MySQL database using PHP prepared statements.
* **Insights & News:** A dedicated news section (`insights.php`) with interactive pop-up articles and a functional newsletter subscription form.
* **Success Stories:** A showcase of global partnerships and case studies (`success.php`) featuring a custom video lightbox modal.

## 🛠️ Tech Stack

* **Frontend:** HTML5, CSS3, JavaScript (Vanilla), FontAwesome (Icons), AOS (Animate on Scroll)
* **Backend:** PHP 8.x
* **Database:** MySQL (via XAMPP)

## 📂 Project Structure

* `home.php` - Main landing page with company overview, philosophy, and interactive global map.
* `bookmeeting.php` - Dedicated scheduling page featuring Google Calendar iframe integration.
* `contact.php` - Client inquiry form with backend PHP/MySQL processing.
* `insights.php` - Industry news, company updates, and newsletter subscription form.
* `success.php` - Client testimonials, case studies, and multimedia gallery.
* `/images/` - Directory for local graphical assets.

## 💻 Local Setup & Installation

To run this project locally, you will need a local server environment like **XAMPP**, **WAMP**, or **MAMP**.

1.  **Clone the repository:**
    ```bash
    git clone [https://github.com/skhajipara/Elisense-Enterprise.git](https://github.com/skhajipara/Elisense-Enterprise.git)
    ```
2.  **Move to local server:**
    Place the cloned folder into your server's root directory (e.g., `htdocs` for XAMPP).
3.  **Start Services:**
    Open the XAMPP Control Panel and start **Apache** and **MySQL**.
4.  **Database Setup:**
    The application is designed to automatically create the `elisense` database and necessary tables (`inquires`, `emails`) upon the first submission of the contact or subscription forms. Alternatively, you can create the database manually in phpMyAdmin.
5.  **Run the application:**
    Open your browser and navigate to: `http://localhost/elisense/home.php` (adjust the folder name if necessary).

## 🔒 Security Notes
* Ensure that proper database credentials (host, user, pass) are updated in `contact.php` and `insights.php` before deploying to a production server. 
* Never commit private keys, real database passwords, or `.env` files to this repository.

## 📄 License
This project is proprietary and created for Elisense Enterprise.

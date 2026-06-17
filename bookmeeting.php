<?php
$currentYear = date("Y");
$companyName = "Elisense Enterprise";
$companyTagline = "A Revolution in International Product Sourcing and Global Trade";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta name="description" content="Book a meeting with Elisense Enterprise to discuss global trade and sourcing needs." />
  <title>Elisense Enterprise - International Product Sourcing & Global Trade</title>

  <!-- Font Awesome for hamburger icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    /* Your navbar styles */
    nav {
      position: sticky;
      top: 0;
      z-index: 1000;
      background: #00408079;
      height: 80px;
      box-shadow: none;
      backdrop-filter: none;
      display: flex;
      align-items: center;
      transition: background-color 0.3s ease;
      padding: 0 1rem;
    }

    nav .container {
      max-width: 1100px;
      margin: 0 auto;
      width: 100%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 100%;
    }

    nav .brand {
      font-weight: 700;
      font-size: 1.7rem;
      color: white;
      text-decoration: none;
      letter-spacing: 2px;
      cursor: pointer;
      user-select: none;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 2.5rem;
      margin: 0;
      padding: 0;
      height: 100%;
      align-items: center;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      padding: 0.75rem 0;
      position: relative;
      transition: color 0.3s, background-color 0.3s;
      border-radius: 6px;
    }

    nav ul li a:hover,
    nav ul li a:focus {
      color: #004080;
      outline: none;
    }

    nav ul li a::after {
      display: none;
    }

    nav .cta-button {
      background-color: #007acc;
      color: white;
      padding: 0.55rem 1.6rem;
      border-radius: 30px;
      font-weight: 700;
      font-size: 1rem;
      border: none;
      cursor: pointer;
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
      text-decoration: none;
      user-select: none;
      height: 44px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    nav .cta-button:hover,
    nav .cta-button:focus {
      background-color: #005fa3;
      box-shadow: 0 6px 18px rgba(0, 95, 163, 0.8);
    }

    /* Responsive Menu */
    .menu-toggle {
      display: none;
      font-size: 1.8rem;
      color: white;
      cursor: pointer;
    }

    @media (max-width: 768px) {
      nav ul {
        display: none;
        /* hide by default */
        flex-direction: column;
        position: absolute;
        top: 80px;
        right: 1rem;
        background: #004080;
        padding: 1rem;
        border-radius: 6px;
        width: auto;
        min-width: 180px;
        max-width: calc(100vw - 2rem);
        gap: 1rem;
        white-space: normal;
      }

      nav .cta-button {
        display: none;
        /* hide desktop CTA */
      }

      .menu-toggle {
        display: block;
      }
    }
  </style>
</head>

<body style="margin:0; font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji';">
  <nav role="navigation" aria-label="Primary">
    <div class="container">
      <a href="/" class="brand">Elisense Enterprise</a>

      <!-- Navigation Links Container -->
      <ul id="nav-links">
        <li><a href="/">Home</a></li>
        <li><a href="./success.php">Success</a></li>
        <li><a href="./insights.php">Insights</a></li>
        <li><a href="./contact.php">Contact</a></li>
      </ul>

      <a href="./bookmeeting.php" class="cta-button">Book Meeting</a>

      <!-- Hamburger -->
      <div class="menu-toggle" id="menu-toggle" aria-label="Toggle Menu" aria-expanded="false" role="button"
        tabindex="0">
        <i class="fas fa-bars"></i>
      </div>
    </div>
  </nav>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const toggle = document.getElementById("menu-toggle");
      const menu = document.getElementById("nav-links");

      toggle.addEventListener("click", function () {
        if (menu.style.display === "block") {
          menu.style.display = "none";
          this.setAttribute("aria-expanded", "false");
          this.innerHTML = '<i class="fas fa-bars"></i>';
        } else {
          menu.style.display = "block";
          this.setAttribute("aria-expanded", "true");
          this.innerHTML = '<i class="fas fa-times"></i>';
        }
      });

      // Optional: support toggling with keyboard keys
      toggle.addEventListener("keydown", function (e) {
        if (e.key === "Enter" || e.key === " " || e.key === "Spacebar") {
          e.preventDefault();
          this.click();
        }
      });
    });

  </script>



<!-- 1. Hero Section -->
<section id="hero-book-meeting" style="margin-top:-80px;width:100vw;max-width:100vw; box-sizing:border-box;position:relative; min-height:100vh; display:flex;flex-direction:column;justify-content:center;align-items:center; text-align:center; padding:4vw 2vw; background: linear-gradient(135deg, rgba(0,175,255,0.85), rgba(0,95,163,0.85)), url('https://images.unsplash.com/photo-1507679799987-c73779587ccf?auto=format&fit=crop&w=1470&q=80') no-repeat center center/cover;">
  <div style="max-width:700px; width:90vw; color:#fff; position:relative; z-index:1;">
    <h1 style="font-size:3rem; font-weight:800; margin-bottom:1vh; line-height:1.1;">Let’s Connect & Build Success Together</h1>
    <p style="font-size:1.3rem; margin-bottom:3vh; font-weight:500;">
      Schedule a meeting with Elisense and explore global trade opportunities tailored to your needs.
    </p>
    <button id="book-now-hero" aria-label="Book your meeting now" style="padding:1em 2.5em; background:#00afff; border:none; border-radius:30px; font-weight:700; font-size:1.1rem; cursor:pointer; color:#fff; box-shadow:0 4px 15px rgba(0,175,255,0.6); transition:box-shadow 0.3s;">
      Book Your Meeting Now
    </button>
  </div>
</section>

<!-- 2. Why Book With Us (Trust Section) -->
<section id="why-partner" style="width:100vw; max-width:100vw; margin:0 auto; padding:5vw 2vw; background:#f5fbff;">
  <h2 style="color:#005fa3; font-size:2.4rem; text-align:center; margin-bottom:3vw;">Why Partner with Elisense?</h2>
  <div style="max-width:1200px; margin:0 auto; display:flex; flex-wrap:wrap; justify-content:center; gap:3vw;">

    <!-- Single Column -->
    <div style="flex:1 1 280px; max-width:320px; background:#fff; border-radius:18px; padding:2.5vw; box-shadow:0 4px 16px rgba(0,95,163,0.08); text-align:center; transition:transform 0.3s; cursor:default;">
      <div style="font-size:3.5rem; margin-bottom:1.2rem; transition:transform 0.3s;" class="icon-globe">🌍</div>
      <h3 style="color:#007acc; font-size:1.3rem; margin-bottom:0.8rem;">Global Sourcing Experts</h3>
      <p style="color:#444; font-size:1rem; line-height:1.4;">
        Leveraging worldwide networks to source the finest products for your business success.
      </p>
    </div>

    <div style="flex:1 1 280px; max-width:320px; background:#fff; border-radius:18px; padding:2.5vw; box-shadow:0 4px 16px rgba(0,95,163,0.08); text-align:center; transition:transform 0.3s; cursor:default;">
      <div style="font-size:3.5rem; margin-bottom:1.2rem; transition:transform 0.3s;" class="icon-ship">🚢</div>
      <h3 style="color:#007acc; font-size:1.3rem; margin-bottom:0.8rem;">Seamless Export Process</h3>
      <p style="color:#444; font-size:1rem; line-height:1.4;">
        Comprehensive end-to-end services ensuring smooth and timely exports worldwide.
      </p>
    </div>

    <div style="flex:1 1 280px; max-width:320px; background:#fff; border-radius:18px; padding:2.5vw; box-shadow:0 4px 16px rgba(0,95,163,0.08); text-align:center; transition:transform 0.3s; cursor:default;">
      <div style="font-size:3.5rem; margin-bottom:1.2rem; transition:transform 0.3s;" class="icon-trusted">🤝</div>
      <h3 style="color:#007acc; font-size:1.3rem; margin-bottom:0.8rem;">Trusted by Clients Worldwide</h3>
      <p style="color:#444; font-size:1rem; line-height:1.4;">
        Building long-lasting relationships based on trust, quality, and reliability.
      </p>
    </div>
  </div>

  <style>
    #why-partner div:hover {
      transform: translateY(-8px);
    }
  </style>
</section>

<!-- 3. Google Calender Integration Section -->
<section id="calendar-section" style="width:100vw; max-width:100vw; margin:0 auto; padding:6vw 2vw; background:#fff;">
  <h2 style="color:#005fa3; font-size:2.5rem; text-align:center; margin-bottom:3vw;">Schedule Your Meeting</h2>
  <div style="max-width:900px; margin:0 auto; background:#fff; border-radius:22px; box-shadow: 0 10px 30px rgba(0,95,163,0.1); overflow:hidden;">
    
    <iframe src="https://calendar.app.google/TpaiW27cm1huVdjh9" style="border: 0; width: 100%; height: 630px;" frameborder="0" scrolling="yes"></iframe>
    
  </div>
</section>

<!-- 4. Call-to-Action Banner (Bottom) -->
<section id="cta-booking" style="width:100vw; max-width:100vw; box-sizing:border-box; margin:6vw auto 4vw auto; padding:3vw 2vw; background: linear-gradient(90deg, #00afff 80%, #005fa3 100%); border-radius:22px; display:flex; flex-direction:column; align-items:center; text-align:center;">
  <blockquote style="color:#fff; font-size:1.6rem; font-style:italic; margin-bottom:2vw; line-height:1.4; max-width:700px; width:90vw;">
    Your success story starts with a single conversation.
  </blockquote>
  <button id="book-now-bottom" aria-label="Book a meeting today" style="padding:1em 2.5em; background:#fff; border:none; border-radius:30px; font-weight:700; font-size:1.3rem; cursor:pointer; color:#00afff; box-shadow:0 4px 15px rgba(0,175,255,0.6); transition:box-shadow 0.3s;">
    Book a Meeting Today
  </button>
</section>

<!-- Smooth scroll JavaScript -->
<script>
  function scrollToCalendar() {
    const calendarSection = document.getElementById('calendar-section');
    calendarSection.scrollIntoView({behavior: 'smooth', block: 'start'});
  }

  document.getElementById('book-now-hero').addEventListener('click', scrollToCalendar);
  document.getElementById('book-now-bottom').addEventListener('click', scrollToCalendar);
</script>



  <footer role="contentinfo" aria-label="Site Footer"
    style="background: #002f55; color: #ccc; padding: 3rem 1rem 2rem; margin-top: 4rem;">
    <div class="footer-container"
      style="max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem;">

      <!-- Call to Action -->
      <section class="footer-column" aria-labelledby="footer-cta-title"
        style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
        <h2 id="footer-cta-title" style="color: #00aaff; font-size: 1.8rem; margin-bottom: 1rem;">Ready to Elevate Your
          Global Sourcing?</h2>
        <a href="/bookmeeting.php" class="footer-cta"
          style="display: inline-block; background-color: #00aaff; color: white; padding: 1rem 2.5rem; border-radius: 40px; font-weight: 700; text-decoration: none; transition: background-color 0.3s ease;"
          onmouseover="this.style.backgroundColor='#007acc';" onmouseout="this.style.backgroundColor='#00aaff';"
          aria-label="Book a meeting with Elisense Enterprise">
          Book a Meeting
        </a>
      </section>

      <!-- Quick Links -->
      <section class="footer-column" aria-label="Footer Quick Links"
        style="flex: 1 1 200px; min-width: 200px; padding: 0 0.5rem;">
        <h3 style="color: #00aaff; margin-bottom: 1rem; font-weight: 700;">Quick Links</h3>
        <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
          <li><a href="/#hero" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
              onmouseout="this.style.color='#ccc';">Home</a></li>
          <li><a href="/#about-carousel-section" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">About Us</a></li>
          <li><a href="/#certifications-compliance-section" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Certifications</a></li>
          <li><a href="/#problem-cta-section" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Solutions</a></li>
          <li><a href="/contact.php" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
              onmouseout="this.style.color='#ccc';">Contact</a></li>
          <li><a href="/shipping-policy" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Shipping Policy</a></li>
          <li><a href="/return-policy" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Return Policy</a></li>
          <li><a href="/privacy-policy" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Privacy Policy</a></li>
          <li><a href="/legal" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
              onmouseout="this.style.color='#ccc';">Legal</a></li>
        </ul>
      </section>

      <!-- Contact Info -->
      <section class="footer-column" aria-label="Contact Information"
        style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
        <h3 style="color: #00aaff; margin-bottom: 1rem; font-weight: 700;">Contact Us</h3>
        <p style="margin: 0 0 0.8rem;">Email: <a href="mailto:elisenseenterprise@gmail.com"
            style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
            onmouseout="this.style.color='#ccc';">elisenseenterprise@gmail.com</a></p>
        <p style="margin: 0 0 0.8rem;">Phone: <a href="tel:+919978099097" style="color: #ccc; text-decoration: none;"
            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">+91 9978099097</a></p>
        <p style="margin: 0 0 1rem;">Follow us:</p>
        <div style="display: flex; gap: 1rem; font-size: 1.5rem;">
          <a href="https://www.facebook.com/elisenseenterprise" target="_blank" rel="noopener" aria-label="Facebook"
            style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#3b5998';"
            onmouseout="this.style.color='#ccc';"><i class="fab fa-facebook"></i></a>
          <a href="https://www.twitter.com/elisenseent" target="_blank" rel="noopener" aria-label="Twitter"
            style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#00acee';"
            onmouseout="this.style.color='#ccc';"><i class="fab fa-twitter"></i></a>
          <a href="https://www.linkedin.com/company/elisenseenterprise" target="_blank" rel="noopener"
            aria-label="LinkedIn" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#0e76a8';"
            onmouseout="this.style.color='#ccc';"><i class="fab fa-linkedin"></i></a>
          <a href="https://wa.me/919978099097" target="_blank" rel="noopener" aria-label="WhatsApp"
            style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#25d366';"
            onmouseout="this.style.color='#ccc';"><i class="fab fa-whatsapp"></i></a>
        </div>
      </section>
    </div>

    <div style="text-align: center; font-size: 0.9rem; color: #666; margin-top: 2.5rem;">
      &copy; <?php echo date('Y'); ?> Elisense Enterprise. All rights reserved.
    </div>

    <style>
      /* Responsive footer columns */
      @media (max-width: 768px) {
        .footer-column {
          flex: 1 1 100% !important;
          min-width: auto !important;
          padding: 0 !important;
        }

        .footer-container {
          gap: 1.5rem !important;
        }
      }
    </style>
  </footer>

</body>

</html>
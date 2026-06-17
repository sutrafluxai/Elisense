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
  <meta name="description" content="Elisense Enterprise - demo page." />
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
    display: none; /* hide by default */
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
    display: none; /* hide desktop CTA */
  }

  .menu-toggle {
    display: block;
  }
}


  </style>
</head>
<body style="font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji';">
  <nav role="navigation" aria-label="Primary">
  <div class="container">
    <a href="#hero" class="brand">Elisense Enterprise</a>

    <!-- Navigation Links Container -->
    <ul id="nav-links">
      <li><a href="#hero">Home</a></li>
      <li><a href="./success.php">Success</a></li>
      <li><a href="#insights">Insights</a></li>
      <li><a href="#events">Events</a></li>
      <li><a href="#contact">Contact</a></li>
    </ul>

    <a href="#contact" class="cta-button">Book Meeting</a>

    <!-- Hamburger -->
    <div class="menu-toggle" id="menu-toggle" aria-label="Toggle Menu" aria-expanded="false" role="button" tabindex="0">
      <i class="fas fa-bars"></i>
    </div>
  </div>
</nav>

<script>
    document.addEventListener("DOMContentLoaded", function() {
  const toggle = document.getElementById("menu-toggle");
  const menu = document.getElementById("nav-links");

  toggle.addEventListener("click", function() {
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
  toggle.addEventListener("keydown", function(e) {
    if (e.key === "Enter" || e.key === " " || e.key === "Spacebar") {
      e.preventDefault();
      this.click();
    }
  });
});

</script>




<footer role="contentinfo" aria-label="Site Footer" style="background: #002f55; color: #ccc; padding: 3rem 1rem 2rem; margin-top: 4rem;">
  <div class="footer-container" style="max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem;">
    
    <!-- Call to Action -->
    <section class="footer-column" aria-labelledby="footer-cta-title" style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
      <h2 id="footer-cta-title" style="color: #00aaff; font-size: 1.8rem; margin-bottom: 1rem;">Ready to Elevate Your Global Sourcing?</h2>
      <a href="#contact" class="footer-cta" 
         style="display: inline-block; background-color: #00aaff; color: white; padding: 1rem 2.5rem; border-radius: 40px; font-weight: 700; text-decoration: none; transition: background-color 0.3s ease;"
         onmouseover="this.style.backgroundColor='#007acc';" onmouseout="this.style.backgroundColor='#00aaff';"
         aria-label="Book a meeting with Elisense Enterprise">
         Book a Meeting
      </a>
    </section>

    <!-- Quick Links -->
    <section class="footer-column" aria-label="Footer Quick Links" style="flex: 1 1 200px; min-width: 200px; padding: 0 0.5rem;">
      <h3 style="color: #00aaff; margin-bottom: 1rem; font-weight: 700;">Quick Links</h3>
      <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
        <li><a href="#hero" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Home</a></li>
        <li><a href="#about-carousel-section" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">About Us</a></li>
        <li><a href="#certifications-compliance-section" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Certifications</a></li>
        <li><a href="#problem-cta-section" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Solutions</a></li>
        <li><a href="#contact" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Contact</a></li>
        <li><a href="/shipping-policy" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Shipping Policy</a></li>
        <li><a href="/return-policy" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Return Policy</a></li>
        <li><a href="/privacy-policy" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Privacy Policy</a></li>
        <li><a href="/legal" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Legal</a></li>
      </ul>
</section>

    <!-- Contact Info -->
    <section class="footer-column" aria-label="Contact Information" style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
      <h3 style="color: #00aaff; margin-bottom: 1rem; font-weight: 700;">Contact Us</h3>
      <p style="margin: 0 0 0.8rem;">Email: <a href="mailto:contact@elisenseenterprise.com" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">contact@elisenseenterprise.com</a></p>
      <p style="margin: 0 0 0.8rem;">Phone: <a href="tel:+1234567890" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">+1 (234) 567-890</a></p>
      <p style="margin: 0 0 1rem;">Follow us:</p>
      <div style="display: flex; gap: 1rem; font-size: 1.5rem;">
        <a href="https://www.facebook.com/elisenseenterprise" target="_blank" rel="noopener" aria-label="Facebook" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#3b5998';" onmouseout="this.style.color='#ccc';"><i class="fab fa-facebook"></i></a>
        <a href="https://www.twitter.com/elisenseent" target="_blank" rel="noopener" aria-label="Twitter" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#00acee';" onmouseout="this.style.color='#ccc';"><i class="fab fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/elisenseenterprise" target="_blank" rel="noopener" aria-label="LinkedIn" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#0e76a8';" onmouseout="this.style.color='#ccc';"><i class="fab fa-linkedin"></i></a>
        <a href="https://wa.me/1234567890" target="_blank" rel="noopener" aria-label="WhatsApp" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#25d366';" onmouseout="this.style.color='#ccc';"><i class="fab fa-whatsapp"></i></a>
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

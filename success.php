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
  <meta name="description" content="See Elisense Enterprise success stories: trusted sourcing, timely delivery, and global trade results." />
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
      <a href="#hero" class="brand">Elisense Enterprise</a>

      <!-- Navigation Links Container -->
      <ul id="nav-links">
        <li><a href="./home.php">Home</a></li>
        <li><a href="./success.php">Success</a></li>
        <li><a href="./insights.php">Insights</a></li>
        <li><a href="./contact.php">Contact Us</a></li>
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

  <!-- Add this to your <head> for mobile responsiveness -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- 1. Hero Section -->
  <section id="hero-success"
    style="width:100vw;max-width:100vw;box-sizing:border-box;margin-top: -80px; auto;position:relative;min-height:100vh;display:flex;flex-direction:column;justify-content:center;align-items:center; background:linear-gradient(135deg, #005fa3 60%, #005fa3 100%); overflow:hidden; text-align:center;">
    <!-- Overlay world map for style, keep for SEO and theme -->
    <svg viewBox="0 0 1200 600"
      style="position:absolute;top:0;left:0;width:100vw;height:100vh;z-index:0;opacity:0.12; pointer-events:none;"
      aria-label="World map representing Elisense's global reach">
      <path d="M200,300Q300,150,400,300T600,300T800,250Q900,100,1100,300" fill="none" stroke="#007acc"
        stroke-width="40" />
    </svg>
    <!-- Local image background -->
    <div
      style="position:absolute;top:0;left:0;width:100vw;height:100vh;z-index:0; opacity:0.18; background-image:url('./images/success-hero.jpg'); background-size:cover; background-position:center;">
    </div>
    <div style="position:relative;z-index:1;width:90vw;max-width:700px;padding-top:9vh;padding-bottom:9vh;">
      <h1 style="color:#fff;font-size:2.6rem;font-weight:800;line-height:1.2;margin-bottom:2vh;">Global Success Stories
        with Elisense</h1>
      <p style="color:#e6f4ff;font-size:1.3rem;margin-bottom:3vh;">From procurement to delivery, our clients trust us to
        source the best—seamlessly and globally.</p>
    </div>
  </section>


  <!-- 2. Client Testimonials Carousel -->
  <section id="testimonials-success"
    style="width:100vw;max-width:100vw;box-sizing:border-box;margin:0 auto;padding:5vw 0;background:#f5fbff;">
    <div style="width:95vw;max-width:1200px;margin:0 auto;">
      <h2 style="color:#005fa3;font-size:2rem;text-align:center;margin-bottom:2vw;">Trusted by Global Clients</h2>
      <div id="testimonial-carousel"
        style="display:flex;justify-content:center;align-items:center;gap:2vw;flex-wrap:wrap;">
        <div class="testimonial-card"
          style="background:#fff;border-radius:22px;box-shadow:0 4px 16px rgba(0,95,163,0.10);padding:2vw;max-width:330px;width:100%;margin:1vw;transition:transform 0.3s;">
          <div style="font-size:1.2rem;color:#FFD700;margin-bottom:0.5em;">★★★★★</div>
          <img
            src="https://images.unsplash.com/photo-1517841905240-472988babdf9?auto=format&fit=facearea&w=56&h=56&facepad=2"
            alt="Sunrise Foods logo - global sourcing client"
            style="width:56px;height:56px;border-radius:50%;object-fit:cover;margin-bottom:1vw;">
          <div style="font-weight:600;color:#005fa3;margin-bottom:0.2em;">Alicia Tejeda – Sunrise Foods 🇪🇸</div>
          <p style="color:#444;">Reliable sourcing across continents. Our business has expanded seamlessly with
            Elisense's dedication and expertise.</p>
        </div>
        <div class="testimonial-card"
          style="background:#fff;border-radius:22px;box-shadow:0 4px 16px rgba(0,95,163,0.10);padding:2vw;max-width:330px;width:100%;margin:1vw;transition:transform 0.3s;">
          <div style="font-size:1.2rem;color:#FFD700;margin-bottom:0.5em;">★★★★★</div>
          <img
            src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?auto=format&fit=facearea&w=56&h=56&facepad=2"
            alt="Agro Africa logo - procurement client Africa"
            style="width:56px;height:56px;border-radius:50%;object-fit:cover;margin-bottom:1vw;">
          <div style="font-weight:600;color:#005fa3;margin-bottom:0.2em;">Isaac Mwangi – Agro Africa 🇰🇪</div>
          <p style="color:#444;">Efficient delivery and quality products—Elisense made international trade simple and
            trustworthy for us.</p>
        </div>
        <div class="testimonial-card"
          style="background:#fff;border-radius:22px;box-shadow:0 4px 16px rgba(0,95,163,0.10);padding:2vw;max-width:330px;width:100%;margin:1vw;transition:transform 0.3s;">
          <div style="font-size:1.2rem;color:#FFD700;margin-bottom:0.5em;">★★★★★</div>
          <img
            src="https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?auto=format&fit=facearea&w=56&h=56&facepad=2"
            alt="EuroChem logo - industrial raw materials supply Europe"
            style="width:56px;height:56px;border-radius:50%;object-fit:cover;margin-bottom:1vw;">
          <div style="font-weight:600;color:#005fa3;margin-bottom:0.2em;">Julie Fenet – EuroChem 🇫🇷</div>
          <p style="color:#444;">Outstanding support through every stage. Elisense delivers excellence at scale.</p>
        </div>
      </div>
    </div>
    <script>
      document.querySelectorAll('.testimonial-card').forEach(card => {
        card.addEventListener('mouseover', () => card.style.transform = 'scale(1.04)');
        card.addEventListener('mouseout', () => card.style.transform = 'scale(1)');
      });
    </script>
  </section>

  <!-- 3. Case Studies / Success Stories Section -->
  <section id="success-cases"
    style="width:100vw;max-width:100vw;box-sizing:border-box;margin:0 auto;padding:5vw 0;background:#e6f4ff;">
    <div style="width:95vw;max-width:1200px;margin:0 auto;">
      <h2 style="color:#007acc;font-size:2rem;text-align:center;margin-bottom:3vw;">Successful Partnerships in Action
      </h2>
      <div style="display:grid;grid-template-columns:repeat(auto-fit,minmax(300px,1fr));gap:2vw;">
        <article class="case-card"
          style="background:#fff;border-radius:18px;box-shadow:0 4px 16px rgba(0,127,204,0.10);padding:1.5vw;transition:box-shadow 0.3s,transform 0.3s;">
          <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=800&q=80"
            alt="Bamboo Salt export to Middle East - Elisense Enterprise case study"
            style="width:100%;height:180px;object-fit:cover;border-radius:14px 14px 0 0;margin-bottom:1vw;">
          <h3 style="color:#005fa3;margin-bottom:0.5vw;">Bamboo Salt Export to Middle East</h3>
          <p style="color:#444;">Challenge: Sourcing specialty salts for Middle Eastern health markets.<br>Solution:
            Elisense’s supply chain matched niche demand smoothly.<br>Result: 100% client satisfaction and expanded
            regional sales.</p>
        </article>
        <article class="case-card"
          style="background:#fff;border-radius:18px;box-shadow:0 4px 16px rgba(0,127,204,0.10);padding:1.5vw;transition:box-shadow 0.3s,transform 0.3s;">
          <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=800&q=80"
            alt="Agricultural Equipment sourcing for Africa - success story"
            style="width:100%;height:180px;object-fit:cover;border-radius:14px 14px 0 0;margin-bottom:1vw;">
          <h3 style="color:#005fa3;margin-bottom:0.5vw;">Agricultural Equipment Sourcing for Africa</h3>
          <p style="color:#444;">Challenge: Complex procurement for diverse agricultural needs.<br>Solution: Global
            vendor network sourced certified equipment swiftly.<br>Result: Increased yields and robust client
            relationships in Africa.</p>
        </article>
        <article class="case-card"
          style="background:#fff;border-radius:18px;box-shadow:0 4px 16px rgba(0,127,204,0.10);padding:1.5vw;transition:box-shadow 0.3s,transform 0.3s;">
          <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80"
            alt="Industrial Raw Materials supply to Europe - global trade success"
            style="width:100%;height:180px;object-fit:cover;border-radius:14px 14px 0 0;margin-bottom:1vw;">
          <h3 style="color:#005fa3;margin-bottom:0.5vw;">Industrial Raw Materials Supply to Europe</h3>
          <p style="color:#444;">Challenge: Bulk delivery under strict EU standards.<br>Solution: End-to-end logistics
            and compliance.<br>Result: Cost reduction and steady, scalable supply chain.</p>
        </article>
      </div>
    </div>
    <style>
      #success-cases .case-card:hover {
        box-shadow: 0 8px 24px rgba(0, 127, 204, 0.20);
        transform: translateY(-4px) scale(1.04);
      }

      @media (max-width:700px) {
        #success-cases div {
          grid-template-columns: 1fr;
        }

        #success-cases img {
          height: 120px;
        }
      }
    </style>
  </section>

  <!-- 4. Photo & Video Gallery -->
  <section id="gallery-success"
    style="width:100vw;max-width:100vw;box-sizing:border-box;margin:0 auto;padding:5vw 0;background:#fff;">
    <div style="width:95vw;max-width:1200px;margin:0 auto;">
      <h2 style="color:#005fa3;text-align:center;font-size:2rem;margin-bottom:2vw;">Our Global Trade in Action</h2>
      <div id="gallery-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(230px,1fr));gap:1.2vw;">
        <figure style="margin:0;position:relative;">
          <img src="https://images.unsplash.com/photo-1502086223501-3c6b2a6c1a69?auto=format&fit=crop&w=800&q=80"
            alt="Shipping container being loaded for global export" style="width:100%;border-radius:12px;">
        </figure>
        <figure style="margin:0;position:relative;">
          <img src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?auto=format&fit=crop&w=800&q=80"
            alt="Busy international port - Elisense" style="width:100%;border-radius:12px;">
        </figure>
        <figure style="margin:0;position:relative;">
          <img src="https://images.unsplash.com/photo-1468421870903-4df1664ac249?auto=format&fit=crop&w=800&q=80"
            alt="Sealed bulk shipment ready for delivery" style="width:100%;border-radius:12px;">
        </figure>
        <!-- Video thumbnails -->
        <figure style="margin:0;position:relative;cursor:pointer;">
          <img src="https://images.unsplash.com/photo-1508921912186-1d1a45ebb3c1?auto=format&fit=crop&w=800&q=80"
            alt="Video thumbnail - overseas logistics process" style="width:100%;border-radius:12px;">
          <div class="play-btn"
            style="position:absolute;bottom:8px;right:12px;width:44px;height:44px;background:rgba(0,175,255,0.7);border-radius:50%;display:flex;align-items:center;justify-content:center;">
            <span style="color:#fff;font-size:1.9rem;">▶</span>
          </div>
        </figure>
        <figure style="margin:0;position:relative;cursor:pointer;">
          <img src="https://images.unsplash.com/photo-1446776811953-b85815fd7a79?auto=format&fit=crop&w=800&q=80"
            alt="Video thumbnail - procurement site" style="width:100%;border-radius:12px;">
          <div class="play-btn"
            style="position:absolute;bottom:8px;right:12px;width:44px;height:44px;background:rgba(0,127,204,0.7);border-radius:50%;display:flex;align-items:center;justify-content:center;">
            <span style="color:#fff;font-size:1.9rem;">▶</span>
          </div>
        </figure>
      </div>
    </div>
    <!-- Lightbox modal for videos (inline JS) -->
    <div id="video-modal"
      style="position:fixed;top:0;left:0;width:100vw;height:100vh;display:none;justify-content:center;align-items:center;background:rgba(0,0,0,0.65);z-index:999;">
      <video id="modal-video" controls autoplay
        style="max-width:90vw;max-height:80vh;border-radius:12px;box-shadow:0 8px 32px rgba(0,127,204,0.22);"></video>
    </div>
    <script>
      document.querySelectorAll('#gallery-grid figure').forEach((fig, idx) => {
        fig.addEventListener('click', function () {
          if (fig.querySelector('.play-btn')) {
            document.getElementById('video-modal').style.display = 'flex';
            document.getElementById('modal-video').src = idx == 3 ? 'https://cdn.coverr.co/videos/coverr-ocean-freight-1630/1080p.mp4' : 'https://cdn.coverr.co/videos/coverr-industrial-shipment-1632/1080p.mp4';
          }
        });
      });
      document.getElementById('video-modal').onclick = function (e) {
        if (e.target === this) { this.style.display = 'none'; document.getElementById('modal-video').src = ''; }
      };
    </script>
    <style>
      @media (max-width:650px) {
        #gallery-grid {
          grid-template-columns: 1fr;
        }
      }
    </style>
  </section>

  <!-- 5. Call-to-Action Banner -->
  <section id="cta-banner"
    style="width:100vw;max-width:100vw;box-sizing:border-box;margin:0 auto;padding:3vw 0;background:linear-gradient(90deg,#005fa3 80%,#005fa3 100%);display:flex;flex-direction:column;align-items:center;text-align:center;border-radius:22px;">
    <div style="width:90vw;max-width:700px;margin:0 auto;">
      <blockquote style="color:#fff;font-size:1.5rem;font-style:italic;margin-bottom:2vw;">
        "Your success is our success. Let’s make your next procurement seamless."
      </blockquote>
      <a href="https://calendly.com/elisense-enterprise/book-meeting" target="_blank"
        style="display:inline-block;padding:0.85em 2.3em;background:#fff;color:#00afff;font-weight:700;border-radius:12px;font-size:1.2rem;text-decoration:none;box-shadow:0 4px 16px rgba(0,175,255,0.08);transition:box-shadow 0.18s,background 0.18s;">
        Book a Meeting
      </a>
    </div>
    <script>
      document.querySelector('#cta-banner a').onmouseover = function () {
        this.style.boxShadow = "0 8px 32px rgba(0,175,255,0.22)";
        this.style.background = "#e6f4ff";
      }
      document.querySelector('#cta-banner a').onmouseout = function () {
        this.style.boxShadow = "0 4px 16px rgba(0,175,255,0.08)";
        this.style.background = "#fff";
      }
    </script>
  </section>



  <footer role="contentinfo" aria-label="Site Footer"
    style="background: #002f55; color: #ccc; padding: 3rem 1rem 2rem; margin-top: 4rem;">
    <div class="footer-container"
      style="max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem;">

      <!-- Call to Action -->
      <section class="footer-column" aria-labelledby="footer-cta-title"
        style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
        <h2 id="footer-cta-title" style="color: #00aaff; font-size: 1.8rem; margin-bottom: 1rem;">Ready to Elevate Your
          Global Sourcing?</h2>
        <a href="#contact" class="footer-cta"
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
          <li><a href="#hero" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
              onmouseout="this.style.color='#ccc';">Home</a></li>
          <li><a href="#about-carousel-section" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">About Us</a></li>
          <li><a href="#certifications-compliance-section" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Certifications</a></li>
          <li><a href="#problem-cta-section" style="color: #ccc; text-decoration: none;"
              onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Solutions</a></li>
          <li><a href="#contact" style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
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
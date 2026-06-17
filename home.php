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
    <meta name="description" content="Elisense Enterprise provides international product sourcing and global trade solutions with integrity and speed." />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <title>Elisense Enterprise - International Product Sourcing & Global Trade</title>
    <meta name="description"
        content="Elisense Enterprise leads the revolution in international product sourcing and global trade. Explore our global reach, certifications, and tailored sourcing solutions." />
    <meta name="keywords"
        content="International trade, product sourcing, global trade, certifications, sourcing solutions, imports, exports" />
    <meta name="author" content="Elisense Enterprise" />
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />
    <style>
        /* Reset & base */
        body,
        html {
            margin: 0;
            padding: 0;
            font-family: system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji';
            background: #f8f9fa;
            color: #222;
        }



        /* About Carousel Section */
        .about-carousel-section {
            max-width: 1100px;
            margin: 4rem auto;
            padding: 0 1rem;
        }

        .about-carousel-section h2 {
            color: #004080;
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 2rem;
            text-align: center;
        }

        .carousel-container {
            position: relative;
            overflow: hidden;
            max-width: 100%;
        }

        .carousel-track {
            display: flex;
            gap: 2rem;
            transition: transform 0.6s ease;
        }

        .carousel-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
            padding: 2rem;
            flex-shrink: 0;
            color: #222;
            flex: 0 0 calc((100% - 4rem) / 3);
            /* 3 cards minus total gap space */
            max-width: calc((100% - 4rem) / 3);
        }

        .carousel-card h3 {
            color: #007acc;
            margin-bottom: 1rem;
        }

        .carousel-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: #004080;
            border: none;
            color: white;
            padding: 0.6rem 1rem;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
            user-select: none;
        }

        #prevBtn {
            left: 0;
        }

        #nextBtn {
            right: 0;
        }

        /* Testimonials Section */
        .testimonials-section {
            max-width: 1100px;
            margin: 0 auto 5rem auto;
            padding: 3rem 2rem;
        }

        .testimonials-section h2 {
            color: #004080;
            font-weight: 700;
            font-size: 2.8rem;
            margin-bottom: 2.5rem;
            text-align: center;
        }

        .testimonials-container {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .testimonial-card {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 320px;
            padding: 2rem;
            text-align: center;
            color: #222;
            flex-shrink: 0;
        }

        .testimonial-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .testimonial-card p {
            font-style: italic;
            font-size: 1.1rem;
            line-height: 1.6;
            margin-bottom: 1.2rem;
        }

        .star-rating {
            color: #f5a623;
            margin-bottom: 1rem;
            font-size: 1.25rem;
        }

        .testimonial-author {
            font-weight: 700;
            font-size: 1rem;
            margin-bottom: 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .hero-section h1 {
                font-size: 2.6rem;
            }

            .hero-section p {
                font-size: 1.2rem;
            }

            .about-carousel-section {
                margin: 3rem 1rem;
            }

            .carousel-card {
                min-width: 280px;
            }

            .testimonials-section {
                padding: 2rem 1rem;
            }

            .testimonial-card {
                max-width: 280px;
            }
        }

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


        /* Hero Section inspired by Express Trade Finance */
        .hero-section {
            position: relative;
            height: 100vh;
            background: url('images/port-img.jpg') no-repeat center center/cover;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 0 1rem;
            color: #fff;
            overflow: hidden;
            margin-top: -80px;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(to bottom right, rgba(0, 64, 128, 0.75), rgba(0, 112, 192, 0.55));
            z-index: 0;
        }

        .hero-content {
            position: relative;
            z-index: 1;
            max-width: 900px;
            padding: 0 1rem;
        }

        .hero-content h1 {
            font-size: 3.8rem;
            font-weight: 900;
            margin: 0;
            line-height: 1.1;
            letter-spacing: 3px;
            margin-bottom: 1rem;
            text-shadow: 0 4px 10px rgba(0, 0, 0, 0.6);
        }

        .hero-content p {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 2.5rem;
            text-shadow: 0 2px 6px rgba(0, 0, 0, 0.5);
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        .hero-content .hero-cta {
            background-color: #00afff;
            color: white;
            padding: 0.75rem 2.5rem;
            font-size: 1.2rem;
            font-weight: 700;
            border-radius: 30px;
            text-decoration: none;
            display: inline-block;
            box-shadow: 0 6px 20px rgba(0, 175, 255, 0.7);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
        }

        .hero-content .hero-cta:hover,
        .hero-content .hero-cta:focus {
            background-color: #0091cc;
            box-shadow: 0 8px 30px rgba(0, 145, 204, 0.8);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.6rem;
                letter-spacing: 1.5px;
            }

            .hero-content p {
                font-size: 1.15rem;
            }

            nav ul {
                gap: 1rem;
            }
        }
    </style>
</head>

<body>

    <nav role="navigation" aria-label="Primary">
        <div class="container">
            <a href="#hero" class="brand">Elisense Enterprise</a>

            <!-- Navigation Links Container -->
            <ul id="nav-links">
                <li><a href="./home.php">Home</a></li>
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


    <!--hero script -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            easing: 'ease-out-cubic',
        });
    </script>



    <!-- Hero Section -->
    <section id="hero" class="hero-section" data-aos="fade-in" data-aos-duration="1200" itemscope
        itemtype="http://schema.org/Organization">
        <div class="hero-content">
            <h1 itemprop="name"><?php echo $companyName; ?></h1>
            <p itemprop="description"><?php echo $companyTagline; ?></p>
        </div>
    </section>

    <section id="about-section" data-aos="fade-up" data-aos-duration="1200"
        style="max-width: 1100px; margin: 5rem auto; padding: 2rem; background: #f9faff; border-radius: 16px; box-shadow: 0 8px 30px rgba(0, 64, 128, 0.07);">
        <h2 style="color: #004080; font-size: 2.8rem; font-weight: 700; margin-bottom: 3rem; text-align: center;">About
            Elisense Enterprise</h2>



        <!-- Mission & Vision -->
        <div style="display: flex; flex-wrap: wrap; gap: 4rem; align-items: center; margin-bottom: 4rem;">
            <div style="flex: 1 1 450px;">
                <img src="https://images.unsplash.com/photo-1522199755839-a2bacb67c546?auto=format&fit=crop&w=800&q=80"
                    alt="Mission Illustration" loading="lazy"
                    style="border-radius: 16px; box-shadow: 0 8px 24px rgba(0, 64, 128, 0.12); width: 100%; height: auto;">
            </div>
            <div style="flex: 1 1 450px;">
                <h3 style="color: #007acc; font-weight: 700; margin-bottom: 1rem;">Our Mission</h3>
                <p style="color: #444; font-size: 1.1rem; line-height: 1.6;">
                    To empower businesses worldwide by providing transparent, reliable, and innovative product sourcing
                    solutions that simplify global trade and accelerate growth.
                </p>
            </div>
        </div>

        <div style="display: flex; flex-wrap: wrap; gap: 4rem; align-items: center;">
            <div style="flex: 1 1 450px;">
                <h3 style="color: #007acc; font-weight: 700; margin-bottom: 1rem;">Our Vision</h3>
                <p style="color: #444; font-size: 1.1rem; line-height: 1.6;">
                    To become the leading global trade partner recognized for integrity, innovation, and sustainable
                    supply chain excellence that drives success for our clients.
                </p>
            </div>
            <div style="flex: 1 1 450px;">
                <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?auto=format&fit=crop&w=800&q=80"
                    alt="Vision Illustration" loading="lazy"
                    style="border-radius: 16px; box-shadow: 0 8px 24px rgba(0, 64, 128, 0.12); width: 100%; height: auto;">
            </div>
        </div>

        <!-- Global Reach Map -->
        <div style="margin-top: 5rem;">
            <h3 style="color: #007acc; font-weight: 700; margin-bottom: 2rem; text-align: center;">Our Global Reach</h3>
            <div
                style="position: relative; max-width: 900px; margin: 0 auto; border-radius: 18px; overflow: hidden; box-shadow: 0 10px 30px rgba(0, 64, 128, 0.15);">
                <img src="https://upload.wikimedia.org/wikipedia/commons/8/80/World_map_-_low_resolution.svg"
                    alt="World Map" style="width: 100%; height: auto; display: block;">
                <!-- Example callout bubbles -->
                <div
                    style="position: absolute; top: 30%; left: 15%; background: rgba(0, 122, 204, 0.85); color: white; padding: 8px 14px; border-radius: 12px; font-weight: 700; font-size: 0.9rem; user-select: none; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                    USA
                </div>
                <div
                    style="position: absolute; top: 50%; left: 52%; background: rgba(0, 122, 204, 0.85); color: white; padding: 8px 14px; border-radius: 12px; font-weight: 700; font-size: 0.9rem; user-select: none; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                    Africa
                </div>
                <div
                    style="position: absolute; top: 50%; left: 78%; background: rgba(0, 122, 204, 0.85); color: white; padding: 8px 14px; border-radius: 12px; font-weight: 700; font-size: 0.9rem; user-select: none; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                    Singapore
                </div>
                <div
                    style="position: absolute; top: 35%; left: 66%; background: rgba(0, 122, 204, 0.85); color: white; padding: 8px 14px; border-radius: 12px; font-weight: 700; font-size: 0.9rem; user-select: none; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                    Asian Countries
                </div>
                <div
                    style="position: absolute; top: 27%; left: 52%; background: rgba(0, 122, 204, 0.85); color: white; padding: 8px 14px; border-radius: 12px; font-weight: 700; font-size: 0.9rem; user-select: none; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">
                    Europe
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Render Growth Chart using Chart.js (replace the placeholder div #growthChart)
        const ctx = document.createElement('canvas');
        document.getElementById('growthChart').appendChild(ctx);

        const chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2019', '2020', '2021', '2022', '2023', '2024', '2025'],
                datasets: [{
                    label: 'Revenue (Million USD)',
                    data: [15, 22, 35, 47, 57, 68, 80],
                    backgroundColor: '#007acc'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: { stepSize: 10 }
                    }
                },
                plugins: {
                    legend: { display: false }
                }
            }
        });
    </script>



    <!-- New Section: Who We Are & Our Philosophy -->
    <section class="who-we-are-section" data-aos="fade-up" data-aos-duration="1200"
        style="max-width: 1100px; margin: 5rem auto; padding: 3rem 2rem; background: #ffffff; border-radius: 16px; box-shadow: 0 8px 24px rgba(0,0,0,0.1);">
        <h2 style="color: #004080; font-size: 2.8rem; font-weight: 700; text-align: center; margin-bottom: 2.5rem;">Who
            We Are & Our Philosophy</h2>

        <div style="display: flex; flex-wrap: wrap; gap: 3rem; justify-content: center;">

            <!-- Component 1: Our Identity with Icon -->
            <div style="flex: 1 1 320px; min-width: 280px; text-align: center;">
                <div
                    style="background: #007acc; width: 80px; height: 80px; margin: 0 auto 1.5rem auto; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; font-size: 2.5rem; box-shadow: 0 4px 12px rgba(0, 122, 204, 0.6); user-select: none;">
                    &#128101; <!-- Unicode user group icon -->
                </div>
                <h3 style="color: #004080; font-weight: 700; font-size: 1.5rem; margin-bottom: 1rem;">Our Identity</h3>
                <p style="color: #333; font-size: 1.1rem; line-height: 1.65;">
                    Elisense Enterprise is a catalyst for global business connections, dedicated to transparent,
                    ethical, and efficient international sourcing. We build bridges between manufacturers and businesses
                    worldwide.
                </p>
            </div>

            <!-- Component 2: Our Values with Icon -->
            <div style="flex: 1 1 320px; min-width: 280px; text-align: center;">
                <div
                    style="background: #007acc; width: 80px; height: 80px; margin: 0 auto 1.5rem auto; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; font-size: 2.5rem; box-shadow: 0 4px 12px rgba(0, 122, 204, 0.6); user-select: none;">
                    &#128176; <!-- Unicode handshake/money icon -->
                </div>
                <h3 style="color: #004080; font-weight: 700; font-size: 1.5rem; margin-bottom: 1rem;">Our Values</h3>
                <p style="color: #333; font-size: 1.1rem; line-height: 1.65;">
                    Integrity, commitment, and innovation are at the heart of everything we do. We ensure your sourcing
                    journey is supported by trusted partnerships and an unwavering dedication to quality.
                </p>
            </div>

            <!-- Component 3: Our Vision with Icon -->
            <div style="flex: 1 1 320px; min-width: 280px; text-align: center;">
                <div
                    style="background: #007acc; width: 80px; height: 80px; margin: 0 auto 1.5rem auto; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; font-size: 2.5rem; box-shadow: 0 4px 12px rgba(0, 122, 204, 0.6); user-select: none;">
                    &#128640; <!-- Unicode rocket (vision) icon -->
                </div>
                <h3 style="color: #004080; font-weight: 700; font-size: 1.5rem; margin-bottom: 1rem;">Our Vision</h3>
                <p style="color: #333; font-size: 1.1rem; line-height: 1.65;">
                    To be the leading force in global trade innovation, enabling businesses to navigate international
                    sourcing challenges with confidence, agility, and sustainable practices.
                </p>
            </div>
        </div>

        <!-- Interactive Quote Carousel -->
        <div style="margin-top: 4rem; max-width: 800px; margin-left: auto; margin-right: auto; text-align: center;">
            <blockquote id="philosophy-quote"
                style="font-style: italic; font-size: 1.25rem; color: #00509e; line-height: 1.6; margin-bottom: 1rem; min-height: 90px; user-select: none;">
                "Bridging continents, empowering businesses — sourcing with integrity and vision."
            </blockquote>
            <button aria-label="Previous philosophy quote" id="quotePrev"
                style="background-color: #007acc; border: none; color: white; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer; margin-right: 1rem; font-size: 1rem;">‹
                Prev</button>
            <button aria-label="Next philosophy quote" id="quoteNext"
                style="background-color: #007acc; border: none; color: white; padding: 0.5rem 1rem; border-radius: 6px; cursor: pointer; font-size: 1rem;">Next
                ›</button>
        </div>
    </section>

    <script>
        // Philosophy quotes data
        const philosophyQuotes = [
            "Bridging continents, empowering businesses — sourcing with integrity and vision.",
            "Our philosophy is rooted in transparency, trust, and a commitment to excellence in every transaction.",
            "Global trade is more than business; it's about creating long-lasting, ethical partnerships.",
            "Innovation drives us to simplify complex sourcing challenges with smart, sustainable solutions."
        ];

        let currentQuoteIndex = 0;

        const quoteElement = document.getElementById('philosophy-quote');
        const prevBtn = document.getElementById('quotePrev');
        const nextBtn = document.getElementById('quoteNext');

        function updateQuote() {
            quoteElement.textContent = philosophyQuotes[currentQuoteIndex];
        }

        prevBtn.addEventListener('click', () => {
            currentQuoteIndex = (currentQuoteIndex - 1 + philosophyQuotes.length) % philosophyQuotes.length;
            updateQuote();
        });

        nextBtn.addEventListener('click', () => {
            currentQuoteIndex = (currentQuoteIndex + 1) % philosophyQuotes.length;
            updateQuote();
        });

        // Initialize quote
        updateQuote();
    </script>




    <section class="testimonials-section" style="max-width: 1200px; margin: 5rem auto; position: relative;">
        <h2 style="color: #004080; font-weight: 700; font-size: 2.4rem; margin-bottom: 2.5rem; text-align: center;">
            Client Testimonials</h2>

        <div style="overflow: hidden; position: relative;">
            <div id="carousel-track" style="display: flex; gap: 1rem; transition: transform 0.7s ease;">
                <!-- Cards inserted by JS -->
            </div>

            <button id="prevBtn" aria-label="Previous testimonial"
                style="position: absolute; top: 50%; left: 5px; transform: translateY(-50%); background: #007acc; border: none; color: white; border-radius: 50%; width: 38px; height: 38px; font-size: 1.5rem; cursor: pointer; box-shadow: 0 2px 10px rgba(0,122,204,0.3); z-index: 10;">‹</button>

            <button id="nextBtn" aria-label="Next testimonial"
                style="position: absolute; top: 50%; right: 5px; transform: translateY(-50%); background: #007acc; border: none; color: white; border-radius: 50%; width: 38px; height: 38px; font-size: 1.5rem; cursor: pointer; box-shadow: 0 2px 10px rgba(0,122,204,0.3); z-index: 10;">›</button>
        </div>
    </section>

    <style>
        .testimonial-card {
            flex: 0 0 calc((100% - 3rem) / 4);
            /* 4 cards with 1rem gaps */
            box-sizing: border-box;
            border-radius: 14px;
            background: white;
            padding: 2rem 1.5rem;
            box-shadow: 0 8px 20px rgba(0, 64, 128, 0.15);
            text-align: center;
            color: #222;
        }

        .testimonial-img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }

        .testimonial-quote {
            font-style: italic;
            font-size: 1.1rem;
            margin-bottom: 1.2rem;
        }

        .testimonial-stars {
            font-size: 1.25rem;
            color: #f5a623;
            margin-bottom: 1rem;
        }

        .testimonial-author {
            font-weight: 700;
            font-size: 1rem;
            color: #004080;
        }

        @media (max-width: 992px) {
            .testimonial-card {
                flex: 0 0 calc((100% - 2rem) / 2);
                /* 2 cards */
            }
        }

        @media (max-width: 576px) {
            .testimonial-card {
                flex: 0 0 100%;
                /* 1 card */
            }
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const testimonials = [
                {
                    img: "https://randomuser.me/api/portraits/women/65.jpg",
                    quote: "Elisense Enterprise transformed our supply chain with their expert sourcing and outstanding support. They made international trade seamless and efficient.",
                    stars: "★★★★★",
                    name: "Maria Chen, CEO of GlobalTech Imports"
                },
                {
                    img: "https://randomuser.me/api/portraits/men/44.jpg",
                    quote: "Their deep knowledge and trustworthy processes gave us confidence in expanding our international product sourcing network.",
                    stars: "★★★★☆",
                    name: "David Martinez, Procurement Manager at Horizon Ventures"
                },
                {
                    img: "https://randomuser.me/api/portraits/women/22.jpg",
                    quote: "Excellent global trade consulting and outstanding client support—Elisense Enterprise is our trusted partner for international sourcing.",
                    stars: "★★★★★",
                    name: "Leila Hashim, Founder of NexGen Retailers"
                },
                {
                    img: "https://randomuser.me/api/portraits/men/32.jpg",
                    quote: "The team helped us optimize costs and simplify compliance. We trust them for our international expansion.",
                    stars: "★★★★★",
                    name: "Rahul Verma, COO at Phoenix Trading"
                },
                {
                    img: "https://randomuser.me/api/portraits/women/47.jpg",
                    quote: "Dynamic, efficient, and trustworthy solutions that help us meet our global sourcing goals with confidence.",
                    stars: "★★★★★",
                    name: "Anita Gupta, Supply Chain Director at Oceanic Traders"
                },
                {
                    img: "https://randomuser.me/api/portraits/women/47.jpg",
                    quote: "Dynamic, efficient, and trustworthy solutions that help us meet our global sourcing goals with confidence.",
                    stars: "★★★★★",
                    name: "Anita Gupta, Supply Chain Director at Oceanic Traders"
                }
            ];

            const cardsPerView = 5;
            let startIndex = 0;
            const track = document.getElementById("carousel-track");

            function createCard(testimonial) {
                const div = document.createElement("div");
                div.className = "testimonial-card";
                div.innerHTML = `
      <img src="${testimonial.img}" alt="${testimonial.name.split(',')[0]}" class="testimonial-img" />
      <p class="testimonial-quote">"${testimonial.quote}"</p>
      <div class="testimonial-stars">${testimonial.stars}</div>
      <p class="testimonial-author">— ${testimonial.name}</p>
    `;
                return div;
            }

            function render() {
                // Duplicate testimonials array for looping
                const extendedTestimonials = testimonials.concat(testimonials.slice(0, cardsPerView));
                track.innerHTML = "";
                extendedTestimonials.forEach(testimonial => {
                    track.appendChild(createCard(testimonial));
                });
                update();
            }

            function update() {
                const cardWidth = track.querySelector(".testimonial-card").offsetWidth + 16; // width + margin gap approx.
                const maxTranslateX = cardWidth * testimonials.length;
                let translateX = -startIndex * cardWidth;
                if (translateX < -maxTranslateX) {
                    translateX += maxTranslateX;
                    startIndex = 0;
                }
                track.style.transform = `translateX(${translateX}px)`;
            }

            document.getElementById("nextBtn").addEventListener("click", () => {
                startIndex++;
                if (startIndex > testimonials.length) {
                    startIndex = 1;
                }
                update();
            });

            document.getElementById("prevBtn").addEventListener("click", () => {
                startIndex--;
                if (startIndex < 0) {
                    startIndex = testimonials.length - 1;
                }
                update();
            });

            render();
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            easing: 'ease-out-cubic',
        });

        // Carousel functionality for About Section
        const track = document.querySelector('.carousel-track');
        const prevBtn = document.getElementById('prevBtn');
        const nextBtn = document.getElementById('nextBtn');
        const card = document.querySelector('.carousel-card');
        const gap = 32; // gap in px (2rem)
        const cardWidth = card.offsetWidth + gap;
        let currentIndex = 0;
        const totalCards = track.children.length;

        function updateCarousel() {
            const visibleCards = 3;
            const maxIndex = totalCards - visibleCards;
            if (currentIndex < 0) currentIndex = maxIndex > 0 ? maxIndex : 0;
            if (currentIndex > maxIndex) currentIndex = 0;
            track.style.transform = `translateX(${-currentIndex * cardWidth}px)`;
        }

        prevBtn.addEventListener('click', () => {
            currentIndex--;
            updateCarousel();
        });

        nextBtn.addEventListener('click', () => {
            currentIndex++;
            updateCarousel();
        });

        window.addEventListener('resize', updateCarousel);

        // Initialize carousel position
        updateCarousel();
    </script>
    <!-- Enhanced Section 4: Certifications & Compliance -->
    <section class="certifications-compliance-section" data-aos="fade-up" data-aos-duration="1200"
        style="max-width: 1100px; margin: 5rem auto; padding: 4rem 2rem; background: linear-gradient(135deg, #e0f0ff 0%, #f9fcff 100%); border-radius: 20px; box-shadow: 0 10px 30px rgba(0, 85, 170, 0.2);">
        <h2
            style="color: #004080; font-weight: 800; font-size: 3rem; margin-bottom: 3rem; text-align: center; letter-spacing: 1.5px;">
            Certifications & Compliance</h2>

        <div style="display: flex; flex-wrap: wrap; gap: 2.5rem; justify-content: center;">
            <!-- Card 1 -->
            <div
                style="background: white; flex: 1 1 320px; min-width: 280px; border-radius: 18px; box-shadow: 0 6px 20px rgba(0, 80, 160, 0.15); padding: 2.5rem 2rem; position: relative; overflow: hidden; transition: transform 0.3s ease;">
                <div
                    style="width: 60px; height: 60px; background: #007acc; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.8rem; font-weight: 700; margin-bottom: 1.2rem; user-select: none;">
                    ✓
                </div>
                <h3
                    style="color: #004080; font-weight: 700; font-size: 1.6rem; margin-bottom: 1rem; letter-spacing: 0.05em;">
                    ISO 9001 Quality Management</h3>
                <p style="color: #333; font-size: 1.1rem; line-height: 1.65;">
                    Our commitment to excellence is validated by the ISO 9001 certification, ensuring highly consistent
                    quality and process improvement across all sourcing operations.
                </p>
            </div>
            <!-- Card 2 -->
            <div
                style="background: white; flex: 1 1 320px; min-width: 280px; border-radius: 18px; box-shadow: 0 6px 20px rgba(0, 80, 160, 0.15); padding: 2.5rem 2rem; position: relative; overflow: hidden; transition: transform 0.3s ease;">
                <div
                    style="width: 60px; height: 60px; background: #007acc; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.8rem; font-weight: 700; margin-bottom: 1.2rem; user-select: none;">
                    🔒
                </div>
                <h3
                    style="color: #004080; font-weight: 700; font-size: 1.6rem; margin-bottom: 1rem; letter-spacing: 0.05em;">
                    Trusted Trade Partner</h3>
                <p style="color: #333; font-size: 1.1rem; line-height: 1.65;">
                    Certified as a Trusted Trade Partner, we adhere strictly to ethical standards and rigorous checks
                    that secure your supply chain with transparency and responsibility.
                </p>
            </div>
            <!-- Card 3 -->
            <div
                style="background: white; flex: 1 1 320px; min-width: 280px; border-radius: 18px; box-shadow: 0 6px 20px rgba(0, 80, 160, 0.15); padding: 2.5rem 2rem; position: relative; overflow: hidden; transition: transform 0.3s ease;">
                <div
                    style="width: 60px; height: 60px; background: #007acc; border-radius: 50%; display: flex; justify-content: center; align-items: center; color: white; font-size: 1.8rem; font-weight: 700; margin-bottom: 1.2rem; user-select: none;">
                    📜
                </div>
                <h3
                    style="color: #004080; font-weight: 700; font-size: 1.6rem; margin-bottom: 1rem; letter-spacing: 0.05em;">
                    Customs Compliance & Security</h3>
                <p style="color: #333; font-size: 1.1rem; line-height: 1.65;">
                    We guarantee full compliance with customs regulations and international security standards, ensuring
                    your shipments move swiftly with no surprises.
                </p>
            </div>
        </div>
    </section>

    <style>
        /* Hover effect for cards */
        .certifications-compliance-section div>div:hover {
            transform: translateY(-12px);
            box-shadow: 0 12px 36px rgba(0, 85, 170, 0.3);
        }

        @media (max-width: 768px) {
            .certifications-compliance-section {
                padding: 3rem 1.5rem;
            }
        }
    </style>

    <!-- Enhanced Section 5: Problem Statement & Call to Action -->
    <section class="problem-cta-section" data-aos="fade-up" data-aos-duration="1200"
        style="max-width: 1100px; margin: 5rem auto 7rem auto; padding: 4rem 3rem; background: linear-gradient(90deg, #004080, #007acc); border-radius: 20px; color: white; text-align: center; box-shadow: 0 12px 40px rgba(0, 56, 112, 0.5);">
        <h2 style="font-size: 3rem; font-weight: 800; margin-bottom: 1.5rem; letter-spacing: 2px;">Facing Challenges in
            International Sourcing?</h2>
        <p
            style="font-size: 1.5rem; max-width: 720px; margin: 0 auto 3rem auto; line-height: 1.7; font-weight: 400; text-shadow: 0 2px 6px rgba(0,0,0,0.4);">
            Complex regulations, unreliable suppliers, and uncertain logistics slow down your global trade progress. At
            Elisense Enterprise, we solve these challenges by providing certified, reliable sourcing solutions tailored
            to your business needs.
        </p>
        <a href="#contact"
            style="display: inline-block; background-color: white; color: #004080; font-weight: 800; padding: 1.25rem 3.5rem; border-radius: 50px; font-size: 1.3rem; text-decoration: none; box-shadow: 0 8px 25px rgba(255, 255, 255, 0.8); transition: background-color 0.4s ease, color 0.4s ease;"
            onmouseover="this.style.backgroundColor='#d9eaff'; this.style.color='#00264d';"
            onmouseout="this.style.backgroundColor='white'; this.style.color='#004080';"
            aria-label="Book a Meeting with Elisense Enterprise to solve sourcing challenges">
            Book a Meeting
        </a>
    </section>

    <style>
        /* Add subtle pulse animation on CTA button on hover */
        .problem-cta-section a:hover {
            animation: pulseGlow 1.2s infinite alternate;
        }

        @keyframes pulseGlow {
            from {
                box-shadow: 0 8px 25px rgba(255, 255, 255, 0.8);
            }

            to {
                box-shadow: 0 12px 35px rgba(255, 255, 255, 1);
            }
        }

        @media (max-width: 768px) {
            .problem-cta-section {
                padding: 3rem 1.5rem 5rem 1.5rem;
            }

            .problem-cta-section h2 {
                font-size: 2.2rem;
            }

            .problem-cta-section p {
                font-size: 1.2rem;
            }

            .problem-cta-section a {
                padding: 1rem 3rem;
                font-size: 1.1rem;
            }
        }
    </style>

    <footer role="contentinfo" aria-label="Site Footer"
        style="background: #002f55; color: #ccc; padding: 3rem 1rem 2rem; margin-top: 4rem;">
        <div class="footer-container"
            style="max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem;">

            <!-- Call to Action -->
            <section class="footer-column" aria-labelledby="footer-cta-title"
                style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
                <h2 id="footer-cta-title" style="color: #00aaff; font-size: 1.8rem; margin-bottom: 1rem;">Ready to
                    Elevate Your Global Sourcing?</h2>
                <a href="./bookmeeting.php" class="footer-cta"
                    style="display: inline-block; background-color: #00aaff; color: white; padding: 1rem 2.5rem; border-radius: 40px; font-weight: 700; text-decoration: none; transition: background-color 0.3s ease;"
                    onmouseover="this.style.backgroundColor='#007acc';"
                    onmouseout="this.style.backgroundColor='#00aaff';"
                    aria-label="Book a meeting with Elisense Enterprise">
                    Book a Meeting
                </a>
            </section>

            <!-- Quick Links -->
            <section class="footer-column" aria-label="Footer Quick Links"
                style="flex: 1 1 200px; min-width: 200px; padding: 0 0.5rem;">
                <h3 style="color: #00aaff; margin-bottom: 1rem; font-weight: 700;">Quick Links</h3>
                <ul style="list-style: none; padding: 0; margin: 0; line-height: 2;">
                    <li><a href="#hero" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Home</a></li>
                    <li><a href="#about-carousel-section" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">About Us</a>
                    </li>
                    <li><a href="#certifications-compliance-section" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';"
                            onmouseout="this.style.color='#ccc';">Certifications</a></li>
                    <li><a href="#problem-cta-section" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Solutions</a>
                    </li>
                    <li><a href="#contact" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Contact</a>
                    </li>
                    <li><a href="/shipping-policy" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Shipping
                            Policy</a></li>
                    <li><a href="/return-policy" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Return
                            Policy</a></li>
                    <li><a href="/privacy-policy" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Privacy
                            Policy</a></li>
                    <li><a href="/legal" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Legal</a></li>
                </ul>
            </section>

            <!-- Contact Info -->
            <section class="footer-column" aria-label="Contact Information"
                style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
                <h3 style="color: #00aaff; margin-bottom: 1rem; font-weight: 700;">Contact Us</h3>
                <p style="margin: 0 0 0.8rem;">Email: <a href="mailto:elisenseenterprise@gmail.com"
                        style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
                        onmouseout="this.style.color='#ccc';">elisenseenterprise@gmail.com</a></p>
                <p style="margin: 0 0 0.8rem;">Phone: <a href="tel:+919978099097"
                        style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
                        onmouseout="this.style.color='#ccc';">+91 9978099097</a></p>
                <p style="margin: 0 0 1rem;">Follow us:</p>
                <div style="display: flex; gap: 1rem; font-size: 1.5rem;">
                    <a href="https://www.facebook.com/elisenseenterprise" target="_blank" rel="noopener"
                        aria-label="Facebook" style="color: #ccc; text-decoration: none;"
                        onmouseover="this.style.color='#3b5998';" onmouseout="this.style.color='#ccc';"><i
                            class="fab fa-facebook"></i></a>
                    <a href="https://www.twitter.com/elisenseent" target="_blank" rel="noopener" aria-label="Twitter"
                        style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#00acee';"
                        onmouseout="this.style.color='#ccc';"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.linkedin.com/company/elisenseenterprise" target="_blank" rel="noopener"
                        aria-label="LinkedIn" style="color: #ccc; text-decoration: none;"
                        onmouseover="this.style.color='#0e76a8';" onmouseout="this.style.color='#ccc';"><i
                            class="fab fa-linkedin"></i></a>
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
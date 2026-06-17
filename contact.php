<?php
$currentYear = date("Y");
$companyName = "Elisense Enterprise";
$companyTagline = "A Revolution in International Product Sourcing and Global Trade";

// Basic flash messaging for form feedback
$flashMessage = '';
$flashType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Collect and sanitize inputs
	$name = isset($_POST['name']) ? trim($_POST['name']) : '';
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$message = isset($_POST['message']) ? trim($_POST['message']) : '';

	// Simple server-side validation
	if ($name === '' || $email === '' || $message === '') {
		$flashMessage = 'Please fill in all fields.';
		$flashType = 'error';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$flashMessage = 'Please provide a valid email address.';
		$flashType = 'error';
	} else {
		// Remote Database connection using Environment Variables
		$host = getenv('DB_HOST');
		$user = getenv('DB_USER');
		$pass = getenv('DB_PASS');
		$dbName = getenv('DB_NAME');

		$mysqli = @new mysqli($host, $user, $pass, $dbName);
		if ($mysqli->connect_error) {
			$flashMessage = 'Database connection failed.';
			$flashType = 'error';
		} else {
			// Create table if it does not exist
			$createTableSql = "CREATE TABLE IF NOT EXISTS `inquires` (
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(255) NOT NULL,
				`email` VARCHAR(255) NOT NULL,
				`message` TEXT NOT NULL,
				`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
				PRIMARY KEY (`id`),
				INDEX `idx_created_at` (`created_at`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";

			if (!$mysqli->query($createTableSql)) {
				$flashMessage = 'Failed to ensure table exists.';
				$flashType = 'error';
			} else {
				// Insert using prepared statement
				$stmt = $mysqli->prepare('INSERT INTO `inquires` (`name`, `email`, `message`) VALUES (?, ?, ?)');
				if ($stmt) {
					$stmt->bind_param('sss', $name, $email, $message);
					$ok = $stmt->execute();
					if ($ok) {
						$flashMessage = 'Thank you! Your message has been received.';
						$flashType = 'success';
						// Clear form fields after success
						$_POST['name'] = '';
						$_POST['email'] = '';
						$_POST['message'] = '';
					} else {
						$flashMessage = 'Something went wrong while saving your inquiry.';
						$flashType = 'error';
					}
					$stmt->close();
				} else {
					$flashMessage = 'Failed to prepare database statement.';
					$flashType = 'error';
				}
			}
			$mysqli->close();
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Contact Elisense Enterprise for international sourcing, logistics, and global trade services." />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Elisense Enterprise - International Product Sourcing & Global Trade</title>


    <style>
        /* Your navbar styles */
        nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: #015bb6ae;
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



    <!-- Contact Section -->
    <section id="contact"
        style="position:relative; padding:80px 20px; background:url('https://images.unsplash.com/photo-1521791136064-7986c2920216?auto=format&fit=crop&w=1600&q=80') center/cover no-repeat; color:#fff;">
        <!-- Overlay -->
        <div style="position:absolute; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.6);"></div>

        <div style="position:relative; max-width:1200px; margin:auto; z-index:2;">
            <h2 style="text-align:center; font-size:2.5em; margin-bottom:15px; font-weight:700;">
                Get in Touch with <span style="color:#00d4ff;">Elisense Enterprise</span>
            </h2>
            <p style="text-align:center; max-width:700px; margin:auto; font-size:1.1em; color:#ddd;">
                Your trusted partner in international sourcing & global trade. Let’s connect and explore opportunities.
            </p>

            <div
                style="display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:30px; margin-top:50px;">

                <!-- Contact Info Card -->
                <div
                    style="backdrop-filter:blur(12px); background:rgba(255,255,255,0.1); padding:30px; border-radius:15px; box-shadow:0 8px 25px rgba(0,0,0,0.3);">
                    <h3 style="color:#00d4ff; margin-bottom:20px;">Contact Information</h3>
                    <p><strong>Email:</strong> <a href="mailto:elisenseenterprise@gmail.com"
                            style="color:#00d4ff; text-decoration:none;">elisenseenterprise@gmail.com</a></p>
                    <p><strong>Phone/WhatsApp:</strong> <a href="tel:+919978099097"
                            style="color:#00d4ff; text-decoration:none;">+91 9978099097</a></p>
                    <p><strong>Business Hours:</strong> Mon - Fri, 9:00 AM - 6:00 PM (GMT)</p>
                    <p><strong>Follow Us:</strong></p>
                    <p>
                    <div style="display: flex; gap: 1rem; font-size: 1.5rem;">
                        <a href="https://www.facebook.com/elisenseenterprise" target="_blank" rel="noopener"
                            aria-label="Facebook" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='#3b5998';" onmouseout="this.style.color='#ccc';"><i
                                class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com/elisenseent" target="_blank" rel="noopener"
                            aria-label="Twitter" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='#00acee';" onmouseout="this.style.color='#ccc';"><i
                                class="fab fa-twitter"></i></a>
                        <a href="https://www.linkedin.com/company/elisenseenterprise" target="_blank" rel="noopener"
                            aria-label="LinkedIn" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='#0e76a8';" onmouseout="this.style.color='#ccc';"><i
                                class="fab fa-linkedin"></i></a>
                        <a href="https://wa.me/919978099097" target="_blank" rel="noopener" aria-label="WhatsApp"
                            style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='#25d366';"
                            onmouseout="this.style.color='#ccc';"><i class="fab fa-whatsapp"></i></a>
                    </div>
                    </p>
                </div>

                <!-- Contact Form Card -->
                <div
                    style="backdrop-filter:blur(12px); background:rgba(255,255,255,0.1); padding:30px; border-radius:15px; box-shadow:0 8px 25px rgba(0,0,0,0.3);">
                    <h3 style="color:#00d4ff; margin-bottom:20px;">Send Us a Message</h3>
                    <?php if (!empty($flashMessage)) { ?>
                    <div style="padding:12px; border-radius:8px; margin-bottom:10px; font-weight:600; <?php echo $flashType === 'success' ? 'background:#d1fae5; color:#065f46;' : 'background:#fee2e2; color:#991b1b;'; ?>">
                        <?php echo htmlspecialchars($flashMessage); ?>
                    </div>
                    <?php } ?>
                    <form method="post" onsubmit="return validateForm()" style="display:flex; flex-direction:column; gap:15px;">
                        <input type="text" id="name" name="name" placeholder="Your Name"
                            style="padding:12px; border:none; border-radius:8px; font-size:1em; outline:none; transition:0.3s;"
                            onfocus="this.style.boxShadow='0 0 10px #00d4ff'" onblur="this.style.boxShadow='none'"
                            value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>" required>
                        <input type="email" id="email" name="email" placeholder="Your Email"
                            style="padding:12px; border:none; border-radius:8px; font-size:1em; outline:none; transition:0.3s;"
                            onfocus="this.style.boxShadow='0 0 10px #00d4ff'" onblur="this.style.boxShadow='none'"
                            value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>" required>
                        <textarea id="message" name="message" placeholder="Your Message" rows="5"
                            style="padding:12px; border:none; border-radius:8px; font-size:1em; outline:none; transition:0.3s; resize:none;"
                            onfocus="this.style.boxShadow='0 0 10px #00d4ff'" onblur="this.style.boxShadow='none'"
                            required><?php echo isset($_POST['message']) ? htmlspecialchars($_POST['message']) : ''; ?></textarea>
                        <button type="submit"
                            style="padding:14px; background:#00d4ff; color:#000; font-weight:bold; border:none; border-radius:8px; font-size:1em; cursor:pointer; transition:0.3s;"
                            onmouseover="this.style.background='#00aacc'"
                            onmouseout="this.style.background='#00d4ff'">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Inline JavaScript -->
    <script>
        function validateForm() {
            let name = document.getElementById("name").value.trim();
            let email = document.getElementById("email").value.trim();
            let message = document.getElementById("message").value.trim();
            if (name === "" || email === "" || message === "") {
                alert("Please fill in all fields.");
                return false;
            }
            alert("Thank you for contacting Elisense Enterprise! We will respond shortly.");
            return true;
        }
    </script>



    <footer role="contentinfo" aria-label="Site Footer"
        style="background: #002f55; color: #ccc; padding: 3rem 1rem 2rem;">
        <div class="footer-container"
            style="max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem;">

            <!-- Call to Action -->
            <section class="footer-column" aria-labelledby="footer-cta-title"
                style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
                <h2 id="footer-cta-title" style="color: #00aaff; font-size: 1.8rem; margin-bottom: 1rem;">Ready to
                    Elevate Your Global Sourcing?</h2>
                <a href="/bookmeeting.php" class="footer-cta"
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
                    <li><a href="/#hero" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Home</a></li>
                    <li><a href="/#about-carousel-section" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">About Us</a>
                    </li>
                    <li><a href="/#certifications-compliance-section" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';"
                            onmouseout="this.style.color='#ccc';">Certifications</a></li>
                    <li><a href="/#problem-cta-section" style="color: #ccc; text-decoration: none;"
                            onmouseover="this.style.color='white';" onmouseout="this.style.color='#ccc';">Solutions</a>
                    </li>
                    <li><a href="/contact.php" style="color: #ccc; text-decoration: none;"
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
                <p style="margin: 0 0 0.8rem;">Email: <a href="mailto:contact@elisenseenterprise.com"
                        style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
                        onmouseout="this.style.color='#ccc';">contact@elisenseenterprise.com</a></p>
                <p style="margin: 0 0 0.8rem;">Phone: <a href="tel:+1234567890"
                        style="color: #ccc; text-decoration: none;" onmouseover="this.style.color='white';"
                        onmouseout="this.style.color='#ccc';">+1 (234) 567-890</a></p>
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
                    <a href="https://wa.me/1234567890" target="_blank" rel="noopener" aria-label="WhatsApp"
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
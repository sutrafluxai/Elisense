<?php
$currentYear = date("Y");
$companyName = "Elisense Enterprise";
$companyTagline = "A Revolution in International Product Sourcing and Global Trade";
// Subscribe flash message
$subscribeFlash = '';
$subscribeType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscribe_action'])) {
	$emailInput = isset($_POST['email']) ? trim($_POST['email']) : '';
	if ($emailInput === '' || !filter_var($emailInput, FILTER_VALIDATE_EMAIL)) {
		$subscribeFlash = 'Please enter a valid email address.';
		$subscribeType = 'error';
	} else {
		$host = 'localhost';
		$user = 'root';
		$pass = '';
		$mysqli = @new mysqli($host, $user, $pass);
		if ($mysqli->connect_error) {
			$subscribeFlash = 'Unable to connect to database.';
			$subscribeType = 'error';
		} else {
			// Ensure database
			$createDb = "CREATE DATABASE IF NOT EXISTS `elisense` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
			if ($mysqli->query($createDb)) {
				$mysqli->select_db('elisense');
				// Ensure table
				$createTable = "CREATE TABLE IF NOT EXISTS `emails` (
					`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
					`email` VARCHAR(255) NOT NULL,
					`created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
					PRIMARY KEY (`id`),
					UNIQUE KEY `uniq_email` (`email`),
					INDEX `idx_created_at` (`created_at`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
				if ($mysqli->query($createTable)) {
					$stmt = $mysqli->prepare('INSERT INTO `emails` (`email`) VALUES (?)');
					if ($stmt) {
						$stmt->bind_param('s', $emailInput);
						$ok = $stmt->execute();
						if ($ok) {
							$subscribeFlash = 'Thanks! You are subscribed.';
							$subscribeType = 'success';
							$_POST['email'] = '';
						} else {
							if ($mysqli->errno === 1062) {
								$subscribeFlash = 'This email is already subscribed.';
								$subscribeType = 'success';
							} else {
								$subscribeFlash = 'Subscription failed. Please try again later.';
								$subscribeType = 'error';
							}
						}
						$stmt->close();
					} else {
						$subscribeFlash = 'Could not prepare subscription statement.';
						$subscribeType = 'error';
					}
				} else {
					$subscribeFlash = 'Could not ensure emails table.';
					$subscribeType = 'error';
				}
			} else {
				$subscribeFlash = 'Could not ensure database.';
				$subscribeType = 'error';
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
    <meta name="description" content="Elisense Insights: global trade news, company updates, and market trends for smarter sourcing." />
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
            <script>
                const newsItems = [
                    { title: 'India’s Rice Exports Resume to Select Markets', summary: 'Regulatory adjustments allow limited shipments; buyers diversify sourcing.', image: 'https://images.unsplash.com/photo-1516685304081-de7947d419d1?auto=format&fit=crop&w=800&q=80', article: 'Authorities approved targeted rice export quotas to stabilize domestic prices while honoring strategic contracts. Importers across MENA and Africa continue supplier diversification to mitigate policy risk.' },
                    { title: 'US West Coast Port Volumes Rise Again', summary: 'Trans-Pacific imports climb on retail replenishment and e‑commerce demand.', image: 'https://images.unsplash.com/photo-1501441858156-e505fb660566?auto=format&fit=crop&w=800&q=80', article: 'Major US West Coast gateways reported double‑digit import growth as retailers rebuild inventories. Carriers are rebalancing capacity while schedule reliability shows gradual improvement.' },
                    { title: 'EU to Streamline Customs Data Exchange', summary: 'New single‑window rules to simplify declarations across member states.', image: 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=800&q=80', article: 'The EU advanced a single‑window customs initiative to reduce duplicate filings and accelerate border clearances. Traders expect lower compliance costs and faster door‑to‑door transit times.' },
                    { title: 'Africa–Asia Corridors Add Direct Services', summary: 'New liner loops cut transit times for textiles and agri exports.', image: 'https://images.unsplash.com/photo-1500048993953-d23a436266cf?auto=format&fit=crop&w=800&q=80', article: 'Carriers launched direct sailings linking East Africa with South and Southeast Asia, reducing transshipment delays. Exporters cite improved schedule predictability for time‑sensitive goods.' },
                    { title: 'China Eases Export Controls on Key Inputs', summary: 'Broader export licenses issued for select industrial materials.', image: 'https://images.unsplash.com/photo-1509395176047-4a66953fd231?auto=format&fit=crop&w=800&q=80', article: 'Manufacturers welcomed streamlined export licensing for certain intermediates, potentially easing bottlenecks in electronics and automotive supply chains.' },
                    { title: 'Middle East Cold Chain Investments Accelerate', summary: 'Pharma and perishables drive capacity additions in GCC.', image: 'https://images.unsplash.com/photo-1556909212-d5b604d0a6f9?auto=format&fit=crop&w=800&q=80', article: 'Developers announced new GDP‑compliant cold storage parks with end‑to‑end monitoring. Exporters expect improved shelf life and market access for high‑value perishables.' },
                    { title: 'Air Freight Stabilizes as Ocean Congestion Eases', summary: 'Shippers shift back to sea; premium air‑sea hybrids remain.', image: 'https://images.unsplash.com/photo-1517817748496-62f7a99a0f54?auto=format&fit=crop&w=800&q=80', article: 'Air cargo rates eased on several lanes as ocean reliability improved. Hybrid air‑sea routings persist for critical SKUs to balance speed and cost.' },
                    { title: 'Latin America Exporters Gain from Currency Moves', summary: 'Weaker FX supports competitiveness in agro‑exports.', image: 'https://images.unsplash.com/photo-1519682337058-a94d519337bc?auto=format&fit=crop&w=800&q=80', article: 'Currency depreciation in select LATAM markets boosted margins for exporters of coffee, soy, and fruits, offsetting higher logistics costs in some corridors.' }
                ];

                function openArticlePopup(item) {
                    const w = 860, h = 600;
                    const y = window.top.outerHeight / 2 + window.top.screenY - ( h / 2 );
                    const x = window.top.outerWidth / 2 + window.top.screenX - ( w / 2 );
                    const popup = window.open('', 'newsPopup', `width=${w},height=${h},left=${x},top=${y},resizable=yes,scrollbars=yes`);
                    if (popup) {
                        popup.document.title = item.title;
                        popup.document.body.style.margin = '0';
                        popup.document.body.style.fontFamily = "system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, 'Noto Sans', 'Liberation Sans', sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji'";
                        popup.document.body.innerHTML = `
                            <div style="max-width:900px;margin:0 auto;line-height:1.6;color:#122;">
                                <div style="position:sticky;top:0;background:#fff;border-bottom:1px solid #eee;padding:12px 16px;display:flex;justify-content:space-between;align-items:center;z-index:1;">
                                    <strong style="font-size:1.05rem;color:#004080;">${item.title}</strong>
                                    <button onclick="window.close()" style="padding:8px 12px;border-radius:8px;border:1px solid #ddd;background:#f8f9fb;cursor:pointer;">Close</button>
                                </div>
                                <img src="${item.image}" alt="${item.title}" style="width:100%;height:320px;object-fit:cover;display:block;">
                                <div style="padding:16px 20px;">
                                    <h1 style="margin:0 0 8px 0;color:#004080;font-size:1.6rem;">${item.title}</h1>
                                    <p style="margin:0 0 14px 0;color:#345;font-size:1.05rem;">${item.summary}</p>
                                    <p style="margin:0;color:#233;font-size:1rem;white-space:pre-wrap;">${item.article}</p>
                                </div>
                            </div>
                        `;
                    }
                }

                function createNewsCard(item) {
                    const card = document.createElement('article');
                    card.style.cssText = 'background:#fff; border-radius:16px; box-shadow:0 4px 12px rgba(0,95,163,0.12); overflow:hidden; transition:transform 0.3s, box-shadow 0.3s; cursor:pointer;';
                    card.onmouseover = () => { card.style.transform = 'translateY(-6px)'; card.style.boxShadow = '0 12px 24px rgba(0,95,163,0.2)'; };
                    card.onmouseout = () => { card.style.transform = 'translateY(0)'; card.style.boxShadow = '0 4px 12px rgba(0,95,163,0.12)'; };

                    const img = document.createElement('img');
                    img.src = item.image;
                    img.alt = item.title;
                    img.style.cssText = 'width:100%; height:180px; object-fit:cover; display:block;';

                    const body = document.createElement('div');
                    body.style.cssText = 'padding:1.5vw;';

                    const h3 = document.createElement('h3');
                    h3.textContent = item.title;
                    h3.style.cssText = 'color:#007acc; font-size:1.4rem; margin-bottom:1vw;';

                    const p = document.createElement('p');
                    p.textContent = item.summary;
                    p.style.cssText = 'color:#444; font-size:1rem; margin-bottom:1.2vw;';

                    const a = document.createElement('a');
                    a.href = '#';
                    a.textContent = 'Read More →';
                    a.style.cssText = 'color:#00afff; font-weight:700; text-decoration:none; font-size:1rem;';
                    a.addEventListener('click', (e) => { e.preventDefault(); openArticlePopup(item); });

                    body.appendChild(h3);
                    body.appendChild(p);
                    body.appendChild(a);
                    card.appendChild(img);
                    card.appendChild(body);
                    return card;
                }

                document.addEventListener('DOMContentLoaded', function () {
                    const grid = document.getElementById('news-grid');
                    if (grid) {
                        grid.innerHTML = '';
                        newsItems.forEach(item => grid.appendChild(createNewsCard(item)));
                    }
                });
            </script>
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
            <h1 style="color:#fff;font-size:2.6rem;font-weight:800;line-height:1.2;margin-bottom:2vh;">Global Trade &
                Elisense Insights</h1>
            <p style="color:#e6f4ff;font-size:1.3rem;margin-bottom:3vh;">Stay updated with the latest international
                events, market trends, and company news.</p>
        </div>
    </section>




    <!-- 2. Latest Global Trade News -->
    <section id="global-news"
        style="width:100vw; max-width:100vw; box-sizing:border-box; margin:0 auto; background:#f5fbff; padding:5vw 3vw;">
        <div style="max-width:1200px; margin:0 auto;">
            <h2 style="color:#005fa3; font-size:2rem; margin-bottom:3vw; text-align:center;">Latest Global Trade News
            </h2>

            <div id="news-grid" style="display:grid; grid-template-columns:repeat(auto-fit,minmax(320px,1fr)); gap:2vw;">

                <!-- News Card -->
                <!-- Cards will be populated by JS below -->

                <article
                    style="background:#fff; border-radius:16px; box-shadow: 0 4px 12px rgba(0,95,163,0.12); overflow:hidden; transition: transform 0.3s, box-shadow 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 24px rgba(0,95,163,0.2)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,95,163,0.12)';">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                        alt="International shipping port with containers and cranes"
                        style="width:100%; height:180px; object-fit:cover;">
                    <div style="padding:1.5vw;">
                        <h3 style="color:#007acc; font-size:1.4rem; margin-bottom:1vw;">Global Shipping Rises Amid
                            Demand Recovery</h3>
                        <p style="color:#444; font-size:1rem; margin-bottom:1.2vw;">Global shipping activity sees a
                            sharp uptick as markets recover from recent downturns, signaling increased trade confidence
                            worldwide.</p>
                        <a href="https://www.example-news-site.com/global-shipping-rises" target="_blank" rel="noopener"
                            style="color:#00afff; font-weight:700; text-decoration:none; font-size:1rem;">Read More
                            →</a>
                    </div>
                </article>

                <article
                    style="background:#fff; border-radius:16px; box-shadow: 0 4px 12px rgba(0,95,163,0.12); overflow:hidden; transition: transform 0.3s, box-shadow 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 24px rgba(0,95,163,0.2)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,95,163,0.12)';">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                        alt="International shipping port with containers and cranes"
                        style="width:100%; height:180px; object-fit:cover;">
                    <div style="padding:1.5vw;">
                        <h3 style="color:#007acc; font-size:1.4rem; margin-bottom:1vw;">Global Shipping Rises Amid
                            Demand Recovery</h3>
                        <p style="color:#444; font-size:1rem; margin-bottom:1.2vw;">Global shipping activity sees a
                            sharp uptick as markets recover from recent downturns, signaling increased trade confidence
                            worldwide.</p>
                        <a href="https://www.example-news-site.com/global-shipping-rises" target="_blank" rel="noopener"
                            style="color:#00afff; font-weight:700; text-decoration:none; font-size:1rem;">Read More
                            →</a>
                    </div>
                </article>
                <article
                    style="background:#fff; border-radius:16px; box-shadow: 0 4px 12px rgba(0,95,163,0.12); overflow:hidden; transition: transform 0.3s, box-shadow 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 24px rgba(0,95,163,0.2)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,95,163,0.12)';">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                        alt="International shipping port with containers and cranes"
                        style="width:100%; height:180px; object-fit:cover;">
                    <div style="padding:1.5vw;">
                        <h3 style="color:#007acc; font-size:1.4rem; margin-bottom:1vw;">Global Shipping Rises Amid
                            Demand Recovery</h3>
                        <p style="color:#444; font-size:1rem; margin-bottom:1.2vw;">Global shipping activity sees a
                            sharp uptick as markets recover from recent downturns, signaling increased trade confidence
                            worldwide.</p>
                        <a href="https://www.example-news-site.com/global-shipping-rises" target="_blank" rel="noopener"
                            style="color:#00afff; font-weight:700; text-decoration:none; font-size:1rem;">Read More
                            →</a>
                    </div>
                </article>
                <article
                    style="background:#fff; border-radius:16px; box-shadow: 0 4px 12px rgba(0,95,163,0.12); overflow:hidden; transition: transform 0.3s, box-shadow 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 24px rgba(0,95,163,0.2)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,95,163,0.12)';">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                        alt="International shipping port with containers and cranes"
                        style="width:100%; height:180px; object-fit:cover;">
                    <div style="padding:1.5vw;">
                        <h3 style="color:#007acc; font-size:1.4rem; margin-bottom:1vw;">Global Shipping Rises Amid
                            Demand Recovery</h3>
                        <p style="color:#444; font-size:1rem; margin-bottom:1.2vw;">Global shipping activity sees a
                            sharp uptick as markets recover from recent downturns, signaling increased trade confidence
                            worldwide.</p>
                        <a href="https://www.example-news-site.com/global-shipping-rises" target="_blank" rel="noopener"
                            style="color:#00afff; font-weight:700; text-decoration:none; font-size:1rem;">Read More
                            →</a>
                    </div>
                </article>
                <article
                    style="background:#fff; border-radius:16px; box-shadow: 0 4px 12px rgba(0,95,163,0.12); overflow:hidden; transition: transform 0.3s, box-shadow 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 24px rgba(0,95,163,0.2)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,95,163,0.12)';">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                        alt="International shipping port with containers and cranes"
                        style="width:100%; height:180px; object-fit:cover;">
                    <div style="padding:1.5vw;">
                        <h3 style="color:#007acc; font-size:1.4rem; margin-bottom:1vw;">Global Shipping Rises Amid
                            Demand Recovery</h3>
                        <p style="color:#444; font-size:1rem; margin-bottom:1.2vw;">Global shipping activity sees a
                            sharp uptick as markets recover from recent downturns, signaling increased trade confidence
                            worldwide.</p>
                        <a href="https://www.example-news-site.com/global-shipping-rises" target="_blank" rel="noopener"
                            style="color:#00afff; font-weight:700; text-decoration:none; font-size:1rem;">Read More
                            →</a>
                    </div>
                </article>
                <article
                    style="background:#fff; border-radius:16px; box-shadow: 0 4px 12px rgba(0,95,163,0.12); overflow:hidden; transition: transform 0.3s, box-shadow 0.3s; cursor:pointer;"
                    onmouseover="this.style.transform='translateY(-6px)'; this.style.boxShadow='0 12px 24px rgba(0,95,163,0.2)';"
                    onmouseout="this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 12px rgba(0,95,163,0.12)';">
                    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=600&q=80"
                        alt="International shipping port with containers and cranes"
                        style="width:100%; height:180px; object-fit:cover;">
                    <div style="padding:1.5vw;">
                        <h3 style="color:#007acc; font-size:1.4rem; margin-bottom:1vw;">Global Shipping Rises Amid
                            Demand Recovery</h3>
                        <p style="color:#444; font-size:1rem; margin-bottom:1.2vw;">Global shipping activity sees a
                            sharp uptick as markets recover from recent downturns, signaling increased trade confidence
                            worldwide.</p>
                        <a href="https://www.example-news-site.com/global-shipping-rises" target="_blank" rel="noopener"
                            style="color:#00afff; font-weight:700; text-decoration:none; font-size:1rem;">Read More
                            →</a>
                    </div>
                </article>

            </div>
        </div>
    </section>

    <!-- 3. Company Updates (Elisense News) -->
    <section id="company-updates"
        style="width:100vw; max-width:100vw; box-sizing:border-box; margin:0 auto; padding:5vw 3vw; background:#e6f4ff;">
        <div style="max-width:960px; margin:0 auto; position:relative;">
            <h2 style="color:#005fa3; font-size:2rem; margin-bottom:4vw; text-align:center;">Elisense Updates</h2>

            <div
                style="border-left:3px solid #00afff; padding-left:2rem; display:flex; flex-direction: column; gap:2.5rem;">

                <!-- Timeline update cards -->
                <article class="update-card"
                    style="position:relative; padding-left:1rem; box-shadow: 0 4px 10px rgba(0,95,163,0.1); background:#fff; border-radius:12px; opacity:0; transform: translateY(20px); transition: opacity 0.5s ease-out, transform 0.5s ease-out;">
                    <span
                        style="position:absolute; left:-1.3rem; top:1.5rem; width:14px; height:14px; background:#00afff; border-radius:50%;"></span>
                    <time style="color:#007acc; font-weight:700; font-size:0.9rem;">Aug 20, 2025</time>
                    <span
                        style="display:inline-block; background:#00afff; color:#fff; font-size:0.75rem; font-weight:700; padding: 0.15em 0.7em; border-radius:12px; margin: 0.5rem 0;">Partnership</span>
                    <p style="color:#444; font-size:1rem; margin:0;">Signed a strategic partnership with TransGlobal
                        Freight to expand our shipping operations across Asia.</p>
                </article>

                <article class="update-card"
                    style="position:relative; padding-left:1rem; box-shadow: 0 4px 10px rgba(0,95,163,0.1); background:#fff; border-radius:12px; opacity:0; transform: translateY(20px); transition: opacity 0.5s ease-out, transform 0.5s ease-out;">
                    <span
                        style="position:absolute; left:-1.3rem; top:1.5rem; width:14px; height:14px; background:#00afff; border-radius:50%;"></span>
                    <time style="color:#007acc; font-weight:700; font-size:0.9rem;">July 15, 2025</time>
                    <span
                        style="display:inline-block; background:#00afff; color:#fff; font-size:0.75rem; font-weight:700; padding: 0.15em 0.7em; border-radius:12px; margin: 0.5rem 0;">Corporate</span>
                    <p style="color:#444; font-size:1rem; margin:0;">Launched our new eco-friendly sourcing initiative
                        aimed at reducing the environmental impact of our supply chain.</p>
                </article>

                <article class="update-card"
                    style="position:relative; padding-left:1rem; box-shadow: 0 4px 10px rgba(0,95,163,0.1); background:#fff; border-radius:12px; opacity:0; transform: translateY(20px); transition: opacity 0.5s ease-out, transform 0.5s ease-out;">
                    <span
                        style="position:absolute; left:-1.3rem; top:1.5rem; width:14px; height:14px; background:#00afff; border-radius:50%;"></span>
                    <time style="color:#007acc; font-weight:700; font-size:0.9rem;">June 5, 2025</time>
                    <span
                        style="display:inline-block; background:#00afff; color:#fff; font-size:0.75rem; font-weight:700; padding: 0.15em 0.7em; border-radius:12px; margin: 0.5rem 0;">Event</span>
                    <p style="color:#444; font-size:1rem; margin:0;">Hosted international trade webinar with industry
                        leaders discussing emerging market opportunities post-pandemic.</p>
                </article>

            </div>
        </div>

        <script>
            // Fade-in animation on scroll for update cards
            function fadeInOnScroll() {
                const cards = document.querySelectorAll('#company-updates .update-card');
                cards.forEach(card => {
                    const rect = card.getBoundingClientRect();
                    if (rect.top < window.innerHeight - 100) {
                        card.style.opacity = 1;
                        card.style.transform = 'translateY(0)';
                    }
                });
            }
            window.addEventListener('scroll', fadeInOnScroll);
            window.addEventListener('load', fadeInOnScroll);
        </script>
    </section>


    <!-- 5. Subscribe & Follow Section -->
    <section id="subscribe-follow"
        style="width:100vw; max-width:100vw; box-sizing:border-box; padding:5vw 2vw; background:#f8faff;">
        <div style="max-width:600px; margin:0 auto; text-align:center;">

            <?php if (!empty($subscribeFlash)) { ?>
            <div style="max-width:600px;margin:0 auto 12px auto; padding:10px 14px; border-radius:10px; <?php echo $subscribeType==='success' ? 'background:#e8fff3;color:#065f46;border:1px solid #bbf7d0;' : 'background:#fff1f2;color:#9f1239;border:1px solid #fecdd3;'; ?>">
                <?php echo htmlspecialchars($subscribeFlash); ?>
            </div>
            <?php } ?>

            <form id="subscribe-form" method="post"
                style="display:flex; flex-wrap:wrap; gap:1rem; justify-content:center; align-items:center;">
                <input type="hidden" name="subscribe_action" value="1" />
                <input type="email" id="email-input" name="email" placeholder="Enter your email" required
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                    style="flex:1; min-width:220px; padding:0.85em 1em; border-radius:30px; border:1px solid #00afff; font-size:1rem; outline:none; transition: border-color 0.3s;"
                    aria-label="Email input for newsletter subscription"
                    value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                <button type="submit"
                    style="padding:0.85em 2.2em; background: linear-gradient(90deg, #00afff, #005fa3); color:#fff; font-weight:700; border:none; border-radius:30px; cursor:pointer; font-size:1rem; transition: box-shadow 0.3s;">
                    Subscribe
                </button>
            </form>

            <div style="margin-top:2rem; display:flex; justify-content:center; gap:2.5rem; font-size:1.8rem;">
                <a href="https://www.linkedin.com/company/elisense-enterprise" target="_blank" rel="noopener"
                    aria-label="Elisense LinkedIn" style="color:#005fa3; transition:color 0.3s;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;">
                        <path
                            d="M19 0h-14c-2.76 0-5 2.24-5 5v14c0 2.76 2.24 5 5 5h14c2.76 0 5-2.24 5-5v-14c0-2.76-2.24-5-5-5zm-12 19h-3v-10h3v10zm-1.5-11.25c-.966 0-1.75-.784-1.75-1.75S4.534 4.25 5.5 4.25 7.25 5.034 7.25 6s-.784 1.75-1.75 1.75zm13.5 11.25h-3v-5.5c0-1.337-1.663-1.239-1.663 0v5.5h-3v-10h3v1.447c1.396-2.586 6-2.787 6 2.467v6.086z" />
                    </svg>
                </a>
                <a href="https://twitter.com/elisense-enterprise" target="_blank" rel="noopener"
                    aria-label="Elisense Twitter" style="color:#011f4b; transition:color 0.3s;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;">
                        <path
                            d="M24 4.557a9.829 9.829 0 01-2.828.775 4.932 4.932 0 002.165-2.724 9.861 9.861 0 01-3.127 1.195 4.916 4.916 0 00-8.38 4.482A13.942 13.942 0 011.671 3.149 4.912 4.912 0 003.195 9.72a4.903 4.903 0 01-2.228-.616v.063a4.919 4.919 0 003.946 4.827 4.902 4.902 0 01-2.224.085 4.923 4.923 0 004.594 3.417A9.866 9.866 0 010 21.543 13.924 13.924 0 007.548 24c9.142 0 14.307-7.721 14.307-14.42 0-.22-.004-.439-.014-.654A10.246 10.246 0 0024 4.557z" />
                    </svg>
                </a>
                <a href="https://instagram.com/elisense-enterprise" target="_blank" rel="noopener"
                    aria-label="Elisense Instagram" style="color:#c13584; transition:color 0.3s;">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg" style="vertical-align:middle;">
                        <path
                            d="M7.75 2h8.5A5.75 5.75 0 0122 7.75v8.5A5.75 5.75 0 0116.25 22h-8.5A5.75 5.75 0 012 16.25v-8.5A5.75 5.75 0 017.75 2zm0 1.5A4.25 4.25 0 003.5 7.75v8.5A4.25 4.25 0 007.75 20.5h8.5a4.25 4.25 0 004.25-4.25v-8.5a4.25 4.25 0 00-4.25-4.25h-8.5zm8.13 3.92a.88.88 0 110 1.76.88.88 0 010-1.76zM12 7a5 5 0 110 10 5 5 0 010-10zm0 1.5a3.5 3.5 0 100 7 3.5 3.5 0 000-7z" />
                    </svg>
                </a>
            </div>
        </div>

        <script>
            // No JS needed; handled server-side with PHP flash
        </script>
    </section>

    <!-- 6. Call-to-Action Banner -->
    <section id="insights-cta"
        style="width:100vw; max-width:100vw; box-sizing:border-box; margin:0 auto; padding:4vw 2vw; background:linear-gradient(90deg, #00afff 80%, #005fa3 100%); display:flex; flex-direction:column; align-items:center; text-align:center; border-radius:22px;">
        <div style="max-width:700px; width:90vw; margin:0 auto;">
            <blockquote style="color:#fff; font-size:1.6rem; font-style:italic; margin-bottom:2vw; line-height:1.4;">
                Knowledge drives successful trade. Stay informed with Elisense.
            </blockquote>
            <a href="https://calendly.com/elisense-enterprise/book-meeting" target="_blank"
                style="display:inline-block; padding:0.85em 2.3em; background:#fff; color:#00afff; font-weight:700; border-radius:12px; font-size:1.3rem; text-decoration:none; box-shadow:0 4px 16px rgba(0,175,255,0.08); transition:box-shadow 0.18s, background 0.18s;">
                Book a Meeting
            </a>
        </div>

        <script>
            const ctaBtn = document.querySelector('#insights-cta a');
            ctaBtn.addEventListener('mouseover', () => {
                ctaBtn.style.boxShadow = "0 8px 32px rgba(0,175,255,0.22)";
                ctaBtn.style.background = "#e6f4ff";
            });
            ctaBtn.addEventListener('mouseout', () => {
                ctaBtn.style.boxShadow = "0 4px 16px rgba(0,175,255,0.08)";
                ctaBtn.style.background = "#fff";
            });
        </script>
    </section>




    <footer role="contentinfo" aria-label="Site Footer"
        style="background: #002f55; color: #ccc; padding: 3rem 1rem 2rem; margin-top: 4rem;">
        <div class="footer-container"
            style="max-width: 1100px; margin: 0 auto; display: flex; flex-wrap: wrap; justify-content: space-between; gap: 2rem;">

            <!-- Call to Action -->
            <section class="footer-column" aria-labelledby="footer-cta-title"
                style="flex: 1 1 280px; min-width: 280px; padding: 0 0.5rem;">
                <h2 id="footer-cta-title" style="color: #00aaff; font-size: 1.8rem; margin-bottom: 1rem;">Ready to
                    Elevate Your Global Sourcing?</h2>
                <a href="#contact" class="footer-cta"
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
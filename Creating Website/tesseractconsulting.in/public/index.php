<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tesseract Consulting | IT & Cybersecurity</title>

    <meta name="description"
          content="Tesseract Consulting provides IT, cybersecurity and technical resources, documentation and consulting services.">

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Inter", sans-serif;
            color: #172033;
            background: #ffffff;
            line-height: 1.6;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        /* =========================
           NAVIGATION
        ========================= */

        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;

            display: flex;
            justify-content: space-between;
            align-items: center;

            padding: 18px 7%;
            background: rgba(255, 255, 255, 0.96);
            border-bottom: 1px solid #e8ebf0;
        }

        .logo {
            font-size: 22px;
            font-weight: 800;
            color: #111827;
        }

        .logo span {
            color: #2563eb;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 28px;
            list-style: none;
        }

        .nav-links a {
            font-size: 14px;
            font-weight: 500;
            color: #374151;
        }

        .nav-links a:hover {
            color: #2563eb;
        }

        .nav-actions {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border-radius: 7px;
            font-size: 14px;
            font-weight: 600;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-outline {
            border: 1px solid #d1d5db;
            color: #374151;
            background: white;
        }

        .btn-outline:hover {
            border-color: #2563eb;
            color: #2563eb;
        }

        /* =========================
           HERO
        ========================= */

        .hero {
            min-height: 600px;

            display: flex;
            align-items: center;

            padding: 80px 7%;

            background:
                linear-gradient(
                    110deg,
                    #f7faff 0%,
                    #ffffff 55%,
                    #eef5ff 100%
                );
        }

        .hero-content {
            max-width: 760px;
        }

        .hero-tag {
            display: inline-block;
            margin-bottom: 20px;

            padding: 7px 13px;

            border-radius: 20px;

            background: #e8f0ff;
            color: #2563eb;

            font-size: 13px;
            font-weight: 600;
        }

        .hero h1 {
            font-size: clamp(42px, 6vw, 72px);
            line-height: 1.05;
            letter-spacing: -2px;

            margin-bottom: 25px;
            color: #111827;
        }

        .hero h1 span {
            color: #2563eb;
        }

        .hero p {
            max-width: 650px;

            margin-bottom: 30px;

            font-size: 18px;
            color: #5b6472;
        }

        .hero-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        /* =========================
           GENERAL SECTION
        ========================= */

        section {
            padding: 85px 7%;
        }

        .section-header {
            max-width: 700px;
            margin-bottom: 45px;
        }

        .section-header h2 {
            font-size: 34px;
            margin-bottom: 12px;
            color: #111827;
        }

        .section-header p {
            color: #667085;
        }

        /* =========================
           RESOURCES
        ========================= */

        .resources {
            background: #f8fafc;
        }

        .resource-controls {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .search-box {
            width: 300px;
            padding: 13px 16px;

            border: 1px solid #d9dee7;
            border-radius: 7px;

            font-size: 14px;
            outline: none;
        }

        .search-box:focus {
            border-color: #2563eb;
        }

        .resource-grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(260px, 1fr));

            gap: 24px;
        }

        .resource-card {
            background: white;

            padding: 28px;

            border: 1px solid #e5e7eb;
            border-radius: 10px;

            transition: 0.2s;
        }

        .resource-card:hover {
            transform: translateY(-4px);
            border-color: #bfdbfe;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
        }

        .resource-type {
            display: inline-block;

            margin-bottom: 15px;

            padding: 5px 9px;

            border-radius: 5px;

            background: #eff6ff;
            color: #2563eb;

            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .resource-card h3 {
            margin-bottom: 10px;
            font-size: 19px;
        }

        .resource-card p {
            margin-bottom: 20px;
            color: #667085;
            font-size: 14px;
        }

        /* =========================
           SERVICES
        ========================= */

        .service-grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(220px, 1fr));

            gap: 20px;
        }

        .service-card {
            padding: 25px;

            border: 1px solid #e5e7eb;
            border-radius: 10px;
        }

        .service-number {
            color: #2563eb;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 15px;
        }

        .service-card h3 {
            margin-bottom: 8px;
        }

        .service-card p {
            font-size: 14px;
            color: #667085;
        }

        /* =========================
           LATEST INSIGHTS
        ========================= */

        .insights {
            background: #f8fafc;
        }

        .insight-grid {
            display: grid;
            grid-template-columns:
                repeat(auto-fit, minmax(260px, 1fr));

            gap: 24px;
        }

        .insight-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .insight-card small {
            color: #2563eb;
            font-weight: 600;
        }

        .insight-card h3 {
            margin: 12px 0;
        }

        .insight-card p {
            font-size: 14px;
            color: #667085;
        }

        /* =========================
           ABOUT
        ========================= */

        .about-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .about-text h2 {
            font-size: 34px;
            margin-bottom: 20px;
        }

        .about-text p {
            margin-bottom: 15px;
            color: #5f6877;
        }

        .about-points {
            margin-top: 25px;
            display: grid;
            gap: 12px;
        }

        .about-point {
            padding: 14px;

            border-left: 3px solid #2563eb;
            background: #f8fafc;

            font-size: 14px;
        }

        .about-panel {
            min-height: 300px;

            display: flex;
            align-items: center;
            justify-content: center;

            border-radius: 12px;

            background:
                linear-gradient(
                    135deg,
                    #172033,
                    #2563eb
                );

            color: white;
            text-align: center;
            padding: 40px;
        }

        .about-panel h3 {
            font-size: 28px;
        }

        /* =========================
           CONTACT
        ========================= */

        .contact {
            background: #f8fafc;
        }

        .contact-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
        }

        .contact-info h2 {
            font-size: 34px;
            margin-bottom: 15px;
        }

        .contact-info p {
            color: #667085;
            margin-bottom: 25px;
        }

        .contact-item {
            margin-bottom: 15px;
        }

        .contact-item strong {
            display: block;
            margin-bottom: 3px;
        }

        .contact-form {
            background: white;
            padding: 30px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 7px;
            font-size: 13px;
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;

            padding: 12px;

            border: 1px solid #d9dee7;
            border-radius: 6px;

            font-family: inherit;
            outline: none;
        }

        .form-group textarea {
            min-height: 130px;
            resize: vertical;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #2563eb;
        }

        /* =========================
           FOOTER
        ========================= */

        footer {
            padding: 45px 7% 25px;

            background: #111827;
            color: #d1d5db;
        }

        .footer-grid {
            display: grid;
            grid-template-columns:
                2fr 1fr 1fr 1fr;

            gap: 40px;
            margin-bottom: 35px;
        }

        .footer-column h3 {
            color: white;
            margin-bottom: 15px;
        }

        .footer-column a {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #9ca3af;
        }

        .footer-column a:hover {
            color: white;
        }

        .footer-bottom {
            padding-top: 20px;

            border-top: 1px solid #374151;

            font-size: 13px;
            color: #9ca3af;
        }

        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 800px) {

            .navbar {
                flex-wrap: wrap;
                gap: 15px;
            }

            .nav-links {
                order: 3;
                width: 100%;
                justify-content: center;
                gap: 15px;
                flex-wrap: wrap;
            }

            .hero {
                min-height: 500px;
            }

            .about-container,
            .contact-container {
                grid-template-columns: 1fr;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
            }
        }

        @media (max-width: 500px) {

            section {
                padding: 60px 5%;
            }

            .hero {
                padding: 60px 5%;
            }

            .hero h1 {
                font-size: 42px;
            }

            .search-box {
                width: 100%;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>

<!-- =========================
     NAVIGATION
========================= -->

<header class="navbar">

    <a href="index.php" class="logo">
        Tesseract<span> Consulting</span>
    </a>

    <nav>
        <ul class="nav-links">
            <li><a href="#resources">Resources</a></li>
            <li><a href="#services">Expertise</a></li>
            <li><a href="#insights">Insights</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>

    <div class="nav-actions">
        <a href="login.php" class="btn btn-outline">Login</a>
        <a href="register.php" class="btn btn-primary">Register</a>
    </div>

</header>


<!-- =========================
     HERO
========================= -->

<section class="hero">

    <div class="hero-content">

        <span class="hero-tag">
            IT & Cybersecurity
        </span>

        <h1>
            Building secure and
            <span>reliable technology.</span>
        </h1>

        <p>
            Tesseract Consulting provides IT and cybersecurity
            expertise, technical resources and practical knowledge
            to help organizations build and maintain secure systems.
        </p>

        <div class="hero-buttons">
            <a href="#resources" class="btn btn-primary">
                Explore Resources
            </a>

            <a href="#contact" class="btn btn-outline">
                Contact Us
            </a>
        </div>

    </div>

</section>


<!-- =========================
     RESOURCES / PDF SECTION
========================= -->

<section class="resources" id="resources">

    <div class="section-header">

        <h2>Knowledge & Resources</h2>

        <p>
            Explore technical documents, guides and reference
            material covering cybersecurity and information technology.
        </p>

    </div>

    <div class="resource-controls">

        <input
            type="search"
            class="search-box"
            placeholder="Search resources..."
        >

        <a href="resources.php" class="btn btn-outline">
            View All Resources
        </a>

    </div>


    <div class="resource-grid">

        <article class="resource-card">

            <span class="resource-type">
                PDF
            </span>

            <h3>
                Cybersecurity Reference Guide
            </h3>

            <p>
                A practical reference covering important
                cybersecurity concepts and practices.
            </p>

            <a href="#" class="btn btn-primary">
                Read Document
            </a>

        </article>


        <article class="resource-card">

            <span class="resource-type">
                PDF
            </span>

            <h3>
                Infrastructure Security
            </h3>

            <p>
                Reference material covering infrastructure,
                servers and system security.
            </p>

            <a href="#" class="btn btn-primary">
                Read Document
            </a>

        </article>


        <article class="resource-card">

            <span class="resource-type">
                Guide
            </span>

            <h3>
                Security Best Practices
            </h3>

            <p>
                Practical guidance for improving the security
                posture of technology environments.
            </p>

            <a href="#" class="btn btn-primary">
                Read Guide
            </a>

        </article>

    </div>

</section>


<!-- =========================
     EXPERTISE
========================= -->

<section id="services">

    <div class="section-header">

        <h2>Areas of Expertise</h2>

        <p>
            Explore the areas in which Tesseract Consulting
            provides technical knowledge and support.
        </p>

    </div>


    <div class="service-grid">

        <div class="service-card">
            <div class="service-number">01</div>

            <h3>
                Cybersecurity
            </h3>

            <p>
                Security principles, assessments, hardening
                and defensive practices.
            </p>
        </div>


        <div class="service-card">
            <div class="service-number">02</div>

            <h3>
                Infrastructure
            </h3>

            <p>
                Linux, servers, networking and secure
                infrastructure management.
            </p>
        </div>


        <div class="service-card">
            <div class="service-number">03</div>

            <h3>
                Security Documentation
            </h3>

            <p>
                Technical documentation, security practices,
                processes and reference material.
            </p>
        </div>


        <div class="service-card">
            <div class="service-number">04</div>

            <h3>
                Training & Knowledge
            </h3>

            <p>
                Practical learning resources for developing
                IT and cybersecurity capabilities.
            </p>
        </div>

    </div>

</section>


<!-- =========================
     INSIGHTS
========================= -->

<section class="insights" id="insights">

    <div class="section-header">

        <h2>Latest Insights</h2>

        <p>
            Articles, updates and practical observations
            from the field of IT and cybersecurity.
        </p>

    </div>


    <div class="insight-grid">

        <article class="insight-card">

            <small>CYBERSECURITY</small>

            <h3>
                Understanding Modern Security Threats
            </h3>

            <p>
                An overview of common security challenges
                organizations face today.
            </p>

            <br>

            <a href="#" class="btn btn-outline">
                Read More
            </a>

        </article>


        <article class="insight-card">

            <small>INFRASTRUCTURE</small>

            <h3>
                Building Secure Linux Infrastructure
            </h3>

            <p>
                Important considerations when deploying
                and securing Linux servers.
            </p>

            <br>

            <a href="#" class="btn btn-outline">
                Read More
            </a>

        </article>


        <article class="insight-card">

            <small>SECURITY</small>

            <h3>
                Security by Design
            </h3>

            <p>
                Why security should be considered during
                system design rather than after deployment.
            </p>

            <br>

            <a href="#" class="btn btn-outline">
                Read More
            </a>

        </article>

    </div>

</section>


<!-- =========================
     ABOUT
========================= -->

<section id="about">

    <div class="about-container">

        <div class="about-text">

            <h2>
                About Tesseract Consulting
            </h2>

            <p>
                Tesseract Consulting works across information
                technology and cybersecurity, with a focus on
                practical and secure technology solutions.
            </p>

            <p>
                Our platform also provides technical documentation,
                reference material and knowledge resources for
                professionals and learners.
            </p>


            <div class="about-points">

                <div class="about-point">
                    Practical technology and cybersecurity knowledge
                </div>

                <div class="about-point">
                    Security-focused infrastructure and practices
                </div>

                <div class="about-point">
                    Accessible technical documentation
                </div>

            </div>

        </div>


        <div class="about-panel">

            <div>

                <h3>
                    Technology.<br>
                    Security.<br>
                    Knowledge.
                </h3>

            </div>

        </div>

    </div>

</section>


<!-- =========================
     CONTACT
========================= -->

<section class="contact" id="contact">

    <div class="contact-container">

        <div class="contact-info">

            <h2>
                Get in Touch
            </h2>

            <p>
                Have a question, requirement or collaboration
                opportunity? Contact Tesseract Consulting.
            </p>


            <div class="contact-item">
                <strong>Email</strong>
                info@example.com
            </div>


            <div class="contact-item">
                <strong>Location</strong>
                India
            </div>

        </div>


        <form class="contact-form">

            <div class="form-group">

                <label for="name">
                    Name
                </label>

                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Your name"
                >

            </div>


            <div class="form-group">

                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Your email"
                >

            </div>


            <div class="form-group">

                <label for="message">
                    Message
                </label>

                <textarea
                    id="message"
                    name="message"
                    placeholder="Your message"
                ></textarea>

            </div>


            <button
                type="submit"
                class="btn btn-primary"
            >
                Send Message
            </button>

        </form>

    </div>

</section>


<!-- =========================
     FOOTER
========================= -->

<footer>

    <div class="footer-grid">

        <div class="footer-column">

            <h3>
                Tesseract Consulting
            </h3>

            <p>
                IT and cybersecurity knowledge,
                resources and technical solutions.
            </p>

        </div>


        <div class="footer-column">

            <h3>
                Explore
            </h3>

            <a href="#resources">Resources</a>
            <a href="#insights">Insights</a>
            <a href="#services">Expertise</a>

        </div>


        <div class="footer-column">

            <h3>
                Company
            </h3>

            <a href="#about">About</a>
            <a href="#contact">Contact</a>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>

        </div>


        <div class="footer-column">

            <h3>
                Legal
            </h3>

            <a href="privacy.php">Privacy Policy</a>
            <a href="terms.php">Terms of Use</a>

        </div>

    </div>


    <div class="footer-bottom">

        © 2026 Tesseract Consulting. All rights reserved.

    </div>

</footer>

</body>
</html>
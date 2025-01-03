<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .footer {
            background: linear-gradient(135deg, rgba(0, 100, 81, 0.8), rgba(0, 21, 51, 0.8));
            color: #fff;
            padding: 20px 0;
            margin-top: 20px;
        }

        .footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }

        .footer-section {
            flex: 1;
            margin: 10px;
            min-width: 200px;
        }

        .footer-section h3 {
            font-size: 1.2em;
            margin-bottom: 10px;
            border-bottom: 2px solid #00c851;
            display: inline-block;
            padding-bottom: 5px;
        }

        .footer-section p,
        .footer-section ul {
            margin: 0;
            line-height: 1.8;
        }

        .footer-section ul {
            list-style: none;
            padding: 0;
        }

        .footer-section ul li {
            margin: 5px 0;
        }

        .footer-section ul li a {
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-section ul li a:hover {
            text-decoration: underline;
        }

        .social-icons a {
            margin-right: 10px;
            display: inline-block;
            width: 30px;
            height: 30px;
            overflow: hidden;
        }

        .social-icons img {
            width: 100%;
            height: auto;
        }

        .footer-bottom {
            text-align: center;
            padding: 10px 0;
            
            font-size: 0.9em;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>About Us</h3>
                <p>Your trusted job portal in Bangladesh. Connecting talent with opportunities since 2023.</p>
            </div>
            <div class="footer-section">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="contact.php">Contact Us</a></li>
                    <li><a href="terms.php">Terms & Conditions</a></li>
                    <li><a href="privacy.php">Privacy Policy</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Contact Info</h3>
                <p>Email: support@jobportalbd.com</p>
                <p>Phone: +880 1234 567890</p>
                <p>Address: 123, Job Avenue, Dhaka, Bangladesh</p>
            </div>
            <div class="footer-section">
                <h3>Follow Us</h3>
                <div class="social-icons">
                    <a href="#"><img src="facebook-svgrepo-com.svg" alt="Facebook"></a>
                    <a href="#"><img src="twitter-svgrepo-com.svg" alt="Twitter"></a>
                    <a href="#"><img src="linkedin-svgrepo-com.svg" alt="LinkedIn"></a>
                   
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Job Portal BD. All Rights Reserved By Johyra AJmayen.</p>
        </div>
    </footer>

</body>

</html>
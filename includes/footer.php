<footer class="main-footer">
    <div class="container">
        <div class="footer-content">
            <div class="footer-column">
                <h3>About Us</h3>
                <p>ProCool HVAC Solutions is a leading provider of heating, ventilation, and air conditioning services with over 15 years of experience in the industry.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul class="footer-links">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="services/">Services</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="privacy.php">Privacy Policy</a></li>
                    <li><a href="terms.php">Terms of Service</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Our Services</h3>
                <ul class="footer-links">
                    <?php 
                    $services = getServices(5);
                    foreach ($services as $service): ?>
                        <li><a href="services/<?php echo strtolower(str_replace(' ', '-', $service['slug'])); ?>"><?php echo $service['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Contact Info</h3>
                <ul class="contact-list">
                    <li><i class="fas fa-map-marker-alt"></i> <?php echo SITE_ADDRESS; ?></li>
                    <li><i class="fas fa-phone-alt"></i> <?php echo SITE_PHONE; ?></li>
                    <li><i class="fas fa-envelope"></i> <?php echo SITE_EMAIL; ?></li>
                </ul>
                
                <h4>Newsletter</h4>
                <p>Subscribe to our newsletter for the latest updates and offers.</p>
                <form class="newsletter-form">
                    <input type="email" placeholder="Your Email" required>
                    <button type="submit"><i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
    
    <div class="footer-bottom">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> <?php echo SITE_NAME; ?>. All Rights Reserved.</p>
        </div>
    </div>
    
    <!-- Back to Top Button -->
    <a href="#" class="back-to-top"><i class="fas fa-arrow-up"></i></a>
</footer>

<script src="assets/js/main.js"></script>
</body>
</html>
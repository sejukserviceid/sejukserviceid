<?php
$pageTitle = "HVAC Services | Heating, Ventilation, Air Conditioning";
include 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <h1>Professional HVAC Services</h1>
            <p>Keeping your home comfortable all year round with top-quality heating and cooling solutions.</p>
            <div class="hero-btns">
                <a href="contact.php" class="btn btn-primary">Get a Free Estimate</a>
                <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', SITE_PHONE); ?>" class="btn btn-secondary">
                    <i class="fas fa-phone"></i> Call Now
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <div class="section-header">
            <h2>Our Services</h2>
            <p>We provide comprehensive HVAC solutions for residential and commercial properties.</p>
        </div>
        
        <div class="services-grid">
            <?php 
            $services = getServices(6);
            foreach ($services as $service): ?>
                <div class="service-card">
                    <div class="service-icon">
                        <i class="<?php echo $service['icon']; ?>"></i>
                    </div>
                    <h3><?php echo $service['name']; ?></h3>
                    <p><?php echo substr($service['description'], 0, 100) . '...'; ?></p>
                    <a href="services/<?php echo strtolower(str_replace(' ', '-', $service['slug'])); ?>" class="read-more">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            <?php endforeach; ?>
        </div>
        
        <div class="text-center">
            <a href="services/" class="btn btn-outline">View All Services</a>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>About ProCool HVAC Solutions</h2>
                <p>With over 15 years of experience in the HVAC industry, we are committed to providing top-notch heating, ventilation, and air conditioning services to our valued customers.</p>
                <p>Our team of certified technicians is dedicated to ensuring your complete satisfaction with every service we provide.</p>
                <ul class="about-features">
                    <li><i class="fas fa-check-circle"></i> Licensed & Insured Professionals</li>
                    <li><i class="fas fa-check-circle"></i> 24/7 Emergency Services</li>
                    <li><i class="fas fa-check-circle"></i> Competitive Pricing</li>
                    <li><i class="fas fa-check-circle"></i> 100% Satisfaction Guarantee</li>
                </ul>
                <a href="about.php" class="btn btn-primary">Learn More About Us</a>
            </div>
            <div class="about-image">
                <img src="assets/images/about-image.jpg" alt="HVAC Technician">
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section">
    <div class="container">
        <div class="section-header">
            <h2>What Our Clients Say</h2>
            <p>Hear from our satisfied customers about their experience with our services.</p>
        </div>
        
        <div class="testimonials-slider">
            <div class="testimonial">
                <div class="testimonial-content">
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"ProCool HVAC installed a new AC unit in our home and did an excellent job. The technicians were professional, knowledgeable, and cleaned up after themselves. Highly recommend!"</p>
                </div>
                <div class="testimonial-author">
                    <img src="assets/images/client1.jpg" alt="Sarah Johnson">
                    <h4>Sarah Johnson</h4>
                    <span>Homeowner</span>
                </div>
            </div>
            
            <div class="testimonial">
                <div class="testimonial-content">
                    <div class="rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>"Their emergency repair service saved us during a heat wave. Quick response, fair pricing, and fixed our AC in no time. Will definitely use them for all our HVAC needs."</p>
                </div>
                <div class="testimonial-author">
                    <img src="assets/images/client2.jpg" alt="Michael Thompson">
                    <h4>Michael Thompson</h4>
                    <span>Business Owner</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content">
            <h2>Ready to Improve Your Indoor Comfort?</h2>
            <p>Contact us today for a free consultation and estimate. Our team is standing by to assist you with all your HVAC needs.</p>
            <div class="cta-btns">
                <a href="contact.php" class="btn btn-light">Contact Us</a>
                <a href="tel:<?php echo str_replace([' ', '(', ')', '-'], '', SITE_PHONE); ?>" class="btn btn-outline-light">
                    <i class="fas fa-phone"></i> <?php echo SITE_PHONE; ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
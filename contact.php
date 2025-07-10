<?php
$pageTitle = "Contact Us | HVAC Services";
include 'includes/header.php';

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = sanitize($_POST['name']);
    $email = sanitize($_POST['email']);
    $phone = sanitize($_POST['phone']);
    $service = sanitize($_POST['service']);
    $message = sanitize($_POST['message']);
    
    // Validate inputs
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required';
    }
    
    // If no errors, process form
    if (empty($errors)) {
        // Save to database
        $sql = "INSERT INTO contacts (name, email, phone, service, message, created_at) 
                VALUES ('$name', '$email', '$phone', '$service', '$message', NOW())";
        
        if ($conn->query($sql) === TRUE) {
            // Send email
            $emailSubject = "New Contact Form Submission from $name";
            $emailMessage = "
                <h2>New Contact Form Submission</h2>
                <p><strong>Name:</strong> $name</p>
                <p><strong>Email:</strong> $email</p>
                <p><strong>Phone:</strong> $phone</p>
                <p><strong>Service:</strong> $service</p>
                <p><strong>Message:</strong> $message</p>
            ";
            
            if (sendEmail(SITE_EMAIL, $emailSubject, $emailMessage)) {
                $success = "Thank you for contacting us! We'll get back to you soon.";
                // Clear form
                $name = $email = $phone = $service = $message = '';
            } else {
                $errors[] = 'There was a problem sending your message. Please try again.';
            }
        } else {
            $errors[] = 'There was a problem submitting your form. Please try again.';
        }
    }
}
?>

<!-- Contact Hero -->
<section class="page-hero">
    <div class="container">
        <h1>Contact Us</h1>
        <p>Have questions or need HVAC services? Reach out to our team today.</p>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-content">
            <div class="contact-info">
                <h2>Get In Touch</h2>
                <p>Our team is ready to assist you with all your HVAC needs. Contact us using the information below or fill out the form.</p>
                
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="info-text">
                        <h3>Address</h3>
                        <p><?php echo SITE_ADDRESS; ?></p>
                    </div>
                </div>
                
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="info-text">
                        <h3>Phone</h3>
                        <p><?php echo SITE_PHONE; ?></p>
                    </div>
                </div>
                
                <div class="info-box">
                    <div class="info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="info-text">
                        <h3>Email</h3>
                        <p><?php echo SITE_EMAIL; ?></p>
                    </div>
                </div>
                
                <div class="contact-hours">
                    <h3>Business Hours</h3>
                    <ul>
                        <li>Monday - Friday: 8:00 AM - 6:00 PM</li>
                        <li>Saturday: 9:00 AM - 4:00 PM</li>
                        <li>Sunday: Emergency Services Only</li>
                    </ul>
                </div>
            </div>
            
            <div class="contact-form">
                <h2>Send Us a Message</h2>
                
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                
                <?php if (isset($success)): ?>
                    <div class="alert alert-success">
                        <?php echo $success; ?>
                    </div>
                <?php endif; ?>
                
                <form action="contact.php" method="POST">
                    <div class="form-group">
                        <label for="name">Full Name *</label>
                        <input type="text" id="name" name="name" value="<?php echo isset($name) ? $name : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="service">Service Needed</label>
                        <select id="service" name="service">
                            <option value="">Select a Service</option>
                            <?php 
                            $services = getServices();
                            foreach ($services as $service): ?>
                                <option value="<?php echo $service['name']; ?>" <?php echo (isset($service_selected) && $service_selected == $service['name'] ? 'selected' : ''; ?>>
                                    <?php echo $service['name']; ?>
                                </option>
                            <?php endforeach; ?>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message *</label>
                        <textarea id="message" name="message" rows="5" required><?php echo isset($message) ? $message : ''; ?></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2152091795357!2d-73.9878449241646!3d40.74844097138992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1689876423584!5m2!1sen!2sus" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<?php include 'includes/footer.php'; ?>
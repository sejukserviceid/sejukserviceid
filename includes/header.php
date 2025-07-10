<?php
// Start session
session_start();

// Include config and functions
require_once 'config.php';
require_once 'functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle . ' | ' . SITE_NAME : SITE_NAME; ?></title>
    <meta name="description" content="Professional HVAC services including installation, repair, and maintenance for residential and commercial properties.">
    
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="container">
            <div class="contact-info">
                <span><i class="fas fa-phone"></i> <?php echo SITE_PHONE; ?></span>
                <span><i class="fas fa-envelope"></i> <?php echo SITE_EMAIL; ?></span>
            </div>
            <div class="social-links">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>

    <!-- Header -->
    <header class="main-header">
        <div class="container">
            <div class="logo">
                <a href="index.php">
                    <img src="assets/images/logo.png" alt="<?php echo SITE_NAME; ?>">
                </a>
            </div>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="index.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">Home</a></li>
                    <li><a href="about.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">About Us</a></li>
                    <li class="dropdown">
                        <a href="services/" class="<?php echo strpos($_SERVER['REQUEST_URI'], 'services') !== false ? 'active' : ''; ?>">Services <i class="fas fa-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <?php 
                            $services = getServices(5);
                            foreach ($services as $service): ?>
                                <li><a href="services/<?php echo strtolower(str_replace(' ', '-', $service['slug'])); ?>"><?php echo $service['name']; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li><a href="contact.php" class="<?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">Contact</a></li>
                </ul>
            </nav>
            
            <div class="header-cta">
                <a href="contact.php" class="btn btn-primary">Get a Quote</a>
            </div>
            
            <div class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </header>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <div class="mobile-menu-close">
            <i class="fas fa-times"></i>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li class="mobile-dropdown">
                <a href="javascript:void(0)">Services <i class="fas fa-chevron-down"></i></a>
                <ul class="mobile-dropdown-menu">
                    <?php foreach ($services as $service): ?>
                        <li><a href="services/<?php echo strtolower(str_replace(' ', '-', $service['slug'])); ?>"><?php echo $service['name']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>
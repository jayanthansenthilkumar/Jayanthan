<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrisolTech - Register/Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        background: #f5f5f5;
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .container {
        width: 100%;
        min-height: 100vh;
        display: flex;
        background: white;
    }

    .left-side {
        flex: 1;
        background: #f8f9fa;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        position: relative;
        overflow: hidden;
    }

    .company-info {
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .company-info h1 {
        font-size: 3.5rem;
        color: #2c3e50;
        margin-bottom: 20px;
    }

    .company-info p {
        color: #7f8c8d;
        font-size: 1.2rem;
    }

    .right-side {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px;
        background: #f8f9fa;
        /* Optional: adds contrast */
    }

    .form-container {
        width: 100%;
        max-width: 400px;
        background: white;
        padding: 20px 30px;
        /* Reduced top/bottom padding */
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        position: relative;
        height: auto;
        overflow: hidden;
        /* Contains absolute positioned children */
    }

    .form {
        display: block;
        width: 100%;
        opacity: 0;
        visibility: hidden;
        position: relative;
        /* Changed from absolute to relative */
        transform: translateX(50px);
        transition: all 0.4s ease-in-out;
        height: 0;
        /* Hide inactive form */
        margin-bottom: 0;
        /* Remove bottom margin */
    }

    .form.active {
        opacity: 1;
        visibility: visible;
        transform: translateX(0);
        height: auto;
        /* Show active form */
        margin-bottom: 15px;
        /* Add space at bottom */
    }

    /* Add specific height for login form since it's shorter */
    #loginForm {
        min-height: auto;
        /* Remove fixed height */
    }

    .toggle-link {
        display: block;
        text-align: center;
        margin-top: 15px;
        /* Reduced top margin */
        padding: 5px 0;
        /* Reduced padding */
        color: #3498db;
        text-decoration: none;
        font-size: 14px;
    }

    .toggle-link:hover {
        text-decoration: underline;
    }

    h2 {
        color: #2c3e50;
        margin-bottom: 20px;
        /* Reduced bottom margin */
        text-align: center;
        font-size: 24px;
        /* Consistent heading size */
        font-weight: 600;
    }

    input {
        width: 100%;
        padding: 12px;
        /* Reduced padding */
        margin-bottom: 15px;
        /* Reduced spacing between inputs */
        border: 1px solid #e1e1e1;
        border-radius: 8px;
        outline: none;
        transition: all 0.3s;
        font-size: 14px;
        /* Consistent font size */
    }

    input:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.1);
    }

    button {
        width: 100%;
        padding: 12px;
        background: #3498db;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        transition: background 0.3s;
        margin-top: 5px;
        /* Reduced top margin */
    }

    button:hover {
        background: #2980b9;
    }

    #particles-js {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
    }

    select {
        width: 100%;
        padding: 12px;
        margin-bottom: 15px;
        border: 1px solid #e1e1e1;
        border-radius: 8px;
        outline: none;
        transition: all 0.3s;
        font-size: 14px;
        background-color: white;
        cursor: pointer;
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%23333' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 12px;
        padding-right: 35px;
    }

    select:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.1);
    }

    select:hover {
        border-color: #3498db;
    }

    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }

        .left-side,
        .right-side {
            padding: 20px;
        }

        .company-info h1 {
            font-size: 2.5rem;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="left-side">
            <div id="particles-js"></div>
            <div class="company-info">
                <h1>PrisolTech</h1>
                <p>Innovate • Create • Transform</p>
            </div>
        </div>

        <div class="right-side">
            <div class="form-container">
                <form class="form active" id="registerForm">
                    <h2>Event Registration</h2>
                    <input type="text" name="name" placeholder="Full Name" required>
                    <input type="text" name="regno" placeholder="Register Number" required>
                    <select name="department" required>
                        <option value="" disabled selected>Select Department</option>
                        <option value="AIML">AIML</option>
                        <option value="AIDS">AIDS</option>
                        <option value="CSBS">CSBS</option>
                        <option value="CSE">CSE</option>
                        <option value="CIVIL">CIVIL</option>
                        <option value="ECE">ECE</option>
                        <option value="VLSI">EE (VLSI)</option>
                        <option value="EEE">EEE</option>
                        <option value="IT">IT</option>
                        <option value="MECH">MECH</option>
                    </select>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="tel" name="phone" placeholder="Phone Number" required>
                    <input type="text" name="github" placeholder="GitHub ID" required>
                    <button type="submit">Register</button>
                    <a href="#" class="toggle-link" onclick="toggleForms(event)">If Admin ? Admin</a>
                </form>

                <form class="form" id="loginForm">
                    <h2>Admin Login</h2>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                    <a href="#" class="toggle-link" onclick="toggleForms(event)">If User ? Register</a>
                </form>
            </div>
        </div>
    </div>


    <script>
    function toggleForms(e) {
        e.preventDefault();
        const registerForm = document.getElementById('registerForm');
        const loginForm = document.getElementById('loginForm');

        if (registerForm.classList.contains('active')) {
            registerForm.classList.remove('active');
            loginForm.classList.add('active');
        } else {
            registerForm.classList.add('active');
            loginForm.classList.remove('active');
        }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    // Particles configuration
    particlesJS('particles-js', {
        particles: {
            number: {
                value: 80,
                density: {
                    enable: true,
                    value_area: 800
                }
            },
            color: {
                value: '#3498db'
            },
            shape: {
                type: 'circle'
            },
            opacity: {
                value: 0.5,
                random: false,
                animation: {
                    enable: true,
                    speed: 1,
                    opacity_min: 0.1,
                    sync: false
                }
            },
            size: {
                value: 3,
                random: true,
                animation: {
                    enable: true,
                    speed: 2,
                    size_min: 0.1,
                    sync: false
                }
            },
            line_linked: {
                enable: true,
                distance: 150,
                color: '#3498db',
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 2,
                direction: 'none',
                random: false,
                straight: false,
                out_mode: 'out',
                bounce: false,
            }
        },
        interactivity: {
            detect_on: 'canvas',
            events: {
                onhover: {
                    enable: true,
                    mode: 'repulse'
                },
                onclick: {
                    enable: true,
                    mode: 'push'
                },
                resize: true
            }
        },
        retina_detect: true
    });

    $(document).on('submit', '#registerForm', function(e) {
        e.preventDefault();
        var Formdata = new FormData(this);
        Formdata.append("Add_newuser", true);
        $.ajax({
            url: "backend.php",
            method: "POST",
            data: Formdata,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Welcome to the Event',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $('#registerForm')[0].reset();
                        }
                    });
                } else if (res.status == 500) {
                    Swal.fire({
                        title: 'Error!',
                        text: 'Something went wrong! Please try again.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    $('#registerForm')[0].reset();
                }
            }
        });
    });

    $(document).on('submit', '#loginForm', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append("admin_login", true);
        console.log(formData);

        $.ajax({
            url: "backend.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                var res = jQuery.parseJSON(response);
                if (res.status == 200) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Login Successful',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = 'admin.php';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: res.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                    $('#loginForm')[0].reset();
                }
            }
        });
    });
    </script>
</body>

</html>
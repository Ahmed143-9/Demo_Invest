<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Directory - Age Lookup</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --success-color: #27ae60;
            --background-gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        body {
            background: var(--background-gradient);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            padding: 20px 0;
        }

        .main-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .header-section {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 40px;
            text-align: center;
            position: relative;
        }

        .header-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.05)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.03)"/></pattern></defs><rect width="100%" height="100%" fill="url(%23grain)"/></svg>');
            opacity: 0.3;
        }

        .header-section * {
            position: relative;
            z-index: 1;
        }

        .team-grid {
            background: #f8f9fa;
            padding: 30px;
            margin: 20px;
            border-radius: 15px;
            border-left: 5px solid var(--secondary-color);
        }

        .team-member {
            background: white;
            padding: 15px;
            margin: 8px 0;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            border-left: 4px solid transparent;
            transition: all 0.3s ease;
        }

        .team-member:hover {
            transform: translateX(5px);
            border-left-color: var(--secondary-color);
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }

        .search-section {
            background: white;
            padding: 40px;
            margin: 20px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .form-control {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 12px 20px;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
        }

        .btn-search {
            background: linear-gradient(135deg, var(--secondary-color), #2980b9);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.4);
            background: linear-gradient(135deg, #2980b9, var(--secondary-color));
        }

        .result-card {
            background: linear-gradient(135deg, #fff, #f8f9fa);
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            animation: slideIn 0.5s ease-out;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .result-header {
            background: linear-gradient(135deg, var(--success-color), #2ecc71);
            color: white;
            padding: 20px;
            text-align: center;
        }

        .result-body {
            padding: 30px;
            text-align: center;
        }

        .person-avatar {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--secondary-color), #3498db);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 30px;
            color: white;
            box-shadow: 0 5px 15px rgba(52, 152, 219, 0.3);
        }

        .profession-badge {
            display: inline-block;
            padding: 8px 20px;
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
            border-radius: 25px;
            font-size: 14px;
            font-weight: 600;
            margin-top: 10px;
        }

        .error-card {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            animation: slideIn 0.5s ease-out;
        }

        .age-display {
            font-size: 3rem;
            font-weight: 300;
            color: var(--secondary-color);
            margin: 10px 0;
        }

        .instruction-text {
            color: #6c757d;
            font-style: italic;
            margin-bottom: 20px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header-section {
                padding: 30px 20px;
            }
            
            .search-section,
            .team-grid {
                margin: 10px;
                padding: 20px;
            }
            
            .form-control {
                margin-bottom: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="main-container">
            <!-- Header Section -->
            <div class="header-section">
                <i class="fas fa-users fa-3x mb-3"></i>
                <h1 class="display-4 fw-bold mb-3">Team Directory</h1>
                <p class="lead mb-0">Discover team members by their age - A Laravel Blade Practice Project</p>
            </div>

            <!-- Team Members List -->
            <div class="team-grid">
                <h3 class="text-center mb-4">
                    <i class="fas fa-address-book text-primary me-2"></i>
                    Our Team Members
                </h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="team-member">
                            <strong>John Doe</strong> - Age: 30 <span class="badge bg-primary ms-2">Business Owner</span>
                        </div>
                        <div class="team-member">
                            <strong>Jane Smith</strong> - Age: 23 <span class="badge bg-success ms-2">Employee</span>
                        </div>
                        <div class="team-member">
                            <strong>Kawser Ahmed</strong> - Age: 29 <span class="badge bg-warning ms-2">Entrepreneur</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="team-member">
                            <strong>Asaduzzaman Asad</strong> - Age: 28 <span class="badge bg-info ms-2">Software Engineer</span>
                        </div>
                        <div class="team-member">
                            <strong>Sahid Hasan</strong> - Age: 27 <span class="badge bg-info ms-2">Software Engineer</span>
                        </div>
                        <div class="team-member">
                            <strong>Debdullal Baida Ovi</strong> - Age: 26 <span class="badge bg-dark ms-2">Senior Software Engineer</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Section -->
            <div class="search-section">
                <h3 class="text-center mb-4">
                    <i class="fas fa-search text-primary me-2"></i>
                    Find Team Member by Age
                </h3>
                <p class="instruction-text text-center">Enter an age between 23-30 to find the corresponding team member</p>
                
                <form method="GET" action="" class="row g-3 justify-content-center">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text">
                                <i class="fas fa-calendar-alt"></i>
                            </span>
                            <input type="number" 
                                   name="inputAge" 
                                   id="inputAge" 
                                   class="form-control" 
                                   placeholder="Enter age (23-30)"
                                   min="1" 
                                   max="100"
                                   value="{{ request()->get('inputAge') }}"
                                   required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary btn-search w-100">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </div>
                </form>

                <!-- Results Section -->
                <div class="mt-4">
                    <!-- PHP Logic Simulation -->
                    <script>
                        // Simulating the PHP logic with JavaScript for demo
                        const urlParams = new URLSearchParams(window.location.search);
                        const inputAge = urlParams.get('inputAge');

                        if (inputAge) {
                            const teamMembers = {
                                30: { name: 'John Doe', profession: 'Business Owner', icon: 'fas fa-briefcase' },
                                23: { name: 'Jane Smith', profession: 'Employee', icon: 'fas fa-user-tie' },
                                29: { name: 'Kawser Ahmed', profession: 'Entrepreneur', icon: 'fas fa-rocket' },
                                28: { name: 'Asaduzzaman Asad', profession: 'Software Engineer', icon: 'fas fa-code' },
                                27: { name: 'Sahid Hasan', profession: 'Software Engineer', icon: 'fas fa-code' },
                                26: { name: 'Debdullal Baida Ovi', profession: 'Senior Software Engineer', icon: 'fas fa-laptop-code' }
                            };

                            const member = teamMembers[inputAge];
                            
                            if (member) {
                                document.write(`
                                    <div class="card result-card mt-4">
                                        <div class="result-header">
                                            <h4><i class="fas fa-check-circle me-2"></i>Member Found!</h4>
                                        </div>
                                        <div class="result-body">
                                            <div class="person-avatar">
                                                <i class="${member.icon}"></i>
                                            </div>
                                            <h2 class="fw-bold text-dark">${member.name}</h2>
                                            <div class="age-display">${inputAge}</div>
                                            <p class="text-muted">years old</p>
                                            <div class="profession-badge">
                                                <i class="${member.icon} me-2"></i>${member.profession}
                                            </div>
                                        </div>
                                    </div>
                                `);
                            } else {
                                document.write(`
                                    <div class="error-card mt-4">
                                        <i class="fas fa-user-slash fa-3x mb-3"></i>
                                        <h3><i class="fas fa-exclamation-triangle me-2"></i>No Member Found</h3>
                                        <p class="mb-0">No team member found with age ${inputAge}. Please try ages between 23-30.</p>
                                    </div>
                                `);
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JavaScript for enhanced interactions -->
    <script>
        // Add smooth scrolling to results
        document.querySelector('form').addEventListener('submit', function() {
            setTimeout(() => {
                const resultSection = document.querySelector('.result-card, .error-card');
                if (resultSection) {
                    resultSection.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'center' 
                    });
                }
            }, 100);
        });

        // Add input validation and user feedback
        const ageInput = document.getElementById('inputAge');
        ageInput.addEventListener('input', function() {
            const value = parseInt(this.value);
            const validAges = [23, 26, 27, 28, 29, 30];
            
            if (value && validAges.includes(value)) {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');
            } else if (value) {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');
            } else {
                this.classList.remove('is-valid', 'is-invalid');
            }
        });

        // Console log for testing (as per original requirement)
        console.log('Professional Team Directory - Laravel Blade Practice Page loaded successfully!');
    </script>
</body>
</html>
<?php
header('Content-Type: text/html; charset=utf-8');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Path of Exile 2 Character Builds</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-primary: #1a1a1a;
            --bg-secondary: #2a2a2a;
            --bg-tertiary: #3a3a3a;
            --text-primary: #d3d3d3;
            --text-secondary: #f0f0f0;
            --accent-color: #e2b007;
            --border-color: #3a3a3a;
        }

        body {
            background-color: var(--bg-primary);
            color: var(--text-primary);
            font-family: 'Raleway', sans-serif;
            min-height: 100vh;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Cinzel', serif;
        }

        .navbar {
            background-color: var(--bg-secondary);
            border-bottom: 1px solid var(--border-color);
        }

        .sidebar {
            background-color: var(--bg-secondary);
            height: calc(100vh - 56px);
            overflow-y: auto;
            border-right: 1px solid var(--border-color);
        }

        .sidebar .nav-link {
            color: var(--text-primary);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem;
            transition: all 0.3s ease;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: var(--bg-tertiary);
            color: var(--accent-color);
        }

        .class-icon {
            width: 40px;
            height: 40px;
            margin-right: 1rem;
            border-radius: 4px;
            background-color: var(--bg-tertiary);
            padding: 4px;
        }

        .build-card {
            background-color: var(--bg-secondary);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            height: 100%;
            color: var(--text-primary);
        }

        .build-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .build-card .card-header {
            background-color: var(--bg-tertiary);
            border-bottom: 1px solid var(--border-color);
            padding: 1rem;
        }

        .build-card .card-body {
            padding: 1.5rem;
        }

        .build-icon {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-bottom: 1px solid var(--border-color);
        }

        .class-header {
            background-color: var(--bg-secondary);
            border-radius: 8px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid var(--border-color);
        }

        .class-description {
            font-size: 1.1rem;
            line-height: 1.6;
            color: var(--text-secondary);
        }

        .build-stats {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            font-size: 1.2rem;
        }

        .build-stat {
            background-color: var(--bg-tertiary);
            padding: 0.5rem 1rem;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .build-stat i {
            color: #000000;
        }

        .bg-info {
            background-color: #D4AF37 !important;
            color: #000000 !important;
        }

        .btn-view-build {
            background-color: var(--accent-color);
            color: var(--bg-primary);
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-view-build:hover {
            background-color: #c69500;
            transform: translateY(-1px);
        }

        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 200px;
        }

        .error-message {
            background-color: var(--bg-secondary);
            border: 1px solid #dc3545;
            border-radius: 8px;
            padding: 2rem;
            text-align: center;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PoE 2 Builds</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Classes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Class List Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div id="classList" class="list-group">
                    <!-- Class list will be populated here -->
                </div>
            </div>

            <!-- Class Details -->
            <div class="col-md-9 col-lg-10 main-content">
                <div id="classDetails">
                    <!-- Class details will be shown here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Templates -->
    <template id="classItemTemplate">
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
            <img src="" alt="" class="class-icon me-3">
            <span class="class-name">HELLO</span>
        </a>
    </template>

    <template id="classDetailsTemplate">
        <div class="class-info mb-4">
            <div class="d-flex align-items-center mb-3">
                <img src="" alt="" class="class-icon-large me-3" style="width: 100%; height: auto; border: 1px solid #D4AF37;">
                <h1 class="class-name mb-0" style="display: none;"></h1>
            </div>
            <p class="class-description" style="display: none;"></p>
        </div>
        <div class="builds-container">
            <h2>Build Archive</h2>
            <div class="row" id="buildsList">
                <!-- Builds will be populated here -->
            </div>
        </div>
    </template>

    <template id="buildCardTemplate">
        <div class="col-md-6 mb-4">
            <div class="card build-card"  style="border: 1px solid #D4AF37;">
                <img src="" alt="" class="card-img-top build-image">
                <div class="card-body">
                    <h3 class="card-title build-name"></h3>
                    <p class="card-text build-description" style="display: none;"></p>
                    <div class="build-stats">
                        <span class="badge bg-primary me-2"></span>
                        <span class="badge bg-secondary me-2"></span>
                        <span class="badge bg-info"></span>
                        <span class="badge bg-danger"></span>
                        <span class="badge bg-warning"></span>
                        <span class="badge bg-success"></span>
                    </div>
                    <a href="build.php?buildKey=${buildKey}" class="btn btn-view-build mt-3" style="background-color: #D4AF37; color: #1a1a1a; width: 100%;">View Build</a>
                </div>
            </div>
        </div>
    </template>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Load class data from class_data.php
            $.ajax({
                url: 'api/class_data.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Store the data globally
                    window.classData = data;
                    // Populate the class list
                    populateClassList(data);
                    // Show the first class by default
                    const firstClass = Object.keys(data)[0];
                    showClassDetails(firstClass);
                },
                error: function(xhr, status, error) {
                    console.error('Error loading class data:', error);
                    $('#classDetails').html('<div class="alert alert-danger">Error loading class data. Please try again later.</div>');
                }
            });

            // Populate class list
            function populateClassList(data) {
                const classList = $('#classList');
                const template = document.getElementById('classItemTemplate');

                Object.entries(data).forEach(([key, classInfo]) => {
                    const clone = template.content.cloneNode(true);
                    const link = clone.querySelector('a');
                    const img = clone.querySelector('img');
                    const span = clone.querySelector('span');

                    link.dataset.classKey = key;
                    img.src = `img/${classInfo.icon}`;
                    img.alt = classInfo.name;
                    span.textContent = classInfo.name;

                    classList.append(clone);
                });
            }

            // Show class details
            function showClassDetails(classKey) {
                const classInfo = window.classData[classKey];
                const template = document.getElementById('classDetailsTemplate');
                const clone = template.content.cloneNode(true);

                // Set class info
                clone.querySelector('.class-icon-large').src = `img/${classInfo.icon}`;
                clone.querySelector('.class-icon-large').alt = classInfo.name;
                clone.querySelector('.class-name').textContent = classInfo.name;
                clone.querySelector('.class-description').textContent = classInfo.description;

                // Add builds
                const buildsList = clone.querySelector('#buildsList');
                const buildTemplate = document.getElementById('buildCardTemplate');

                Object.entries(classInfo.builds).forEach(([buildKey, build]) => {
                    const buildClone = buildTemplate.content.cloneNode(true);
                    
                    buildClone.querySelector('.build-image').src = `img/${build.icon}`;
                    buildClone.querySelector('.build-image').alt = build.name;
                    buildClone.querySelector('.build-name').textContent = build.name;
                    buildClone.querySelector('.build-description').textContent = build.description;
                    
                    const badges = buildClone.querySelectorAll('.badge');
                    badges[0].textContent = build.difficulty;
                    badges[1].textContent = build.playstyle;
                    badges[2].textContent = build.damage_type;
                    badges[3].textContent = build.estHP;
                    badges[4].textContent = build.estMana;
                    badges[5].textContent = build.estDPS;

                    buildsList.appendChild(buildClone);
                });

                // Update the display
                $('#classDetails').empty().append(clone);
            }

            // Handle class selection
            $(document).on('click', '#classList a', function(e) {
                e.preventDefault();
                const classKey = $(this).data('classKey');
                $('#classList a').removeClass('active');
                $(this).addClass('active');
                showClassDetails(classKey);
            });

            // Handle image errors
            $(document).on('error', 'img', function() {
                $(this).attr('src', 'img/placeholder.webp');
            });
        });
    </script>
</body>
</html>
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
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400..900&family=Raleway:wght@400..900&display=swap" rel="stylesheet">
    <style>
        /* Your existing CSS styles here */
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
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">PoE 2 Builds</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
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

            <!-- Build Details -->
            <div class="col-md-9 col-lg-10 main-content">
                <p>*Please Note: This site is still under active development and is not yet complete. Some classes and builds may not be available yet.</p>
                <p>*If you have a build you would like to see featured, <a href="https://discord.gg/Skkwaj7e" target="_blank">join me on Discord</a> and post it in the #builds channel.</p>
                
                <div id="buildDetails">
                <img src="" alt="" class="class-icon-large me-3" style="width: 100%; height: 522px; border: 1px solid #D4AF37;">
                    <!-- Build details will be shown here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Templates -->
    <template id="classItemTemplate">
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center">
        <img src="" alt="" class="class-icon me-3" style="border: 1px solid #D4AF37;">
            <span class="class-name"></span>
        </a>
    </template>

   
    

    <template id="buildDetailsTemplate">
        <div class="build-details">
            
            <h2 class="build-name mb-4"></h2>
            <div class="overview mb-4">
                <h3>Overview</h3>
                
                <p class="overview-text"></p>
            </div>
            
            <div class="skill-gems mb-4">
                <h3>Skill Gems</h3>
                <h5>Early Game Gems</h5>
                <ul class="skill-gems-list"></ul>
                <h5>Mid Game Gems</h5>
                <ul class="skill-gems-list"></ul>
                <h5>Late Game Gems</h5>
                <ul class="skill-gems-list"></ul>
            </div>
            <div class="gear mb-4">
                <h3>Gear</h3>
                <ul class="gear-list"></ul>
                <h5>Early Game Gear</h5>
                <ul class="gear-list"></ul>
                <h5>Mid Game Gear</h5>
                <ul class="gear-list"></ul>
                <h5>Late Game Gear</h5>
                <ul class="gear-list"></ul>
            </div>
            <div class="passives mb-4">
                <h3>Passives</h3>
                <p class="passives-text"></p>
            </div>
        </div>
    </template>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            let classData = {};

            // Load class data
            $.ajax({
                url: 'api/class_data.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    classData = data;
                    populateClassList(data);
                    displayBuilds('warrior');
                },
                error: function(xhr, status, error) {
                    console.error('Error loading class data:', error);
                    $('#buildDetails').html('<div class="error-message">Error loading class data. Please try again later.</div>');
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

            

            // Handle class selection
            $(document).on('click', '#classList a', function(e) {
                e.preventDefault();
                const classKey = $(this).data('classKey');
                $('#classList a').removeClass('active');
                $(this).addClass('active');
                displayBuilds(classKey);
            });

            
            // Display builds for selected class
            function displayBuilds(classKey) {
                const builds = classData[classKey].builds;
                const classIcon = classData[classKey].icon;
                let html = '<img src="img/' + classIcon + '" alt="' + classData[classKey].name + '" class="class-icon-large me-5 mb-5" style="width: 100%; height: auto; border: 1px solid #D4AF37; border-radius: 8px;">';
                
                html += '<div class="row">';
                
                Object.entries(builds).forEach(([buildKey, build]) => {
                    html += `
                        <div class="col-md-6 mb-4">
                            <div class="build-card" style="border-radius: 8px; border-bottom: 1px solid #b22222; background-image: url(svg/poe2logo1.svg); background-size: 200px; background-position: bottom right; background-repeat: no-repeat;">
                                <img src="img/${build.icon}" alt="${build.name}" class="build-icon" style="border-top: 1px solid #D4AF37; width: 100%; height: 400px; object-fit: cover; border-radius: 8px;">
                                <div class="card-body">
                                    <h3 class="card-title">${build.name}</h3>
                                    <p>${build.description}</p>
                                    <div class="build-stats">
                                        <span class="badge bg-primary">${build.difficulty}</span>
                                        <span class="badge bg-secondary">${build.playstyle}</span>
                                        <span class="badge bg-info">${build.damage_type}</span>
                                    </div>
                                    <button class="btn btn-view-build mt-3" data-class="${classKey}" data-build="${buildKey}">View Build</button>
                                </div>
                            </div>
                        </div>
                    `;
                });
                
                html += '</div>';
                $('#buildDetails').html(html);
            }

            // Handle "View Build" button click
            $(document).on('click', '.btn-view-build', function() {
                const classKey = $(this).data('class');
                const buildKey = $(this).data('build');
                console.log('Class Key:', classKey, 'Build Key:', buildKey); // Log keys for debugging
                loadBuildDetails(classKey, buildKey);
            });

            // Load build details
            function loadBuildDetails(classKey, buildKey) {
                $.ajax({
                    url: 'api/get_builds1.php',
                    method: 'GET',
                    data: { class: classKey, build: buildKey },
                    dataType: 'json',
                    success: function(data) {
                        displayBuildDetails(data);
                    },
                    error: function(xhr, status, error) {
                        console.error('Error loading build details:', error);
                        $('#buildDetails').html('<div class="error-message">Error loading build details. Please try again later.</div>');
                    }
                });
            }

            // Display build details
            function displayBuildDetails(buildData) {
                const template = document.getElementById('buildDetailsTemplate');
                const clone = template.content.cloneNode(true);

                const buildNameElement = clone.querySelector('.build-name');
                const overviewTextElement = clone.querySelector('.overview-text');
                const levelingTextElement = clone.querySelector('.leveling-text');

                if (buildNameElement) {
                    buildNameElement.textContent = buildData.name;
                } else {
                    console.error('Build name element not found');
                }

                if (overviewTextElement) {
                    overviewTextElement.textContent = buildData.overview;
                } else {
                    console.error('Overview text element not found');
                }

                if (levelingTextElement) {
                    levelingTextElement.textContent = buildData.leveling_guide;
                } else {
                    console.error('Leveling text element not found');
                }

                const skillGemsList = clone.querySelector('.skill-gems-list');
                buildData.skill_gems.forEach(gem => {
                    const li = document.createElement('li');
                    li.textContent = gem;
                    skillGemsList.appendChild(li);
                });

                const gearList = clone.querySelector('.gear-list');
                buildData.gear.forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item;
                    gearList.appendChild(li);
                });

                clone.querySelector('.passives-text').textContent = buildData.passives;

                $('#buildDetails').empty().append(clone);
            }

            // Handle image errors
            $(document).on('error', 'img', function() {
                $(this).attr('src', 'img/placeholder.webp');
            });
        });
    </script>
</body>
</html>
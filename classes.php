<?php
// Simulated API call function
function getClassData() {
    // In a real-world scenario, this would be an actual API call
    return json_encode([
        'barbarian' => [
            'name' => 'Barbarian',
            'description' => 'A fierce warrior who relies on brute strength and raw power.',
            'ascendancies' => [
                'Berserker' => [
                    'description' => 'Focuses on unleashing devastating attacks at the cost of defense.',
                    'builds' => ['Cyclone Berserker', 'Blitz Charge Berserker']
                ],
                'Juggernaut' => [
                    'description' => 'Emphasizes durability and sustained damage output.',
                    'builds' => ['Earthquake Juggernaut', 'Molten Strike Juggernaut']
                ]
            ]
        ],
        'sorcerer' => [
            'name' => 'Sorcerer',
            'description' => 'A master of the arcane, wielding devastating elemental spells.',
            'ascendancies' => [
                'Elementalist' => [
                    'description' => 'Harnesses the power of elements for destructive magic.',
                    'builds' => ['Arc Elementalist', 'Golem Elementalist']
                ],
                'Occultist' => [
                    'description' => 'Specializes in curses and chaos damage.',
                    'builds' => ['Vortex Occultist', 'Bane Occultist']
                ]
            ]
        ]
        // Add more classes here...
    ]);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classes - Path of Exile 2 Character Builds</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a1a;
            color: #d3d3d3;
            font-family: 'Cinzel', serif;
        }
        .navbar {
            background-color: #2a2a2a;
        }
        .navbar-brand, .nav-link {
            color: #d3d3d3 !important;
        }
        .class-nav {
            background-color: #2a2a2a;
            height: calc(100vh - 56px);
            overflow-y: auto;
        }
        .class-nav .nav-link {
            color: #d3d3d3;
            border-bottom: 1px solid #3a3a3a;
            padding: 10px 15px;
        }
        .class-nav .nav-link:hover, .class-nav .nav-link.active {
            background-color: #3a3a3a;
        }
        .class-content {
            padding: 20px;
        }
        .class-icon {
            width: 30px;
            height: 30px;
            margin-right: 10px;
        }
        .ascendancy-card {
            background-color: #2a2a2a;
            border: 1px solid #3a3a3a;
            margin-bottom: 20px;
            color: #f0f0f0;
        }
        .ascendancy-card .card-header {
            background-color: #3a3a3a;
            color: #f0f0f0;
            font-weight: bold;
        }
        .ascendancy-icon {
            width: 100%;
            height: auto;
            filter: sepia(100%);
        }
        .build-list {
            list-style-type: none;
            padding-left: 0;
            color: #f0f0f0;
        }
        .build-list li:before {
            content: "• ";
            color: #f0f0f0;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">PoE 2 Builds</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="classes.php">Classes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php#about">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-3 col-lg-2 d-md-block class-nav">
                <div class="position-sticky">
                    <ul class="nav flex-column" id="classNav">
                        <!-- Class navigation will be populated dynamically -->
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 class-content">
                <h2 id="class-title">Select a Class</h2>
                <div id="class-description"></div>
                <div id="ascendancies-container"></div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            let classData;

            // Fetch class data from the API
            $.ajax({
                url: 'api/get_class_data.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    classData = data;
                    populateClassNav(data);
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching class data:", error);
                    $('#class-description').html('<p class="text-danger">Error loading class data. Please try again later.</p>');
                }
            });

            function populateClassNav(data) {
                let navHtml = '';
                for (let className in data) {
                    navHtml += `
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-class="${className}" style="display: flex; align-items: center; font-size: 1.2rem;">
                                <img src="img/${className}.webp" alt="${data[className].name} icon" class="class-icon">
                                ${data[className].name}
                            </a>
                        </li>
                    `;
                }
                $('#classNav').html(navHtml);
            }

            $(document).on('click', '.class-nav .nav-link', function(e) {
                e.preventDefault();
                $('.class-nav .nav-link').removeClass('active');
                $(this).addClass('active');
                
                var className = $(this).data('class');
                displayClassInfo(className);
            });

            function displayClassInfo(className) {
                const classInfo = classData[className];
                $('#class-title').text(classInfo.name);
                $('#class-description').html(`<p>${classInfo.description}</p>`);

                let ascendanciesHtml = '<h3 class="mt-4">Ascendancies</h3>';
                for (let ascendancy in classInfo.ascendancies) {
                    const ascendancyInfo = classInfo.ascendancies[ascendancy];
                    ascendanciesHtml += `
                        <div class="card ascendancy-card mt-3">
                            <div class="card-header">${ascendancy}</div>
                            <div class="card-body">
                                <img src="img/${ascendancyInfo.icon}" alt="${ascendancy} icon" class="ascendancy-icon">
                                <p>${ascendancyInfo.description}</p>
                                <h5>Popular Builds:</h5>
                                <ul class="build-list">
                                    ${ascendancyInfo.builds.map(build => `<li>${build}</li>`).join('')}
                                </ul>
                            </div>
                        </div>
                    `;
                }
                $('#ascendancies-container').html(ascendanciesHtml);
            }
        });
    </script>
</body>
</html>
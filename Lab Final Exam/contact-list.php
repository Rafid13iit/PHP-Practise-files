<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Contact List</h1>
        <nav>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="personal-info.html">About Me</a>
                    <ul>
                        <li><a href="personal-info.html">Personal Info</a></li>
                        <li><a href="education-info.html">Educational Info</a></li>
                        <li><a href="work-info.html">Work Info</a></li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact Me</a></li>
                <li><a href="admin.html">Admin</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Contact List</h2>
            <table id="contactTable">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php include 'fetch-contact.php'; ?>
                </tbody>
            </table>
            <p><a href="index.html">Logout</a></p>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Rafid's Portfolio. All rights reserved</p>
    </footer>
</body>
</html>

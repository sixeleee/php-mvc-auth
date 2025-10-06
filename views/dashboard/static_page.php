<?php
session_start();
if (!isset($_SESSION)) {
    $_SESSION = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
</head>
<body>
    <style>
        .mood {
            display: inline-block;
        }
    </style>
        <h1>About: LEE ALEXIS "LEE" D. MERU</h1>
            <p>I'm Lee Alexis and I prepared to be called "Lee". This made me feel unique and extraordinary.</p>
                
            <div class="class">
                <h2>MY CLASSES THIS 1st SEMESTER</h2>
                    <ul>
                        <li>SIA102.System Integration and Architecture 2 (Advance SIA)</li>
                        <li>WS101.Web Systemsand Technologies 1</li>
                        <li>IAS101.Information Assurance Security 1</li>
                        <li>IPT102.Integrative Programming Technologies 2</li>
                        <li>NET102.Networking 2 (Advance Networking)</li>
                        <li>PF301.Event-Driven Programming</li>
                        <li>SPT1.Specialization 1- Computer Programming 3</li>
                        <li>SPT2.Fundamentals of Mobile Programming 3</li>
                        <li>Gender and Society</li>
                    </ul>
            </div>

            <div class = "shows">
                <h2>MY FAVORITE TV SHOWS</h2>
                    <ul>
                        <li>Reign</li>
                        <li>Game of Thrones</li>
                        <li>The Witcher</li>
                        <li>Stranger Things</li>
                        <li>Scandal</li>
                        <li>Young Sheldon</li>
                        <li>Frozen</li>
                        <li>How To Train Your Dragon</li>
                    </ul>
            </div>

            <div class="moods ">
                <h2>MY MOODS</h2>
                    <p>
                        <img src="/php-mvc-auth/images/laughing.png" alt="Happy" class="mood"> Happy
                        <img src="/php-mvc-auth/images/sad.png" alt="Sad" class="mood"> Sad
                    </p>
            </div>

            <div class="facts">
                <h2>FACTS ABOUT MY FRIENDS</h2>
                    <ul>
                        <li>
                            Nicole Pengco- Secret Millionaire
                        </li>
                        <li>Emmanuel Felipe- CEO
                        </li>
                    </ul>
            </div>

</body>
</html>
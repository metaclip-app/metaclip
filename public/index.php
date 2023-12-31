<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-self: center;
            margin: 0 auto;
            width: 80%;
        }

        header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            border-bottom: 2px solid lightgray;
            width: 100%;
        }

        header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 700;
        }

        #open-app {
            padding: 10px;
            border-radius: 10px;
            background: lightgray;
            text-decoration: none;
            color: black;
            width: 10%;
            border: none;
            font-weight: 600;
            text-align: center;
            cursor: pointer;
        }

        .hero {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 12%;
            margin-bottom: 5%;
        }

        .hero-text {
            padding-top: 5%;
            padding-bottom: 5%;
            display: flex;
            flex-direction: column;
            gap: -500;
        }

        .hero-text h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 70px;
            font-weight: 900;
        }

        #hero-image {
            width: 100%;
            border-radius: 20px;
        }

        .sub-content {
            display: flex;
            flex-direction: column;
            margin-bottom: 5%;
        }

        .sub-content h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 40px;
            font-weight: 700;
            width: 50%;
        }

        .sub-content p {
            font-family: sans-serif;
            font-size: large;
            width: 40%;
        }

        footer {
            padding: 10px;
            background: #161616;
            width: 100%;
            text-align: center;
        }

        footer p {
            color: white;
        }
    </style>
    <title>Metaclip - A canvas for your mind</title>
</head>
<body>
    <header>
        <h1>Metaclip</h1>
        <a href="https://github.com/metaclip-app/metaclip">
            <svg width="2rem" height="2rem" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                <path fill="#000" d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59c.4.07.55-.17.55-.38c0-.19-.01-.82-.01-1.49c-2.01.37-2.53-.49-2.69-.94c-.09-.23-.48-.94-.82-1.13c-.28-.15-.68-.52-.01-.53c.63-.01 1.08.58 1.23.82c.72 1.21 1.87.87 2.33.66c.07-.52.28-.87.51-1.07c-1.78-.2-3.64-.89-3.64-3.95c0-.87.31-1.59.82-2.15c-.08-.2-.36-1.02.08-2.12c0 0 .67-.21 2.2.82c.64-.18 1.32-.27 2-.27c.68 0 1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82c.44 1.1.16 1.92.08 2.12c.51.56.82 1.27.82 2.15c0 3.07-1.87 3.75-3.65 3.95c.29.25.54.73.54 1.48c0 1.07-.01 1.93-.01 2.2c0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
            </svg>
        </a>
    </header>
    <div class="container">
        <main>
            <div class="hero">
                <div class="hero-text">
                    <h1>The canvas <br>for your <br>mind.</h1>
                    <a href="https://moaform.com/q/zWCCky" id="open-app">Coming soon</a>
                </div>
                <img src="https://raw.githubusercontent.com/metaclip-app/metaclip/main/public/img/landing.png" alt="Description of the image" id="hero-image"/>
            </div>
            <div class="sub-content">
                <h1>From ADHD software enginners to you.</h1>
                <p>Metaclip is a platform made to organize your virtual archives. It was made mainly by @luanderfarias, a software enginner that knows how hard it may be to organize yourself.</p>
            </div>
        </main>
    </div>
    <footer>
        <p>Luander de faria - 2023</p>
    </footer>
</body>
</html>

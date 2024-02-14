<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="ico/logo.png">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            text-align: left;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .content {
            max-width: 50%;
            padding: 20px;
            text-align: center; /* Center the text content */
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #428bca;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        a:hover {
            background-color: #3071a9;
        }

        .error-image {
            max-width: 100%;
            height: auto;
            margin-top: 20px;
        }

                /* Media Query for Responsive Design */
                @media screen and (max-width: 600px) {
            .container {
                flex-direction: column-reverse; /* Change to a column layout on smaller screens */
                align-items: center;
            }

            .content {
                max-width: 100%;
            }

            .error-image {
    max-width: 79%;
    height: auto;
    margin-top: 20px;
}
        }
    </style>
    <title>Error 404</title>
</head>
<body>
    <div class="container">
        <img src="homeero/policema.png" alt="Error 404 Image" class="error-image">
        <div class="content">
            <h1>404</h1>
            <p>Lo sentimos, la página que estás buscando no existe.</p>
            <p>Mejor regresa por donde veniste</p>
        </div>
    </div>
</body>
</html>

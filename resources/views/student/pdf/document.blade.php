<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        img {
            max-width: 100%; /* Make image responsive */
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Document</h1>
    <img src="{{ asset($imageUrl)  }}" alt="Document Image">
</body>
</html>

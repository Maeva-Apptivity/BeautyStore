<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home-BeautyStore</title>
</head>
    <header>
        <x-header/>
    </header>
<body>
    <x-carousel/>
    <x-category-list :categories="$categories" />
    <x-bestSellers/>
</body>
</html>
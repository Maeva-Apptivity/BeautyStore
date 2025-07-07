<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.boxicons.com/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Banner -->
    <div class="slider">
        <div class="list">
            <div class="item">
                <img src="/assets/sakura1.jpg">
            </div>
            <div class="item">
                <img src="/assets/fresh.jpg">
            </div>
            <div class="item">
                <img src="/assets/sakura2.jpg">
            </div>
            <div class="item">
                <img src="/assets/cosmetic.jpg">
            </div>
            <div class="item">
                <img src="/assets/sakura3.jpg">
            </div>
            <div class="item">
                <img src="/assets/clear.jpg">
            </div>
        </div>

        <!-- Button prev and next -->
        <div class="buttons">
            <button id="prev"><i class='bxr  bxs-chevron-left bx-lg'  ></i>  </button> 
            <button id="next"> <i class='bxr  bxs-chevron-right bx-lg'  ></i> </button> 
        </div>

        <!-- dots per pictures -->
        <ul class="dots">
            <li class="active"></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <script src="carousel.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home : Lost and Found V2</title>
    <link rel="icon" href="./favicon.svg">
</head>
<style>
        div {
    width: 100vw;
    height: 100vh;
    min-height: 350px;
    margin: 0;
    position: relative;
    background-color: #111;
    background-image: linear-gradient(to top, #222 5%, #111 6%, #111 7%, transparent 7%), linear-gradient(to bottom, #111 30%, transparent 30%), linear-gradient(to right, #222, #2e2e2e 5%, transparent 5%), linear-gradient(to right, transparent 6%, #222 6%, #2e2e2e 9%, transparent 9%), linear-gradient(to right, transparent 27%, #222 27%, #2e2e2e 34%, transparent 34%), linear-gradient(to right, transparent 51%, #222 51%, #2e2e2e 57%, transparent 57%), linear-gradient(to bottom, #111 35%, transparent 35%), linear-gradient(to right, transparent 42%, #222 42%, #2e2e2e 44%, transparent 44%), linear-gradient(to right, transparent 45%, #222 45%, #2e2e2e 47%, transparent 47%), linear-gradient(to right, transparent 48%, #222 48%, #2e2e2e 50%, transparent 50%), linear-gradient(to right, transparent 87%, #222 87%, #2e2e2e 91%, transparent 91%), linear-gradient(to bottom, #111 37.5%, transparent 37.5%), linear-gradient(to right, transparent 14%, #222 14%, #2e2e2e 20%, transparent 20%), linear-gradient(to bottom, #111 40%, transparent 40%), linear-gradient(to right, transparent 10%, #222 10%, #2e2e2e 13%, transparent 13%), linear-gradient(to right, transparent 21%, #222 21%, #1a1a1a 25%, transparent 25%), linear-gradient(to right, transparent 58%, #222 58%, #2e2e2e 64%, transparent 64%), linear-gradient(to right, transparent 92%, #222 92%, #2e2e2e 95%, transparent 95%), linear-gradient(to bottom, #111 48%, transparent 48%), linear-gradient(to right, transparent 96%, #222 96%, #1a1a1a 99%, transparent 99%), linear-gradient(to bottom, transparent 68.5%, transparent 76%, #111 76%, #111 77.5%, transparent 77.5%, transparent 86%, #111 86%, #111 87.5%, transparent 87.5%), linear-gradient(to right, transparent 35%, #222 35%, #2e2e2e 41%, transparent 41%), linear-gradient(to bottom, #111 68%, transparent 68%), linear-gradient(to right, transparent 78%, #333 78%, #333 80%, transparent 80%, transparent 82%, #333 82%, #333 83%, transparent 83%), linear-gradient(to right, transparent 66%, #222 66%, #2e2e2e 85%, transparent 85%);
    background-size: 300px 150px;
    background-position: center bottom;
    }
    div:before {
    content: '';
    width: 100%;
    height: 100%;
    position: absolute;
    left: 0;
    top: 0;
    background-color: #111;
    background-image: linear-gradient(to top, #d2b48c 5%, #111 6%, #111 7%, transparent 7%), linear-gradient(to bottom, #111 30%, transparent 30%), linear-gradient(to right, #b22222, #871a1a 5%, transparent 5%), linear-gradient(to right, transparent 6%, #ff6347 6%, #ff3814 9%, transparent 9%), linear-gradient(to right, transparent 27%, #556b2f 27%, #39481f 34%, transparent 34%), linear-gradient(to right, transparent 51%, #fa8072 51%, #f85441 57%, transparent 57%), linear-gradient(to bottom, #111 35%, transparent 35%), linear-gradient(to right, transparent 42%, #008080 42%, #004d4d 44%, transparent 44%), linear-gradient(to right, transparent 45%, #008080 45%, #004d4d 47%, transparent 47%), linear-gradient(to right, transparent 48%, #008080 48%, #004d4d 50%, transparent 50%), linear-gradient(to right, transparent 87%, #789 87%, #4f5d6a 91%, transparent 91%), linear-gradient(to bottom, #111 37.5%, transparent 37.5%), linear-gradient(to right, transparent 14%, #bdb76b 14%, #989244 20%, transparent 20%), linear-gradient(to bottom, #111 40%, transparent 40%), linear-gradient(to right, transparent 10%, #808000 10%, #4d4d00 13%, transparent 13%), linear-gradient(to right, transparent 21%, #8b4513 21%, #5e2f0d 25%, transparent 25%), linear-gradient(to right, transparent 58%, #8b4513 58%, #5e2f0d 64%, transparent 64%), linear-gradient(to right, transparent 92%, #2f4f4f 92%, #1c2f2f 95%, transparent 95%), linear-gradient(to bottom, #111 48%, transparent 48%), linear-gradient(to right, transparent 96%, #2f4f4f 96%, #1c2f2f 99%, transparent 99%), linear-gradient(to bottom, transparent 68.5%, transparent 76%, #111 76%, #111 77.5%, transparent 77.5%, transparent 86%, #111 86%, #111 87.5%, transparent 87.5%), linear-gradient(to right, transparent 35%, #cd5c5c 35%, #bc3a3a 41%, transparent 41%), linear-gradient(to bottom, #111 68%, transparent 68%), linear-gradient(to right, transparent 78%, #bc8f8f 78%, #bc8f8f 80%, transparent 80%, transparent 82%, #bc8f8f 82%, #bc8f8f 83%, transparent 83%), linear-gradient(to right, transparent 66%, #a52a2a 66%, #7c2020 85%, transparent 85%);
    background-size: 300px 150px;
    background-position: center bottom;
    clip-path: circle(150px at center center);
    animation: flashlight 5000ms infinite;
    }
    div:after {
    content: '';
    width: 25px;
    height: 10px;
    position: absolute;
    left: calc(50% + 59px);
    bottom: 100px;
    background-repeat: no-repeat;
    background-image: radial-gradient(circle, #fff 50%, transparent 50%), radial-gradient(circle, #fff 50%, transparent 50%);
    background-size: 10px 10px;
    background-position: left center, right center;
    animation: eyes 5000ms infinite;
    }
    @-moz-keyframes flashlight {
    0%, 9% {
        opacity: 0;
        clip-path: circle(150px at 45% 10%);
    }
    10%, 15%, 85% {
        opacity: 1;
    }
    50% {
        clip-path: circle(150px at 60% 20%);
    }
    54%, 100% {
        clip-path: circle(150px at 55% 92%);
    }
    88%, 100% {
        opacity: 0;
    }
    }
    @-webkit-keyframes flashlight {
    0%, 9% {
        opacity: 0;
        clip-path: circle(150px at 45% 10%);
    }
    10%, 15%, 85% {
        opacity: 1;
    }
    50% {
        clip-path: circle(150px at 60% 20%);
    }
    54%, 100% {
        clip-path: circle(150px at 55% 92%);
    }
    88%, 100% {
        opacity: 0;
    }
    }
    @-o-keyframes flashlight {
    0%, 9% {
        opacity: 0;
        clip-path: circle(150px at 45% 10%);
    }
    10%, 15%, 85% {
        opacity: 1;
    }
    50% {
        clip-path: circle(150px at 60% 20%);
    }
    54%, 100% {
        clip-path: circle(150px at 55% 92%);
    }
    88%, 100% {
        opacity: 0;
    }
    }
    @keyframes flashlight {
    0%, 9% {
        opacity: 0;
        clip-path: circle(150px at 45% 10%);
    }
    10%, 15%, 85% {
        opacity: 1;
    }
    50% {
        clip-path: circle(150px at 60% 20%);
    }
    54%, 100% {
        clip-path: circle(150px at 55% 92%);
    }
    88%, 100% {
        opacity: 0;
    }
    }
    @-moz-keyframes eyes {
    0%, 52% {
        opacity: 0;
    }
    53%, 87% {
        opacity: 1;
    }
    64% {
        transform: scaleY(1);
    }
    67% {
        transform: scaleY(0);
    }
    70% {
        transform: scaleY(1);
    }
    88%, 100% {
        opacity: 0;
    }
    }
    @-webkit-keyframes eyes {
    0%, 52% {
        opacity: 0;
    }
    53%, 87% {
        opacity: 1;
    }
    64% {
        transform: scaleY(1);
    }
    67% {
        transform: scaleY(0);
    }
    70% {
        transform: scaleY(1);
    }
    88%, 100% {
        opacity: 0;
    }
    }
    @-o-keyframes eyes {
    0%, 52% {
        opacity: 0;
    }
    53%, 87% {
        opacity: 1;
    }
    64% {
        transform: scaleY(1);
    }
    67% {
        transform: scaleY(0);
    }
    70% {
        transform: scaleY(1);
    }
    88%, 100% {
        opacity: 0;
    }
    }
    @keyframes eyes {
    0%, 52% {
        opacity: 0;
    }
    53%, 87% {
        opacity: 1;
    }
    64% {
        transform: scaleY(1);
    }
    67% {
        transform: scaleY(0);
    }
    70% {
        transform: scaleY(1);
    }
    88%, 100% {
        opacity: 0;
    }
    }

    body {
  font-family: 'Poppins', sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
    }
    .btn-shine {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 12px 48px;
    color: #fff;
    background: linear-gradient(to right, #4d4d4d 0, #fff 10%, #4d4d4d 20%);
    background-position: 0;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shine 2s infinite linear;
    animation-fill-mode: forwards;
    -webkit-text-size-adjust: none;
    font-weight: 600;
    font-size: 50px;
    text-decoration: none;
    white-space: nowrap;
    }
    @-moz-keyframes shine {
    0% {
        background-position: 0;
    }
    60% {
        background-position: 180px;
    }
    100% {
        background-position: 180px;
    }
    }
    @-webkit-keyframes shine {
    0% {
        background-position: 0;
    }
    60% {
        background-position: 180px;
    }
    100% {
        background-position: 180px;
    }
    }
    @-o-keyframes shine {
    0% {
        background-position: 0;
    }
    60% {
        background-position: 180px;
    }
    100% {
        background-position: 180px;
    }
    }
    @keyframes shine {
    0% {
        background-position: 0;
    }
    60% {
        background-position: 180px;
    }
    100% {
        background-position: 180px;
    }
    }
    </style>
<body>
    <div>
    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
    <script>
        var count = 0;
        function pageScroll() {
            if(count > 120){
            return;
        }
        window.scrollBy(0,35);
        scrolldelay = setTimeout(pageScroll,70);
        count++;
        console.log(count);
    }
        $(document).ready(function () {
            // Hide the div
            $("#div1").hide();
            $("#div2").hide();
            // Show the div after 5s
            $("#div1").delay(3000).fadeIn(100);
            $("#div2").delay(5000).fadeIn(100);
        });  
    </script>
    <div id="div1" style="display:none"><a href="./searchpeople.php" class="btn-shine" target="_blank">Finding Someone?</a></div>
    <div id="div2" style="display:none"><a href="./dashboard.php" class="btn-shine" target="_blank">Found Someone?</a></div>
    <span id="count"></span>
    <script>
        pageScroll();
    </script>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/61f9619fb9e4e21181bcf7a7/1fqr2an0a';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
</body>
</html>
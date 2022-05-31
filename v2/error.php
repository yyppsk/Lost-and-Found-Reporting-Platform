<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Report Error!</title>
    <link rel="icon" href="./favicon.svg">
</head>
<body>
  
    <style>
      body {
        background: linear-gradient(-45deg, #ee7752, #f02c2cba, #e546466b, #e73c7e);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

        @import url("https://fonts.googleapis.com/css?family=Lato:400,700");
html {
  display: grid;
  min-height: 100%;
}

body {
  display: grid;
  overflow: hidden;
  font-family: "Lato", sans-serif;
  text-transform: uppercase;
  text-align: center;
}

#container {
  position: relative;
  margin: auto;
  overflow: hidden;
  width: 700px;
  height: 250px;
}

h1 {
  font-size: 0.9em;
  font-weight: 100;
  letter-spacing: 3px;
  padding-top: 5px;
  color: #FCFCFC;
  padding-bottom: 5px;
  text-transform: uppercase;
}

.green {
  color: #4ec07d;
}

.red {
  color: #e96075;
}

.alert {
  font-weight: 700;
  letter-spacing: 5px;
}

p {
  margin-top: -5px;
  font-size: 0.5em;
  font-weight: 100;
  color: #5e5e5e;
  letter-spacing: 1px;
}

button, .dot {
  cursor: pointer;
}

#error-box {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  position: absolute;
  width: 35%;
  height: 100%;
  left: 33%;
  background: linear-gradient(to bottom left, #EF8D9C 40%, #FFC39E 100%);
  border-radius: 20px;
}

.dot {
  width: 8px;
  height: 8px;
  background: #FCFCFC;
  border-radius: 50%;
  position: absolute;
  top: 4%;
  right: 6%;
}
.dot:hover {
  background: #c9c9c9;
}

.two {
  right: 12%;
  opacity: 0.5;
}

.face {
  position: absolute;
  width: 22%;
  height: 22%;
  background: #FCFCFC;
  border-radius: 50%;
  border: 1px solid #777777;
  top: 21%;
  left: 37.5%;
  z-index: 2;
  animation: bounce 1s ease-in infinite;
}

.face2 {
  position: absolute;
  width: 22%;
  height: 22%;
  background: #FCFCFC;
  border-radius: 50%;
  border: 1px solid #777777;
  top: 21%;
  left: 37.5%;
  z-index: 2;
  animation: roll 3s ease-in-out infinite;
}

.eye {
  position: absolute;
  width: 5px;
  height: 5px;
  background: #777777;
  border-radius: 50%;
  top: 40%;
  left: 20%;
}

.right {
  left: 68%;
}

.mouth {
  position: absolute;
  top: 43%;
  left: 41%;
  width: 7px;
  height: 7px;
  border-radius: 50%;
}

.happy {
  border: 2px solid;
  border-color: transparent #777777 #777777 transparent;
  transform: rotate(45deg);
}

.sad {
  top: 49%;
  border: 2px solid;
  border-color: #777777 transparent transparent #777777;
  transform: rotate(45deg);
}

.shadow {
  position: absolute;
  width: 21%;
  height: 3%;
  opacity: 0.5;
  background: #777777;
  left: 40%;
  top: 43%;
  border-radius: 50%;
  z-index: 1;
}

.scale {
  animation: scale 1s ease-in infinite;
}

.move {
  animation: move 3s ease-in-out infinite;
}

.message {
  position: absolute;
  width: 100%;
  text-align: center;
  height: 40%;
  top: 47%;
}

.button-box {
  position: absolute;
  background: #FCFCFC;
  width: 50%;
  height: 15%;
  border-radius: 20px;
  top: 73%;
  left: 25%;
  outline: 0;
  border: none;
  box-shadow: 2px 2px 10px rgba(119, 119, 119, 0.5);
  transition: all 0.5s ease-in-out;
}
.button-box:hover {
  background: #efefef;
  transform: scale(1.05);
  transition: all 0.3s ease-in-out;
}

@keyframes bounce {
  50% {
    transform: translateY(-10px);
  }
}
@keyframes scale {
  50% {
    transform: scale(0.9);
  }
}
@keyframes roll {
  0% {
    transform: rotate(0deg);
    left: 25%;
  }
  50% {
    left: 60%;
    transform: rotate(168deg);
  }
  100% {
    transform: rotate(0deg);
    left: 25%;
  }
}
@keyframes move {
  0% {
    left: 25%;
  }
  50% {
    left: 60%;
  }
  100% {
    left: 25%;
  }
}
footer {
  position: absolute;
  bottom: 0;
  right: 0;
  text-align: center;
  font-size: 1em;
  text-transform: uppercase;
  padding: 10px;
  font-family: "Lato", sans-serif;
}
footer p {
  color: #EF8D9C;
  letter-spacing: 2px;
}
footer a {
  color: #B0DB7D;
  text-decoration: none;
}
footer a:hover {
  color: #FFC39E;
}
        </style>
<style>
    /* Footer */

    .footer {
    position:fixed;
    bottom:0;
    left:0;
    width:100%;
    height: 60px;
    background-color: rgba(218, 213, 240, 0.30);
    }
    .footer-text-left {
    padding: 15px;
    font-size: 25px;
    padding-left: 40px;
    float: left;
    word-spacing: 20px;
    }
    .footer:hover {
    background-color:rgba(218, 213, 240, 0.73);
    }
    a.menu:hover {
        font-size: 22px;
    }
    .fa-cog:hover {
    color: #ac7ed6;
    }
    .fa-home:hover {
    color: #ac7ed6;
    }
    </style>
<div id="container">
<div id="error-box">
    <div class="dot"></div>
    <div class="dot two"></div>
    <div class="face2">
      <div class="eye"></div>
      <div class="eye right"></div>
      <div class="mouth sad"></div>
    </div>
    <div class="shadow move"></div>
    <div class="message"><h1 class="alert">Error!</h1><p>oh no, something went wrong.</div>
    <a href="./dashboard.php"><button class="button-box"><h1 class="red">try again</h1></button></a>
  </div>
</div>
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
<div class="footer">
    <p class="footer-text-left">
    <a href="./home.php" class="menu"><i class="fa fa-home" aria-hidden="true" title="Home"></i></a>
    <a href="./searchpeople.php" class="menu"><i class="fa-solid fa-cog fa-spin aria-hidden="true" title="Person Finder"></i></a>
    <a href="./aboutpranjal.php" class="menu"><i class="fa fa-info-circle aria-hidden="true" title="About Pranjal" style="font-size:25x"></i></a>
    <a href="https://github.com/yyppsk/Lost-and-Found-Reporting-Platform" class="menu"><i class="fa-brands fa-github aria-hidden="true" title="Github Repo" style="font-size:28px"></i></a>   
  </p>
</div>
<footer>
  <p>Styled by <a href="https://www.linkedin.com/in/yyppsk/"> Pranjal</a> ♡
  <!--Beautiful CodePen by Julie https://codepen.io/juliepark -->
</footer>
</body>
</html>
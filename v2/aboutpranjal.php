<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Pranjal Pratap Singh</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Open+Sans:300" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"><link rel="stylesheet" href="./style.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
<link rel="icon" href="./favicon.svg">

</head>
<body>
    <style>
        body {
  margin: 0;
  background: #e6e6e6;
  font-family: 'Montserrat', cursive;
  font-weight: 400;
  color: rgba(0,0,0,0.8);
}
.profile-wrapper {
  display: block;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 800px;
  height: 680px;
  margin: 3em 0 0;
}
.profile-wrapper .profile-image {
  display: inline-block;
  width: 45%;
  height: 75%;
  position: absolute;
  top: 0;
  left: 0;
  border-radius: 1em;
  background-color: #dc143c;
  z-index: 1;
  overflow: hidden;
  -webkit-box-shadow: 1px 24px 55px -19px #dc143c;
  -moz-box-shadow: 1px 24px 55px -19px #dc143c;
  box-shadow: 1px 24px 55px -19px #dc143c;
}
.profile-wrapper .profile-image img {
  -webkit-filter: grayscale(100%);
  filter: grayscale(100%) contrast(120%);
  opacity: 0.3;
  display: block;
  width: 115%;
  height: 100%;
  position: absolute;
}
.profile-wrapper .close {
  display: block;
  width: 60px;
  height: 60px;
  position: absolute;
  top: 12.3%;
  right: 7%;
}
.profile-wrapper .close:before,
.profile-wrapper .close:after {
  display: block;
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 1px;
  background: #333;
}
.profile-wrapper .close:before {
  transform: rotate(-45deg);
}
.profile-wrapper .close:after {
  transform: rotate(45deg);
}
.profile-wrapper .profile-title {
  display: block;
  position: absolute;
  top: 8%;
  left: 34%;
  color: #333;
  z-index: 2;
  font-weight: 700;
  font-size: 4.5em;
  line-height: 1em;
  letter-spacing: -0.02em;
  margin: 0;
}
.profile-wrapper .profile-title span {
  display: block;
  margin-left: 28%;
}
.profile-wrapper .profile-info {
  display: block;
  position: absolute;
  top: 25%;
  right: 0;
  border-radius: 1em;
  width: 90%;
  height: 63%;
  background: #fff;
  -webkit-box-shadow: 0px 15px 50px -13px rgba(0,0,0,0.34);
  -moz-box-shadow: 0px 15px 50px -13px rgba(0,0,0,0.34);
  box-shadow: 0px 15px 50px -13px rgba(0,0,0,0.34);
}
.profile-wrapper .profile-info .content {
  display: inline-block;
  float: right;
  width: 47%;
  padding: 7%;
}
.profile-wrapper .profile-info .content h3 {
  text-transform: uppercase;
  color: #dc143c;
  letter-spacing: 0.2em;
}
.profile-wrapper .profile-info .content p {
  font-weight: 400;
  text-rendering: optimizeLegibility;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  line-height: 1.5em;
}
.profile-wrapper .profile-info .content p.link {
  font-size: 0.9em;
}
.profile-wrapper .profile-info .content p.link i {
  color: #dc143c;
  font-family: "FontAwesome";
  line-height: inherit;
  margin-right: 4%;
}
.profile-wrapper .profile-info .content p.link a:link,
.profile-wrapper .profile-info .content p.link a:visited {
  text-decoration: none;
  color: inherit;
  transition: color 0.25s;
}
.profile-wrapper .profile-info .content p.link a:link:hover,
.profile-wrapper .profile-info .content p.link a:visited:hover {
  color: #dc143c;
  transition: color 0.25s;
}
.profile-wrapper .profile-info .content p.link.one {
  margin-top: 3em;
}
.profile-wrapper .profile-info .stats {
  display: block;
  width: 90%;
  height: auto;
  position: absolute;
  bottom: 7.8%;
  right: 0;
}
.profile-wrapper .profile-info .stats .stat {
  display: inline-block;
  width: 33.33%;
  float: left;
  text-align: center;
  color: #dc143c;
  font-size: 0.8em;
  line-height: 2em;
}
.profile-wrapper .profile-info .stats .stat .number {
  font-size: 2em;
  font-weight: 300;
  font-family: "Open Sans", sans-serif;
  line-height: 100%;
  color: #333;
  vertical-align: top;
  margin-right: 3%;
}
.profile-wrapper .profile-info .arrow {
  display: block;
  position: absolute;
  bottom: 7.5%;
  left: 11px;
  width: 25px;
  height: 25px;
  transform: rotate(45deg);
}
.profile-wrapper .profile-info .arrow.one {
  border: 1px solid #333;
  border-left-color: transparent;
  border-bottom-color: transparent;
}
.profile-wrapper .profile-info .arrow.two {
  border: 1px solid #333;
  border-right-color: transparent;
  border-top-color: transparent;
  left: -40px;
}
        </style>
<!-- partial:index.partial.html -->
<div class="profile-wrapper">
	<div class="profile-image">
		<img src="http://nickylew.com/wp-content/uploads/2016/09/image.jpeg">
	</div>
	<div class="close"></div>
	<h2 class="profile-title">Pranjal <span>Singh</span></h2>
	<div class="profile-info">
		<div class="content">
			<h3>About</h3>
			<p>I'm a computer science engineer , Who loves technology, physics and space. I love to lead teams and learn with my experiences. I know areas like designing, management, programming, and psychological behaviors.</p>   
			<p class="link one"><i class="fa fa-link" aria-hidden="true"></i><a href="./socials.html" target="_blank">Social Page</a></p>
			<p class="link"><i class="fa fa-globe" aria-hidden="true"></i>Kanpur, Uttar Pradesh</p>
		</div>
		<div class="stats">
			<div class="stat">
				<span class="number">6</span> Projects
			</div>
			<div class="stat">
				<span class="number">23</span> Certifications
			</div>
			<div class="stat">
				<span class="number">3</span> Honours and Awards
			</div>
		</div>
		<div class="arrow one"></div>
		<div class="arrow two"></div>
	</div>
</div>
<!-- partial -->
  
</body>
</html>

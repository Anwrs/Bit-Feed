<!DOCTYPE html>
<html>
    <head>
        <title>BitFeed Home</title>
        <link rel="stylesheet" href="css/index.css">
    </head>
    <body>

        <h1>Home Page</h1>
        <img class="logo" src="images/logo/logo.png" alt="">
        <img class="wave" src="SVG/Wave.svg" alt="">
        <img class="cloud1" src="SVG/Cloud.svg" alt="">
        <img class="cloud2" src="SVG/Cloud.svg" alt="">
        <img class="cloud3" src="SVG/Cloud.svg" alt="">

        <nav class="navbar">
            <span class="Open-span">
                <a href="#" onclick="openSlideMenu()">
                    <svg width= "30" height= "30">
                        <path d="M0, 5 30,5" stroke="#fff" stroke-width="5"/>
                        <path d="M0, 14 30,14" stroke="#fff" stroke-width="5"/>
                        <path d="M0, 23 30,23" stroke="#fff" stroke-width="5"/>
                    </svg>
                </a>
            </span>
        </nav>

        <div id="side-menu" class="side-nav">
            <a href="#" class="btn-close" onclick="closeSlideMenu()">&times;</a>
            <li><a href="index.php">Home</li>
            <li><a href="login.php">Login</li>
            <li><a href="#">Personal goals</li>
            <li><a href="doelen.php">Other person goals</li>
        </div>

        <script type="text/javascript">
            function openSlideMenu() {
                document.getElementById("side-menu").style.width= "250px";
                document.getElementById("main").style.marginLeft= "250px";
            }

            function closeSlideMenu() {
                document.getElementById("side-menu").style.width= "0px";
                document.getElementById("main").style.marginLeft= "0px";
            }

        </script>

        <form class="box" method="post">
            <div class="info-Box">
                <h2>Information</h2>
                    <h3>How does this website work?</h3>
                    <h3>With BitFeed you can see your goals easy.</h3>
                    <h3>Everyone can see your goals and comment on them, so you will reach your goals easier and faster.</h3>
                    <h3>In order for you to use the BitFeed you need to make a account, simply done with clicking on the long in tab and make a account.</h3>
                    <h3>When you have your account you can start using BitFeed, just place a goal you want to reach in the tab personal goals.</h3>
                    <h3>If you want to see other people there goals you can click on the tab other person goals.</h3>
            </div>
            <div class="Updates-Box">
                <h2>Updates</h2>
                    <h3>In here you can see all the recent updates the website has.</h3>
            </div>
        </form>
    </body>
</html>

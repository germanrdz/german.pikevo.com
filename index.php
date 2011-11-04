<?
	include("pikevo.core.php");
?>

<html>
	<head>
        <title>Picture Evolution</title>
  
		<link href="master.css" rel="stylesheet" type="text/css" />		
		<script src="jquery.min.js" type="text/javascript" charset="utf-8" ></script>
		<script src="jquery.dom.js" type="text/javascript" charset="utf-8" ></script>
        <script src="application.js" type="text/javascript" charset="utf-8" ></script>
	</head>
	<body>
        <div id="content">
            
            <h1>My Picture Evolution</h1>
            <p>
                I've set a timer on my laptop, on my desktop machine and on my phone, to remind me every day to take a picture of myself at 3:00 pm, no matter what i am doing or where i am.
            </p>
            
            <p>
                I've coded & configured a system that allows me to upload this pictures and automatically create a slideshow of them with the hope of seing interesting facts about me changing, maybe the sadness in my eyes, or the happiness of my smile, the getting fatter or slimmer, how bad i look when hungover, etc.
            </p>

            <p>
                This is part of a little experiment i am running, if you came here by accident, move on and ignore this page.
            </p>

            <div class="wrapper">

                <div id="player">
                    <div id="frame">
                        <img src="loading.gif" height="427" />
                    </div>

                    <div id="images_list"><?= Action("getImagesList","images/"); ?></div>
                </div>
                
                <div id="controls">
                    <h3>Controls</h3>

                    <a href="javascript:Application.start()" />Start</a>
                    <a href="javascript:Application.resume()" />Resume</a>
                </div>
                
            </div> <!-- wrapper -->

            <div id="timeline">
            </div>

        </div> <!-- content -->

	</body>
</html>



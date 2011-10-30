<?
	include("pikevo.core.php");
?>

<html>
	<head>
        <title>
            Picture Evolution
        </title>
        
		<link href="master.css" rel="stylesheet" type="text/css" />		
		<script src="jquery.min.js" type="text/javascript" charset="utf-8" ></script>
		<script src="jquery.dom.js" type="text/javascript" charset="utf-8" ></script>
        <script src="application.js" type="text/javascript" charset="utf-8" ></script>
	</head>
	<body>

        <div id="sidebar">
            <ul>
                
            </ul>
        </div>
		
		<div id="player">
			<div id="frame">
                <img src="loading.gif" />
            </div>

			<div id="images_list"><?= Action("getImagesList","images/"); ?></div>
		</div>
		
	</body>
</html>



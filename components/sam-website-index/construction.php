<?
function construction()
{
?>    
<!DOCTYPE html>
<html>
<head>
    <title>shomaltech|construction</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://shomaltech.ir/style/font.css">
    <style type="text/css">
    body {
        padding: 0px;
        margin: 0px;
        background-color: #eaeaea;
    }
.construction{
    font: 16px iran, b yekan,tahoma;
    width: 70%;
    margin: 0px auto;
    direction: rtl;
    padding: 20px;
    text-align: center;
}
.construction-img{
    max-width:100%;
}
	</style>
</head>
<body style="text-align: center;">
<img class="construction-img" src="http://shomaltech.ir/construction.png">
<div class="construction">
        <?
        echo setting_rw( "webstatus_main_content" )['text'];
        ?>
</div>
</body>
</html>
<?
}
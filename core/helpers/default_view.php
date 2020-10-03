<?php
$ouput = '
<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>OW Home</title>
    <meta name="description" content="OW Home">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="'. base_url("/public/font-awesome/css/font-awesome.css") .'">
    <link rel="stylesheet" href="'. base_url("/public/dist/css/app.css") .'">
</head>

<body>
    <div id="ow_root"></div>';


/**
 * Adding the Console
 */

if (OW_System::getMode() == "DEV") {

    $ouput .= '
        <style type="text/css">
            .ow_bottom_bar{
                background-color: #1B5E1A;
                height: 40px;
                position: absolute;
                bottom: 0px;
                left: 0px;
                right: 0px;
                padding-left: 20px;
                line-height: 40px;
            }
            .ow_bottom_bar_link{
                width: 50px;
                display: inline-block;
                line-height: 30px;
                border: 1px solid white;
                height: 30px;
                cursor:pointer;
                text-align: center;
            }
            
            .ow_bottom_bar_link:hover{
                border: teal;
            }
            
            .ow_terminal_link{
                background-color: black;
                color: white;
                text-align: left;
            }
            
            .ow_editor_link{
                color: white;
                background-color: #1B5E1A;
            }
            
            .shadow {
              -webkit-box-shadow: 3px 3px 5px 6px rgba(0,0,0,0.4);  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
              -moz-box-shadow:    3px 3px 5px 6px rgba(0,0,0,0.4);  /* Firefox 3.5 - 3.6 */
              box-shadow:         3px 3px 5px 6px rgba(0,0,0,0.4);  /* Opera 10.5, IE 9, Firefox 4+, Chrome 6+, iOS 5 */
            }
            
            .ow_console_viewer{
                height: 400px;
                width: 50%;
                background-color: black;
                position: relative;
                bottom: 460px;
                left: -18px;
                transition: 0.5s;
                padding: 10px;
                color: white;
                overflow-y: auto;
            }
            
            .ow_console_viewer_invisible{
                display: none;
                transition: 0.5s;
            }
        </style>
        
        <div class="ow_bottom_bar">
            <div class="ow_bottom_bar_link ow_terminal_link"><span class="fa fa-terminal"></span></div>
            <div class="ow_bottom_bar_link ow_editor_link"><span class="fa fa-edit"></span></div>
            
            
            <div class="ow_console_viewer shadow ow_console_viewer_invisible">
                
            </div>
        </div>
    ';

}


$ouput .= '
</body>

<script type="text/javascript" src="'. base_url("/core/helpers/scripts/jquery.js") .'"></script>
<script type="text/javascript">
    let BASE_URL = \''. base_url() .'\';
</script>
<script type="text/javascript" src="'. base_url("/core/helpers/scripts/request.js") .'"></script>
<script type="text/javascript" src="'. base_url("/core/helpers/scripts/console.js") .'"></script>
<script type="text/javascript" src="'. base_url("/core/helpers/scripts/translations.js") .'"></script>
<script type="text/javascript" src="'. base_url("/public/dist/js/router.js") .'"></script>
</html>';

echo $ouput;
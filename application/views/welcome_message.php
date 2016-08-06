<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html >
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Welcome to CodeIgniter</title>
    <base href="<?php echo base_url();?>" />
    <link type="text/css" href="<?php echo base_url();?>/assets/menu/menu.css" rel="stylesheet" />
    <!-- set javascript base_url -->
    <Script type="text/javascript">
        <![CDATA[
        var base_url = '<?php echo base_url();?>';
        ]]>
    </Script>
    <Script type="text/javascript" src="<?php echo base_url();?>/assets/menu/jquery.js"></Script>
    <Script type="text/javascript" src="<?php echo base_url();?>/assets/menu/menu.js"></Script>
<style type="text/css">
body {
 /*background-color: #fff;*/
 margin: 40px;
 font-family: Lucida Grande, Verdana, Sans-serif;
 font-size: 14px;
 color: #4F5155;
}
div#menu { margin:20px auto; }
a {
 color: #003399;
 background-color: transparent;
 font-weight: normal;
}
h1 {
 color: #444;
 background-color: transparent;
 border-bottom: 1px solid #D0D0D0;
 font-size: 16px;
 font-weight: bold;
 margin: 24px 0 2px 0;
 padding: 5px 0 6px 0;
}
code {
 font-family: Monaco, Verdana, Sans-serif;
 font-size: 12px;
 background-color: #f9f9f9;
 border: 1px solid #D0D0D0;
 color: #002166;
 display: block;
 margin: 14px 0 14px 0;
 padding: 12px 10px 12px 10px;
}
</style>
</head>
<body>
<h1>Welcome to CodeIgniter!</h1>
<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>
<p>If you would like to edit this page you will find it located at:</p>
<code>system/application/views/welcome_message.php</code>
<p>The corresponding controller for this page is found at:</p>
<code>system/application/controllers/welcome.php</code>
<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
<?php
    //echo base_url();
    echo $this->dynamic_menu->build_menu();
?>
<br />
<p><br />Page rendered in {elapsed_time} seconds</p>
<p>Created By <a href="https://github.com/InsiteFX">InsiteFX</a></p>
<p><br /><a href="http://apycom.com/">jQuery Menus by Apycom</a></p>
</body>
</html>  
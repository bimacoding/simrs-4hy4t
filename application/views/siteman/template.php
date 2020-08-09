<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?=$title?></title>
    <!-- BOOTSTRAP STYLES-->
    <link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="<?=base_url()?>assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="<?=base_url()?>assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!-- TABLE STYLES-->
    <link href="<?=base_url()?>assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <script src="<?=base_url()?>assets/js/jquery.js"></script>
    <style type="text/css">
        .thumbnail {
    border: 0;
}

#webcodecam-canvas, #scanned-img {
    background-color: #2d2d2d;
}

#camera-select {
    display: inline-block;
    width: auto;
}

.btn {
    margin-bottom: 2px;
}

.form-control {
    height: 32px;
}

.h4, h4 {
    width: auto;
    float: left;
    font-size: 20px;
    line-height: 1.1;
    margin-top: 5px;
    margin-bottom: 5px;
}

.controls {
    float: right;
    display: inline-block;
}

.well {
    position: relative;
    display: inline-block;
}

.panel-heading {
    display: inline-block;
    width: 100%;
}

.container {
    width: 100%
}

pre {
    border: 0;
    border-radius: 0;
    background-color: #333;
    margin: 0;
    line-height: 125%;
    color: whitesmoke;
}

button {
    outline: none !important;
}

.table-bordered {
    color: #777;
    cursor: default;
}

.table-bordered a:hover {
    text-decoration: none;
}

.table-bordered th a {
    float: right;
    line-height: 3.49;
}

.table-bordered td a {
    float: left;
}

.table-bordered th img {
    float: left;
}

.table-bordered th, .table-bordered td {
    vertical-align: middle !important;
}

.scanner-laser {
    position: absolute;
    margin: 40px;
    height: 30px;
    width: 30px;
    opacity: 0.5;
}

.laser-leftTop {
    top: 0;
    left: 0;
    border-top: solid red 5px;
    border-left: solid red 5px;
}

.laser-leftBottom {
    bottom: 0;
    left: 0;
    border-bottom: solid red 5px;
    border-left: solid red 5px;
}

.laser-rightTop {
    top: 0;
    right: 0;
    border-top: solid red 5px;
    border-right: solid red 5px;
}

.laser-rightBottom {
    bottom: 0;
    right: 0;
    border-bottom: solid red 5px;
    border-right: solid red 5px;
    JS
}

#webcodecam-canvas {
    background-color: #272822;
}
#scanned-QR{
    word-break: break-word;
}
    </style>
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <?php include 'header.php'; ?>
        </nav>   
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <?php include 'side-nav.php'; ?>
        </nav>  
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <?php echo $contents; ?>      
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <!-- <script src="assets/js/jquery-1.10.2.js"></script> -->
    
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="<?=base_url()?>assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="<?=base_url()?>assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="<?=base_url()?>assets/js/morris/morris.js"></script>
    <!-- DATA TABLE SCRIPTS -->
    <script src="<?=base_url()?>assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="<?=base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
      <!-- CUSTOM SCRIPTS -->
    <script src="<?=base_url()?>assets/js/custom.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/filereader.js"></script>
    <!-- Using jquery version: -->
    <!--
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/qrcodelib.js"></script>
        <script type="text/javascript" src="js/webcodecamjquery.js"></script>
        <script type="text/javascript" src="js/mainjquery.js"></script>
    -->
    <script type="text/javascript" src="<?=base_url()?>assets/js/qrcodelib.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/webcodecamjs.js"></script>
    <script type="text/javascript" src="<?=base_url()?>assets/js/main.js"></script>
   
</body>
</html>

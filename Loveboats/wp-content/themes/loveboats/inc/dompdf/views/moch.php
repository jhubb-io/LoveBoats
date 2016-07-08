<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Mockup</title>
    <style type="text/css">
        .wrap {
            width: 100%;
            height: auto;
        }
        .wrap .row-one {
            width: 100%;
            height: 173px;
            position: relative;
            display: block;
            background: red;
            margin: 0;
        }
        .wrap .row-two {
            width: 100%;
            height: 532px;
            display: block;
            background: blue;
            margin: 0;
        }
        .wrap .row-three {
            width: 100%;
            height: 307px;
            background: green;
        }
        .alignleft {
            float: left;
            left: 0;
        }
        .alignright {
            float: right;
            text-align: right;
            right: 0;
        }
        .row-one span {
            position: absolute;
            font-size: 26px;
            color: #0079c0;
        }
        .row-one p {
            position: relative;
            float: right;
            font-size: 26px;
            width: 300px;
            text-align: right;
        }
        .row-one em {
            font-size: 128px;
            font-style: initial;
            color: #0079c0;
        }
        .bottom {
            bottom: 0;
        }
        .row-two img {
            height: 100%;
        }
    </style>
</head>
<body>
    <div class="wrap">
        
        <div class="row-one">
            <span class="alignleft">N 144</span>
            <span class="alignright">May 2016</span>
            
            <em>a propos</em>
            <p>The Koff<br />Peacebuilding<br />Magazine</p>
        </div>
       
        <div class="row-two">
            <?php echo $_SERVER["DOCUMENT_ROOT"]; ?>/dompdf/views/images
            <img src="images/pdfimage.jpg" alt="" />
        </div>
        
        <div class="row-three">
            ho
            
        </div>
        
    </div>
</body>
</html>
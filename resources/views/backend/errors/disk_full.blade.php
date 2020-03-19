<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Disk Full Error</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:200,400,700" rel="stylesheet">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ URL::asset('assets/error_page/css/style.css') }}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    <style type="text/css">
        .notfound .notfound-404 p {
          font-family: 'Montserrat', sans-serif;
          font-size: 15px;
          font-weight: 400;
          text-transform: uppercase;
          color: #211b19;
          background: #fff;
          padding: 6px 1px;
          /*margin: auto;*/
          margin-bottom: -50px;
          display: inline-block;
          position: absolute;
          bottom: 0px;
          left: 0;
          right: 0;
        }

        .notfound .notfound-404 h2 {
          font-family: 'Montserrat', sans-serif;
          font-size: 28px;
          font-weight: 400;
          text-transform: uppercase;
          color: #211b19;
          background: #fff;
          padding: 5px 5px;
          margin: auto;
          display: inline-block;
          position: absolute;
          bottom: 0px;
          left: 0;
          right: 0;
        }

        @media only screen and (max-width: 480px) {
          .notfound .notfound-404 {
            height: 148px;
            margin: 0px auto 10px;
          }
          .notfound .notfound-404 h1 {
            font-size: 86px;
          }
          .notfound .notfound-404 h2 {
            font-size: 16px;
          }

          .notfound .notfound-404 p {
            font-size: 16px;
          }

          .notfound a {
            padding: 7px 15px;
            font-size: 14px;
          }
        }    
    </style>


</head>

<body>

    <div id="notfound">
        <div class="notfound">
            <div class="notfound-404">
                <h1>Oops!</h1>
                <h2>Kuota Disk penyimpanan sudah penuh</h2>
                <p>Hapus beberapa file yang sudah tidak digunakan,di Recycle bin.
                atau hubungi lebih lanjut ke Administrator.</p>
            </div>
        </br></br>
            <a href="/dashboard/document">Back TO File Manager</a>
        </div>
    </div>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>

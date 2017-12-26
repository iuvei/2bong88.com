


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head><title>

</title>
    <script type="text/javascript">
        if (window.addEventListener) {
            window.addEventListener('load', function () {
                init();
            });
        } else {
            window.attachEvent('onload', function () {
                init();
            });
        }

        function init() {
            var ResultMain = document.getElementById("ResultMain");
            if (window.self.location.search.length == 0) {
                ResultMain.src = 'index.php?r=site/Result';
            }
            else {
                ResultMain.src = 'index.php?r=site/Result';
            }
        }
    </script>
</head>
<frameset cols="0,100" border = 0>
       <frame id='ResultMenu' name="ResultMenu" src="Result2.aspx" />
       <frame id='ResultMain' name="ResultMain" src=""/>
    </frameset>
<body >
</body>
</html>

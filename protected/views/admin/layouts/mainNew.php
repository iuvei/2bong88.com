


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <script type="text/javascript">
        function $(id) {
            return document.getElementById(id);
        }

        function setURL() {
            return true;
        }

        var url = window.location.href;
        var start = url.indexOf('//');
        var end = url.indexOf('/(');

        window.document.title = url.substr(start + 2, end - start - 2);
        window.ph = '5j5kkk';

        // For caching in child frames
        window.cachePage = new Array();
        window.cacheData = new Array();

        // For showing message in child frames
        window.errCodes = new Array();
        window.errMsgs = new Array();
        window.userNames = new Array();

    </script>
    <link href="https://mb.b88ag.com/_MemberInfo/SetNickName/Resources/SetNickName.css?20141215"
        rel="stylesheet" type="text/css" />
    <link href="https://mb.b88ag.com/_Announcement/Resources/Announcement.css?20141215"
        rel="stylesheet" type="text/css" />
    <link href="https://mb.b88ag.com/_GlobalResources/css/tooltip.css?20141215"
        rel="stylesheet" type="text/css" />
    <link href="https://mb.b88ag.com/_Components/AGEWnd/AGEWnd.css?20141215"
        rel="stylesheet" type="text/css" />
</head>
<body scroll='no'>
    <form name="agentSite" method="post" action="index.aspx" id="agentSite" style="height: 100%; width: 100%;">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUJMjIzMDkyODg1ZGQoGwDqwmENn/N5sU77NgyX3fD9uw==" />
</div>

    <table border="0" cellpadding="0" cellspacing="0" class="content">
        <tr>
            <td colspan="2" class="header">
                <iframe src="_Header/Header.aspx" frameborder="0" scrolling="no" width="100%" height="90px"
                    id="frHeader" name="frHeader"></iframe>
            </td>
        </tr>
        <tr>
            <td class="menu" valign="top">
                <iframe src="_Menu/Menu.aspx" frameborder="0" id="menu" name="menu" width="100%" height="100%"
                    marginwidth="0" marginheight="0" allowtransparency="yes"></iframe>
            </td>
            <td class="mainpage" valign="top">
                <iframe src="_Reports/PortalPage/PortalPage.aspx" onload="setURL();" frameborder="0" id="main" scrolling="auto"
                    name="main" width="100%" height="100%" marginwidth="0" marginheight="0" allowtransparency="yes">
                </iframe>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="footer">
                <iframe src="https://mb.b88ag.com/Footer.html" frameborder="0" width="100%" scrolling="no" height="22px"
                    id="frFooter" name="frFooter"></iframe>
            </td>
        </tr>
    </table>
    </form>
</body>
<script src="https://mb.b88ag.com/_Components/AGEWnd/AGEWnd.js?20141215"
    type="text/javascript"></script>
<script src="https://mb.b88ag.com/_GlobalResources/Js/Core.js?20141215"
    type="text/javascript"></script>

<script src="https://mb.b88ag.com/_MemberInfo/SetNickName/Resources/SetNickName.js?20141215"
    type="text/javascript"></script>
<script src="https://mb.b88ag.com/_Announcement/Resources/Announcement.js?20141215"
    type="text/javascript"></script>
<script type="text/javascript">
    AGE.PERMISSIONS = '[A][B][C][D][E][G][H]';
    AGE.prototype._SignOut = AGE.prototype.SignOut;
    // SignOut
    AGE.prototype.SignOut = function () {
        setCookie('58655615', '', -1);
        this._SignOut();
    }
    AGE.prototype.OpenPopUp = function (url) {
        var popH = 360, popW = 480;
        ageWnd.open(url, '', 200, 200, popW, popH);
    }
    AGE.prototype.ClosePopUp = function () { 
        ageWnd.close()
    }
    
</script>
</html>

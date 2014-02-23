<html>
    <head>		
        <script src="my.js" type="text/javascript"></script>
        <script type="text/javascript">
            var myXmlHttpRequest;

            function updateGoldPrice() {

                myXmlHttpRequest = getXmlHttpObject();
                if (myXmlHttpRequest) {
                    var url = "realTimeProcess.php";
                    var data = "city[]=ld&city[]=tw&city[]=tk";
                    myXmlHttpRequest.open("post", url, true);
                    myXmlHttpRequest.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    myXmlHttpRequest.onreadystatechange = function proc() {
                        //receive json
                        if (myXmlHttpRequest.readyState == 4) {
                            if (myXmlHttpRequest.status == 200) {
                                var res_objects = eval("(" + myXmlHttpRequest.responseText + ")");
                                $('ld').innerText = res_objects[0].price;
                                $('tw').innerText = res_objects[1].price;
                                $('tk').innerText = res_objects[2].price;
                            }
                        }
                    }
                    myXmlHttpRequest.send(data);
                }
            }

            //Use Timer Every 5 seconds
            window.setInterval("updateGoldPrice()", 1000);

        </script>
    </head>
    <center>
        <h1>Update Every 1 Seconds</h1>
        <table>
            <tr><td colspan="2">Gold Price Information</td></tr>
            <tr><td>Market</td><td>Latest Price</td><td></tr>
            <tr><td>London</td><td id="ld">700</td></tr>
            <tr><td>Taiwan</td><td id="tw">800</td></tr>
            <tr><td>Tokyo</td><td id="tk">1200</td></tr>
        </table>
    </center>
</html>
<!DOCTYPE html> 

<html>
    <head>
        <meta charset="UTF-8" /> 
        <script>

            document.addEventListener('DOMContentLoaded', function ()
            {

                if (Notification.permission !== "granted")
                {
                    Notification.requestPermission();
                }

            });

            function notifyBrowser(title, desc, url)
            {

                if (Notification.permission !== "granted")
                {
                    Notification.requestPermission();
                } else
                {
                    var notification = new Notification(title, {
                        icon: 'http://yellowfishtransfers.com/android-chrome-144x144.png',
                        body: desc,
                    });

                    /* Remove the notification from Notification Center when clicked.*/
                    notification.onclick = function () {
                        window.open(url);
                    };

                    /* Callback function when the notification is closed. */
                    notification.onclose = function () {
                        console.log('Notification closed');
                    };

                }
            }


        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

        <script>
            $(document).ready(function () {
                /*
                 $("#notificationButton").click(function(){
                 var x = Math.floor((Math.random() * 5) + 1); // Random number between 1 to 10 
                 var title =articles[x][0];
                 var desc ='Most popular article.';
                 var url =articles[x][1];
                 notifyBrowser(title,desc,url);
                 return false;
                 });
                 */
                var buzzer = $('#buzzer')[0];
                var url;
                var desc;
                var title;
                var articles = [];
                var jqxhr = $.getJSON("data.php", function (data) {
                    console.log(data);
                    articles = data;
                    var x = Math.floor((Math.random() * 5) + 1); /* Random number between 1 to 10*/
                    title = articles[x][0];
                    desc = 'New article.';
                    url = articles[x][1];
                    notifyBrowser(title, desc, url);            
                    buzzer.play();                                    
                    

                });
            });
        </script>
    </head>
    <audio id="buzzer" src="n.ogg"></audio>
    
    
</html>
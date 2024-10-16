<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <link rel="stylesheet" href="/css/login.css">
    </head>

    <body>
        <div class="logo-container"><img src="/bilder/Asset 1Iris_symbol.svg" class="logo"></div>
        
        <div id="loginMsg">Skanna din tagg för att logga in</div>

        <script>
            let fullInput = [];
            document.addEventListener('keypress', function(event) {
                let input = event.key;
                fullInput.push(input);
                if (fullInput.length === 9){
                    let sendInput = new XMLHttpRequest();
                    sendInput.open('POST', '/scripts/process.php', true);
                    sendInput.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                    sendInput.onreadystatechange = function() {
                        if (sendInput.readyState === XMLHttpRequest.DONE && sendInput.status === 200) {
                            console.log(sendInput.responseText);
                            let jsonResponse = JSON.parse(sendInput.responseText)
                            if (jsonResponse.status === 'success') {
                                window.location.href = jsonResponse.redirect;
                            }
                            else {
                                document.getElementById('loginMsg').innerHTML = jsonResponse.message;
                            }

                            fullInput = [];
                        }
                    }
                let tag_id = 'keys=' + encodeURIComponent(JSON.stringify(fullInput));
                sendInput.send(tag_id);
                console.log(`${fullInput}`);
                }
            });
        </script>
    </body>
</html>
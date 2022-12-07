<html>
    <head>
        <title></title>
    </head>
    <script type="text/javascript">
        function Copy() 
            {
                    //var Url = document.createElement("textarea");
                    urlCopied.innerHTML = window.location.href;
                    //Copied = Url.createTextRange();
                    //Copied.execCommand("Copy");
            }
    </script>
    <body>
        <div>
            <input type="button" value="Copy Url" onclick="Copy();" />
            <br />
          
            Paste: <textarea id="urlCopied" rows="1" cols="30"></textarea>
        </div>
    </body>
</html>
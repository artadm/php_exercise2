<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>
            Home
        </title>
    </head>
    <body>
        <h1>Home page</h1>


        <form action="/upload" method="post" enctype="multipart/form-data">
			<input type="file" multiple="multiple" name="transactions_files[]"/><br />
			<button type="submit">Upload Transactions</button>
        </form>
    </body>
</html>

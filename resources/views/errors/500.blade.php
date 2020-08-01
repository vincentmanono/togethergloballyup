<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>500 Error</title>

        <!-- Bootstrap CSS -->
        <link
            href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <style>
            @import url("https://fonts.googleapis.com/css?family=Montserrat:400,400i,700");
            body {
                background-color: #330000;
                font-family: "Montserrat", sans-serif;
            }
            article {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                box-sizing: border-box;
            }
            aside {
                flex: 0 0 75vw;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 2em;
                box-sizing: border-box;
            }
            h1,
            p {
                color: #fff;
                font-size: 3em;
                padding: 0;
                margin: 0;
            }
            p {
                font-size: 1em;
            }
            #render_error {
                fill: none;
                stroke: #f00;
                stroke-width: 3;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke-miterlimit: 10;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col">
                    <article>
                        <aside>
                            <svg
                                onclick="render_error.reset().play();"
                                id="render_error"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 809 375"
                            >
                                <path
                                    d="M218 49H82l-14 92a192 192 0 0 1 29-2c27 0 55 6 77 19 28 16 51 47 51 92 0 70-55 122-133 122-39 0-72-11-89-22l12-37c15 9 44 20 77 20 45 0 84-30 84-78 0-46-31-79-103-79-20 0-36 2-49 4L47 9h171zM524 183c0 122-45 189-124 189-70 0-117-65-118-184C282 68 333 3 406 3c75 0 118 67 118 180zm-194 6c0 93 29 146 73 146 49 0 73-58 73-149 0-88-23-146-73-146-42 0-73 51-73 149zM806 183c0 122-45 189-124 189-70 0-117-65-118-184C564 68 615 3 688 3c75 0 118 67 118 180zm-194 6c0 93 29 146 73 146 49 0 73-58 73-149 0-88-23-146-73-146-42 0-73 51-73 149z"
                                />
                            </svg>
                            <h1>Ooops - Error 500</h1>
                            <p>Please contact your administrator</p>
                            <p class="text text-danger text-center">
                                It's always time for a coffee break.  We should
                                be back by the time you finish your coffee.
                            </p>
                        </aside>
                    </article>
                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>
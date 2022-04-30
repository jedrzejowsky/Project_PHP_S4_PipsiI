<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" />
        <link rel="stylesheet" type="text/css" href="{{url('css/style.css')}}" />
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&family=Roboto&display=swap" rel="stylesheet" />

        <title>Blog</title>

    </head>

    <body class="d-flex flex-column min-vh-100">

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

        <!--header-->
        @include('header')

        <!--content-->
        <div class="row m-0 h-75 w-100">
            <div class="row text-center p-3">
                <div class="col-md-6">
                    <div class="col-md-12">
                        <h1>Z DRUGIEGO PORTALA USUNIĘTO ŻEL, KTÓRY POWODOWAŁ WYMIOTY</h1>
                    </div>
                    <div class="col-md-12 mb-4">
                        <img src="https://i0.wp.com/grynieznane.pl/wp-content/uploads/2022/04/a1-5.jpg?resize=750%2C422&ssl=1" class="img-fluid"/>
                    </div>
                    <div class="col-md-12 mb-5">
                        <h3>
                            Druga odsłona serii Portal jest znacznie bardziej rozbudowana od swojego pierwowzoru i trudno się temu dziwić, skoro początkowo „jedynka” była przez firmę Valve traktowana bardziej jako eksperyment, niż pełnoprawną grę. Produkcji sequela poświęcono zdecydowanie więcej czasu i uwagi, co przełożyło się na wprowadzenie nowych mechanik urozmaicających rozgrywkę. Do tych najważniejszych zaliczają się żele zmieniające zachowanie interaktywnych obiektów i głównej bohaterki tej produkcji. W sumie dostaliśmy trzy takie „mazidła”, choć początkowo deweloperzy planowali ich aż pięć. Jedno z nich wyleciało z pełniaka z dość nieoczywistego powodu – podczas testów okazało się, że jego stosowanie wywołuje u graczy nudności.
                            <a href="https://www.youtube.com/watch?v=dN-B82WfNeI" target="_blank"><button>Read more..</button></a>
                        </h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-12">
                        <h1>W SADZE SKYWALKERÓW ZNAJDZIEMY ŚWIETNE NAWIĄZANIE DO INDIANY JONESA</h1>
                    </div>
                    <div class="col-md-12 mb-4">
                        <img src="https://i0.wp.com/grynieznane.pl/wp-content/uploads/2022/04/a1-4.jpg?resize=750%2C422&ssl=1" class="img-fluid"/>
                    </div>
                    <div class="col-md-12 mb-5">
                        <h3>
                            Bardzo dobrą znajomością materiału źródłowego i nierzadko w dowcipny sposób zaprezentowali znane z pierwowzoru wydarzenia. Nawiązania do dziewięciu filmów nie są jednak jedynymi, które można w nowej odsłonie serii LEGO zobaczyć. Gra zawiera też co najmniej kilka luźnych odniesień do innej znanej marki, aktualnie znajdującej się w portfolio Disneya. Mowa tu o szalonych przygodach Indiany Jonesa, czyli kolejnej kultowej postaci, w którą wcielił się Harrison Ford. <button>Read more..</button>
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <!--footer-->
        <div class="bg-black p-3 mt-auto h-15 w-100 d-flex justify-content-center">
            @include('footer')
        </div>
    </body>
</html>

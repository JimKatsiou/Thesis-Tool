
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
        crossorigin="anonymous"></script>

    <title>Table</title>

    <!-- INCLUDING JQUERY-->
    <script src="https://code.jquery.com/jquery-3.5.1.js">
    </script>

    <!-- CSS FOR STYLING THE PAGE -->
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }

        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans',
                'Gill Sans MT', ' Calibri',
                'Trebuchet MS', 'sans-serif';
        }

        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }

        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            font-weight: lighter;
        }
    </style>
</head>

<body>
    <div class="container"></div>
    <a href="{{ route('admin.index') }}" class="btn btn-primary">Back</a>
    <!-- D:/xampp/htdocs/Thises-Files/Test_First_page.html
                        /Thises-Files/Test_First_page.html -->
    <hr>
    <br>
    <section>

        <h1>Data Table</h1>

        <!-- TABLE CONSTRUCTION-->
        <table id='table'>
            <!-- HEADING FORMATION -->
            <tr>
                <th>#</th>
                <th>Number Of Sensors</th>
                <th>Cost Of Sensors</th>
                <th>Cost Of Insstalation</th>
                <th>Final Cost</th>
                <th>Energy</th>
            </tr>

            <script>
                $(document).ready(function () {

                    // FETCHING DATA FROM JSON FILE
                    $.getJSON("json/file.json",
                        function (data) {
                            var results = '';

                            // ITERATING THROUGH OBJECTS
                            $.each(data, function (key, value) {

                                //CONSTRUCTION OF ROWS HAVING
                                // DATA FROM JSON OBJECT
                                results += '<tr>';
                                results += '<td>' +
                                    value.Id + '</td>';

                                results += '<td>' +
                                    value.NumberOfSensors + '</td>';

                                results += '<td>' +
                                    value.CostOfSensors + '</td>';

                                results += '<td>' +
                                    value.CostOfInsstalation + '</td>';

                                results += '<td>' +
                                    value.FinalCost + '</td>';

                                results += '<td>' +
                                    value.Energy + '</td>';

                                results += '</tr>';
                            });

                            //INSERTING ROWS INTO TABLE
                            $('#table').append(results);
                        });
                });
            </script>
    </section>
</body>

</html>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center py-5">Multiplication Table</h1>


    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Input the Number" aria-label="Input the Number" aria-describedby="button-addon2" id="my-input">
                    <button onclick="num_multiplicationTable()" class="btn btn-outline-secondary" type="button" id="button-addon2">Check</button>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script>
        function num_multiplicationTable() {
            let num = document.getElementById('my-input').value;
            multiplicationTable(num);
        }

        function multiplicationTable(num) {
            let i = 1;
            while (i <= 10) {
                product = num * i;
                console.log(num + 'x' + i + ' = ' + product);
                i++;
            }

        }
    </script>
</body>

</html>
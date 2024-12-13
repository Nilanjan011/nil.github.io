<!-- bootstrap select dropdown with search box example -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->

</head>

<body>

<div class="container mt-5">
  <select class="selectpicker" multiple aria-label="Default select example" data-live-search="true">
    <option value="1">One</option>
    <option value="2">Two</option>
    <option value="3">Three</option>
    <option value="4">Four</option>
  </select>
</div>

<div class="container mt-5">
  <select class="selectpicker"  multiple aria-label="Default select example" data-live-search="true">
    <option selected value="1">One</option>
    <option value="2">Two</option>
    <option selected value="3">Three</option>
    <option value="4">Four</option>
  </select>
</div>  
    <!-- <script>
        $(function() {
            $('select').selectpicker();
        });
    </script> -->
</body>

</html>
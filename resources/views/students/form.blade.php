<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Student Creation</title>
</head>
<body style="align-content: center">
    <div>
        <h1>Enter students information</h1>
    </div>
    <div class="col-4" style="align-content: center">
         <form action="" id="my-form">
           <div class="mb-3">
               <label for="exampleInputEmail1" class="form-label">Name</label>
               <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
          
           </div>
          <div class="mb-3">
             <label for="exampleInputEmail1" class="form-label">Email address</label>
             <input type="email" class="form-control" name="Email" aria-describedby="emailHelp">
     
          </div>
          <div class="mb-3">
                 <input type="file" name="file" required>
          </div>
          <div>
             <input type="submit"  value="Add Student" id="btnSubmit">
          </div>
      
         
      </form>
      <span id="output"></span>

      <script>

          $(document).ready(function(){

          })

      </script>
    </div>
   
</body>
</html>
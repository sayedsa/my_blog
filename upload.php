<?php

/*

$_GET : Data sent by GET method
$_POST : Data sent by POST method

$_FILES: Data sent by files upload

When file is sent by the browser to the backend server, it send a temporary name of the file with it, we can get it by 'tmp_name' key of the array
It also sends actual file name with it we can get it by 'name' key of the array

*/


// When upload button is pressed
if(isset($_POST['upload-file'])){

    $imgFile = $_FILES['img'];

    $path = "uploads/";

    $tempName = $imgFile['tmp_name'];
    $actualName =  $imgFile['name'];


    if(move_uploaded_file($tempName, $path . $actualName)){
        echo "File uploaded Successfully";
    }
    else{
        echo "Upload failed";
    }


}



?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Upload Images/Files</h1>

    


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <!-- enc Type(Encoding type) is required to send any kind of file to the backend -->
        <form action="" method="POST" enctype="multipart/form-data">

            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                    <label>Upload a File</label>
                    <br>
                    <input type="file" name="img"/>


                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="upload-file">Save changes</button>
            </div>
            </div>

        </form>
    </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


  </body>
</html>
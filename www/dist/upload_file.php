<html>
    <head>
        <title>Upload file đơn giản</title>
        <meta charset="UTF-8"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        
        <div class="container">
            <h1 class="text-center">Upload file đơn giản - Cơ bản</h1>
            <div class="row">
                <!--- BEGIN FORM UPLOAD FILES --->
                <form action="upload_file.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="label-control col-xl-8">Upload file: </label>
                        <div class="col-xl-10">
                            <input type="file" id="txtFile" name="txtFile" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xl-10">
                            <input type="submit" value="Upload now" name="btnSubmit" class="btn btn-primary" />
                        </div>
                    </div>
                </form>
                <!--- END FORM UPLOAD FILES --->
            </div>
        </div>
        <div id="result">
            <div class="container">
                <!--- BEGIN CODE HANDLE UPLOAD FILE --->
                <?php 
                    if(isset($_POST["btnSubmit"])) {
                        $target_dir = './uploads/'; //Set target directory to save file
                        $file_name = "";
                        if(isset($_FILES["txtFile"])) {
                            $file_name = $_FILES["txtFile"]["name"]; //Set file name to variable $file_name
                            
                            if($_FILES["txtFile"]["error"] > 0) { //Check error
                                echo 'Sorry, there was an error uploading your file';
                            } else {
                                //Here code upload file to server
                                move_uploaded_file($_FILES["txtFile"]["tmp_name"], $target_dir . $file_name);
                                echo "File " . basename($file_name) . " has been uploaded!";
                            }
                        }
                    }
                ?>
                <!--- END CODE HANDLE UPLOAD FILE --->
            </div>
        </div>
        


    </body>

</html>
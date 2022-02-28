<?php
     session_start();

$un="root";
 $upw="password";
 $host="localhost";
 $conn = mysqli_connect($host,$un,$upw);
 mysqli_select_db($conn, "luarasi-lms");
  $subject= $_POST['subject'];
  $logo_upload = $_FILES['logo']['name'];
  $target2 = "Logo_upload/".$logo_upload;
  move_uploaded_file($_FILES['logo']['tmp_name'],$target2);
  
    require_once('luarasi-lms/db_function.php');
    require_once('luarasi-lms/system_permissions.php');

    $pdo       = pdoConnection();
    $http_verb = $_SERVER['REQUEST_METHOD'];
    $params    = json_decode(file_get_contents('php://input')); 

    // echo '<script>alert('.$http_verb.');</script>';

    if ($http_verb == 'POST') {

        /**
         * permission_id : 
         * 1-> create
         * 2-> edit
         * 3-> delete
         * 5-> list
         */
    
        if (checkPermissions($_SESSION['user_id'], 1) == "false") {
                    header("HTTP/1.0 403 Forbidden");
                    echo '{"error": "You do not have permissions to create a product."}' . '\n';
                    exit();
        }
        $subject = $_POST['subject'];

        // $sql = `INSERT INTO subject_master VALUES('','$subject','pafoto')`;

        // $data = [ 
        //         'subject' => 'ademm'
        //         ];   
        $query= "insert into subject_master values('','$subject','$logo_upload')";
        echo '<script>alert("UPLOAD SUCCESSFULLY");window.location="subject_master.php";</script>';
        mysqli_query($conn, $query);
        //mysqli_query($pdo, $sql);

        // $stmt = $pdo->prepare($sql);
        // $stmt->execute($data);  

        // echo '{"message": "Product created successfully."}' . '\n';
    } elseif ($http_verb == 'GET') {

        $me = checkPermissions(2, 4);

        if (checkPermissions(2, 4) == "false") {
            header("HTTP/1.0 403 Forbidden");
            echo '{"error": "You do not have permissions to list products."}' . '\n';
            exit();
        }

         $sql  = 'select * from subject_master';  

         $stmt = $pdo->prepare($sql);
         $stmt->execute(); 

         $data = [];

         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
             $data[] = $row;                    
         }

         $reponse = [];
         $response['data'] = $data;

         echo json_encode($response, JSON_PRETTY_PRINT) . "\n";

    } elseif ($http_verb == 'PUT') {

        if (checkPermissions($user_id, 2) == "false") {
            header("HTTP/1.0 403 Forbidden");
            echo '{"error": "You do not have permissions to update a product."}' . '\n';
            exit();
        }

        $sql = 'update products set 
                    product_name = :product_name, 
                    retail_price = :retail_price
                where product_id = :product_id
                ';

        $data = [ 
                'product_id'   => $params->product_id, 
                'product_name' => $params->product_name,
                'retail_price' => $params->retail_price              
                ];   

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data); 

        echo '{"message": "Product updated successfully"}' . '\n';

    } elseif ($http_verb == 'DELETE') { 

        if (checkPermissions($user_id, 3) == "false") {
            header("HTTP/1.0 403 Forbidden");
            echo '{"error": "You do not have permissions to delete a product."}';
            exit();
        }

        $sql = 'delete from products
                where product_id = :product_id
                limit 1
                ';

        $data = [ 
                'product_id' => $params->product_id                
                ];   

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data); 

        echo '{"message": "Product deleted successfully."}' . '\n';
    }
  ?>
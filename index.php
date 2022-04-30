<?php

// session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
// {
//   header('Location: Log_in.php');
//   exit;
// }


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/all_style.css" type="text/css">
    <title>Somnath Saree</title>
</head>

<body id="index-body">
    <?php include 'conponments/_dbconnect.php'?>
    <?php include 'conponments/_header.php'; ?>

    <!-- list of merchant  -->
    <div class="container" style="min-height: 501px;">
        <h1 class="text-center mt-2">Merchant List</h1>
        <hr>
        <?php
        echo '<button class="button me-2 " id="add-merchant"data-bs-toggle="modal" data-bs-target="#merchantModal">Add New Merchant</button>';
        include 'add_merchant.php';
        ?>
        <div class="row">
            <?php
                $sql = "SELECT * FROM `merchant` ORDER BY `merchant`.`date` DESC";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) != 0)
                {
                    
                    while($row = mysqli_fetch_assoc($result))
                    {   
                        $m_id = $row['merchant_id'];
                        $m_name = $row['merchant_name'];
                        $s_name = $row['saree_name'];
                        $total_saree = $row['total_saree'];
                        $m_price = $row['merchant_price'];
                        $price = $row['saree_price'];
                        $date = date("d-m-y",strtotime($row['date']));
                        
                        echo '<div class="col-md-3">
                        <div class="card my-3" style="width: 18rem;">
                        <div class="card-body" >
                        <h4 class="card-title">' . $m_name . '</h4>
                        <hr>
                        <p><b>Saree Name :</b>' . $s_name . '</p>
                        <p><b>Total Saree :</b>' . $total_saree . '</p>
                        <p><b> Merchant Price :</b>' . $m_price . '</p>
                        <p><b> Customer Price :</b>' . $price . '</p>
                        <p><b>Date :</b>' . $date . '</p>
                        <a href="/somnathsaree/customerlist.php?m_id='.$m_id.'" class="btn btn-outline-info" style="width: 16rem;">Add List </a>
                        <a href="/somnathsaree/delete_merchant.php?m_id='.$m_id.'" class="btn btn-outline-danger mt-2" style="width: 16rem;">Delete Merchant </a>
                        </div>
                        </div>
                        </div>';
                    }
                }
                else
                {
                    echo ' <h5 class="text-center mt-5"> No Records Found </h5>'; 
                }
            ?>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
-->

    <!-- Footer -->
    <?php include 'conponments/_footer.php';?>
</body>

</html>
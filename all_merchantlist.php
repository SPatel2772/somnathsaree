<?php

session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header('Location: Log_in.php');
  exit;
}   
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <title>Somnath Saree</title>
</head>

<body id="index-body">
    <?php
        include 'conponments/_dbconnect.php';
        include 'conponments/_header.php';
    ?>
    <!--Data table all record -->
    <div class="container">

        <h3 class="text-center mt-3">All Merchant List</h3>
        <hr class="mb-4">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Saree Name</th>
                    <th scope="col">Total Saree</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>

                <?php
           
                    $sql = "SELECT * FROM `merchant`";
                    // $sql = "SELECT * FROM `customerlist`";
                    $result = mysqli_query($conn, $sql);
                    $sno = 0;
                    $t_saree = 0;
                    $price = 0;
                    while ($rows = mysqli_fetch_array($result))
                    {
                    $sno += 1;
                    $t_saree += $rows['total_saree'];
                    $price += $rows['merchant_price'];
                    echo "<tr>
                            <td scope='row'>". $sno ."</td>
                            <td>". $rows['merchant_name'] ."</td>
                            <td>". $rows['saree_name'] ."</td>
                            <td>". $rows['total_saree'] . "</td>
                            <td>". $rows['merchant_price'] . "</td>
                            </tr>";               
                    }
                ?>
            </tbody>
            <?php
                    echo '<tr style="background-color:#ABEBC6">
                        <td><b>Total</b></td>
                        <td>- -</td>
                        <td>- -</td>
                        <td><b>'.$t_saree.'</b></td>
                        <td><b>'.$price.'</b></td>
                    </tr>';
                ?>
        </table>
    </div>

    <!-- merchamt serch data -->
    <div class="container">
        <hr>
        <h3 class="text-center"> Search Merchant</h3>
        <!-- <div class="row">
            <div class="col-2">
            </div>
        </div> -->

        <!-- get customer name -->
        <table>
            <tr>
                <td><b>Enter Customer Name : &nbsp;</b></td>
                <form action="/somnathsaree/all_merchantlist.php" method="post">
                    <td>
                        <input type="text" class="form-control" placeholder="Enter Customer Name" name="SearchCustomer"
                            id="searchCustomer">
                    </td>
                    <td>
                        &nbsp;&nbsp;
                        <button type="submit" class="btn btn-outline-success">Submit</button>
                    </td>
                </form>
            </tr>
        </table>



        <!-- search customer data -->
        <table class="table table-striped mt-3">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Name</th>
                    <th scope="col">Saree Name</th>
                    <th scope="col">Total Saree</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php

                    $merchant = 'null';
                    if ($_SERVER['REQUEST_METHOD'] == 'POST')
                    {
                        $merchant = $_POST['SearchCustomer'];
                        //  echo $customer;
                    } 

                    $sql = "SELECT * FROM `merchant` WHERE `merchant_name` = '$merchant'";
                    // $sql = "SELECT * FROM `customerlist`";
                    $result = mysqli_query($conn, $sql);
                    $num = mysqli_num_rows($result);
                    
                    $search_t_saree = 0;
                    $search_total = 0;
                    if ($num >0 )
                    {   
                        while($rows = mysqli_fetch_array($result))
                        {   
                            $maltipal =($rows['total_saree'])*($rows['merchant_price']);
                            $search_t_saree += $rows['total_saree'];
                            $search_total += $maltipal;

                            echo '<tr>
                            <td scope="row">'.date("d-m-y", strtotime($rows['date'])).'</td>
                            <td>'.$rows['merchant_name'].'</td>
                            <td>'.$rows['saree_name'].'</td>
                            <td>'.$rows['total_saree'].'</td>
                            <td>'.$rows['merchant_price'].'</td>
                            <td><b>'.$maltipal.'</b></td>
                            </tr>';
                        }
                    }
                    else
                    {       
                        echo '<tr>
                            <th scope="row">--</th>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                                <h4 class="text-center mt-4" style="color: red">No data found</h4>
                            </tr>';       
                    }

                ?>
            </tbody>
            <?php
                    echo '<tr style="background-color:#ABEBC6">
                        <th>Total</th>
                        <th>- -</td>
                        <th>- -</td>
                        <th>'.$search_t_saree.'</th>
                        <th>--</th>
                        <th>'.$search_total.'</th>
                    </tr>';
                ?>
        </table>
        <hr class="mb-5">

        <!-- Generating pdf files -->
        <?php
            if($merchant != 'null')
            {
                echo '<a href="merchant_generate_pdf.php?c_name='.$merchant.'" class="btn btn-danger mb-5">Generate PDF</a>';
            }
        ?>
    </div>
    
    <!-- footer -->
            <?php include 'conponments/_footer.php';?>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
        integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
        integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
    </script>

    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
    </script>
</body>

</html>
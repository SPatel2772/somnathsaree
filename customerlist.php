<?php

    session_start();

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
    {
    header('Location: Log_in.php');
    exit;
    }   

    include 'conponments/_dbconnect.php';

    // Get Merchant Data
    $insert = false;
    $edit = false;
    $delete = false;
    
    $m_id = $_GET['m_id'];
    $sql = "SELECT * FROM `merchant` WHERE `merchant_id` = $m_id";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $m_name = $row['merchant_name'];
        $s_name = $row['saree_name'];
        $t_saree = $row['total_saree'];
        $m_price = $row['merchant_price'];
        $price = $row['saree_price'];
    }
    
  //get data from form

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
  {
    if(isset($_POST['snoEdit']))
    {
        $title = $_POST['titleEdit'];
        $description = $_POST['descriptionEdit'];
        $sno = $_POST['snoEdit'];
        
        $sql = "UPDATE `customerlist` SET `total_saree` = '$title', `return_saree` = '$description' WHERE `customerlist`.`S.No` = $sno";
        // $sql ="UPDATE `notes` SET `Title` = '$title', `Description` = '$description' WHERE `notes`.`S.No` = $sno ";
        $result = mysqli_query($conn, $sql);
        if ($result)
        {
          $edit = true;
        }
        else 
        {
          //echo "no";
        } 
    }
    
    else
    {
        $name = $_POST['Name'];
        $total_saree = $_POST['TotalSaree'];
        $return_saree = $_POST['ReturnSaree'];
        
        $sql = "INSERT INTO `customerlist` (`customer_name`, `total_saree`, `return_saree`, `customer_merchant_id`, `customer_merchant_name`, `price`, `date`) VALUES ('$name', '$total_saree', '$return_saree', '$m_id', '$m_name', '$price', current_timestamp())";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
          $insert = true;
        }
        else
        {  
            // echo "nno";
        }
    }
  }

  if (isset($_GET['delete']))
  {
    $sno = $_GET['delete'];
    
    $sql = "DELETE FROM `customerlist` WHERE `customerlist`.`S.No` = $sno";
    $result = mysqli_query($conn, $sql);

    if ($result)
    {
      $delete = true;
    }
    else 
    {
      //echo "no";
    }
  }
?>

<!doctype html>
<html lang="en">

<head>
    <?php include 'conponments/_header.php'; ?>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

    <title>Somnath Saree</title>
</head>

<body>

    <!-- edit modal -->
    <!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
        Edit
    </button>-->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Records</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="my-3" action="/somnathsaree/customerlist.php?m_id=<?php echo $m_id; ?>" method="post">
                    <div class="modal-body">

                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="title" class="form-label">Total Saree</label>
                            <input type="text" class="form-control" id="titleEdit" name="titleEdit" required>
                        </div>

                        <div class="mb-3">
                            <label for="desc" class="form-label">Return Saree</label>
                            <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit"
                                required>
                        </div>

                    </div>
                    <div class="modal-footer mr-auto d-block">
                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- button -->
    <div class="container mt-3">
        <a href="/somnathsaree/index.php" class="btn btn-outline-info">Back</a> &nbsp;&nbsp; 
        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#CustomerModal">
            Add Customer Details
        </button>
    </div>

    <!-- Add customer Modal -->
    <div class="modal fade" id="CustomerModal" aria-labelledby="CustomerModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CustomerModalLabel">Add Customer Details </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/somnathsaree/customerlist.php?m_id=<?php echo $m_id;?>" method="post">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="Name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="Name" name="Name">
                        </div>
                        <div class="mb-3">
                            <label for="TotalSaree" class="form-label">Total Saree</label>
                            <input type="text" class="form-control" id="TotalSaree" name="TotalSaree">
                        </div>
                        <div class="mb-3">
                            <label for="ReturnSaree" class="form-label">Return Saree</label>
                            <input type="text" class="form-control" id="ReturnSaree" name="ReturnSaree">
                        </div>

                        <hr class="mt-3 mb-3">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> -->
            </div>
        </div>
    </div>

    <!-- Merchant Details -->
    <div class="container">
        <hr>
            <h3 class="text-center">Merchant Information</h3>

            <?php

                echo '<p><b>Name : </b>  '.$m_name.'<p>
                <p><b>Saree Name : </b> '.$s_name.' <p>
                <p><b>Total Saree : </b> '.$t_saree.' <p>
                <p><b>Merchant Price : </b> '.$m_price.' <p>
                <p><b>Customer Price : </b> '.$price.' <p>';
            ?>
        <hr>    
    </div>

    <!-- Notifications -->
    <div class="container">
        <h3 class="text-center"> Customer Information </h3>
            <?php
                if ($insert)
                    {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>Successful !</strong> Your notes have been added sucessfully.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                if ($edit)
                    {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>Updated !</strong> Your notes have been updated sucessfully.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                    }
                if ($delete)
                    {
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                                <strong>Deleted !</strong> Your notes have been deleted sucessfully.
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>";
                    }
            ?>
    </div>

    <!--Data table -->
    <div class="container">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total Saree</th>
                    <th scope="col">Return Saree</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

            $sql = "SELECT * FROM `customerlist` WHERE `customer_merchant_id` = $m_id";
            $result = mysqli_query($conn, $sql);
            $sno = 0;
            while ($rows = mysqli_fetch_array($result))
            {
              $sno += 1;
              echo "<tr>
                      <td scope='row'>". $sno ."</td>
                      <td>". $rows['customer_name'] ."</td>
                      <td>". $rows['total_saree'] ."</td>
                      <td>". $rows['return_saree'] . "</td>
                      <td> <button style='width: 70px;' type='button' class='edit btn btn-outline-primary btn-sm' id=".$rows['S.No']." >Edit</button> 
                      <button style='width: 70px;' type='button' class='delete btn btn-outline-danger btn-sm' id=d".$rows['S.No'].">Delete</button> 
                      </td>
                    </tr>";               
            }
          ?>
            </tbody>
        </table>
        <hr>
    </div>
    
    <!-- delete all record-->
    <div class="container text-center mb-5">
        <a href="/somnathsaree/delete_all_customer.php?m_id=<?php echo $m_id;   ?>" class="btn btn-outline-danger mt-3">Delete All Records</a> 
    </div>



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

    <script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener('click', (e) => {
            tr = e.target.parentNode.parentNode;

            title = tr.getElementsByTagName("td")[2].innerText;
            description = tr.getElementsByTagName("td")[3].innerText;

            snoEdit.value = e.target.id;

            titleEdit.value = title;
            descriptionEdit.value = description;

            //  console.log(e.target.id);
            // console.log(title, description);

            $('#editModal').modal('toggle');
        })
    })

    delets = document.getElementsByClassName('delete');
    Array.from(delets).forEach((element) => {
        element.addEventListener('click', (e) => {
            sno = e.target.id.substr(1, );
            console.log(sno);

            if (confirm("Are you sure you want to delete this note !")) {
                window.location =
                    `/somnathsaree/customerlist.php?delete=${sno}&m_id=<?php echo $m_id; ?>`;
            } else {

            }
        })
    })
    </script>

    <!-- Footer -->
    <?php include 'conponments/_footer.php';?>
</body>

</html>
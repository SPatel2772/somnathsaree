<?php

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true)
{
  header('Location: Log_in.php');
  exit;
}

  
  include 'conponments/_dbconnect.php';

    $insert =false;

  if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
      
      $m_name = $_POST['MerchantName'];
      $s_name = $_POST['SareeName'];
      $total_saree = $_POST['TotalSaree'];
      $m_price = $_POST['MerchantPrice'];
      $price = $_POST['Price'];
      $date = $_POST['Date'];

      $sql = "INSERT INTO `merchant` (`merchant_name`, `saree_name`, `total_saree`, `merchant_price`, `saree_price`, `date`) VALUES ('$m_name', '$s_name', '$total_saree', '$m_price', '$price', '$date')";
      $result = mysqli_query($conn, $sql);
      if ($result)
      {
        $insert = true;
        echo "<div class='alert alert-success alert-dismissible fade show mt-3' role='alert'>
                      <strong>Successful !</strong> Your notes have been added sucessfully.
                      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>";
      }
    }
?>

<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#merchantModal">
Launch demo modal
 </button>-->

<!-- Modal -->
<div class="modal fade" id="merchantModal" tabindex="-1" aria-labelledby="merchantModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="merchantModalLabel">Add Merchant Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="/somnathsaree/index.php" method="post">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Merchant Name</label>
                        <input type="text" class="form-control" id="MerchantName" name="MerchantName" required>
                    </div>
                    <div class="mb-3">
                        <label for="SareeName" class="form-label">Saree Name</label>
                        <input type="text" class="form-control" id="SareeName" name="SareeName" required>
                    </div>
                    <div class="mb-3">
                        <label for="TotalSaree" class="form-label">Total Saree</label>
                        <input type="text" class="form-control" id="TotalSaree" name="TotalSaree" required>
                    </div>
                    <div class="mb-3">
                        <label for="Price" class="form-label">Merchant Price</label>
                        <input type="text" class="form-control" id="MerchantPrice" name="MerchantPrice" required>
                    </div>
                    <div class="mb-3">
                        <label for="Price" class="form-label">Customer Price</label>
                        <input type="text" class="form-control" id="Price" name="Price" required>
                    </div>
                    <div class="mb-3">
                        <label for="Date" class="form-label">Date</label>
                        <input type="date" class="form-control" id="Date" name="Date" required>
                    </div>

                    <hr>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>

                </div>
            </form>

            <!-- <div class="modal-footer">
        </div> -->
        </div>
    </div>
</div>
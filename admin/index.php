<?php include("nav.php"); 
include("conn.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin side</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <Script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" type="text/javascript"></Script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="../css/index.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <style>
        .db{
            width:30%;
            border:1px solid lightgrey;
            border-radius:10px;
            margin:25px 10px;
            text-align:center;
            padding: 40px 0;
            text-decoration:none;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.05), 0 6px 20px 0 rgba(0, 0, 0, 0.05);
        }
        a{
        
        }
        h1{
            margin-top:10px;
        }
        p{
            margin-top:-10px;
        }
    </style>
</head>
<body>

<?php 

// total user 
$sqltotaluser = "select * from user";
$resulttotaluser  = mysqli_query($con,$sqltotaluser);
$totaluser = mysqli_num_rows( $resulttotaluser );


//total products 
$sqltotalpro = "select * from product";
$resulttotalpro  = mysqli_query($con,$sqltotalpro);
$totalpro = mysqli_num_rows( $resulttotalpro );


//total order 

$sqltotalorder = "select * from ordered_item";
$resulttotalorder  = mysqli_query($con,$sqltotalorder);
$totalorder = mysqli_num_rows( $resulttotalorder );


//total reviews

$sqltotalreview = "select * from review ";
$resulttotalreview  = mysqli_query($con,$sqltotalreview);
$totalreview = mysqli_num_rows( $resulttotalreview );




//total brand

$sqltotalbrand = "select * from brand ";
$resulttotalbrand  = mysqli_query($con,$sqltotalbrand);
$totalbrand = mysqli_num_rows( $resulttotalbrand );


//total shape

$sqltotalshape = "select * from shape ";
$resulttotalshape  = mysqli_query($con,$sqltotalshape);
$totalshape = mysqli_num_rows( $resulttotalshape );


//weekly sell 
$sqlweeklysell = "select * from ordertbl where date > now() - interval 1 week";
// $sqlweeklysell = "select * from ordertbl where week(date)=week(now())";
$resultweeklysell  = mysqli_query($con,$sqlweeklysell);
$totalweeklysell = mysqli_num_rows( $resultweeklysell );


//monthly sell 

$sqlmonthlysell = "select * from ordertbl where MONTH(date) = MONTH(now()) and YEAR(date) = YEAR(now());";
$resultmonthlysell  = mysqli_query($con,$sqlmonthlysell);
$totalmonthlysell = mysqli_num_rows( $resultmonthlysell );

?>


<div class="d-flex">
    <a class="db" href="user-info.php">
    <div style="color:blue;">
            <i class="fa-solid fa-user fa-3x" ></i>
            <h1><?php echo $totaluser ?></h1>
            <p>Total User</p>
    </div>
    </a>
    <a class="db" href="Displayproduct.php">
    <div style="color:Gold;">
            <i class="fa-solid fa-cart-shopping fa-3x"></i>
            <h1><?php echo $totalpro ?></h1>
            <p>Total Products</p>
    </div>
    </a>
    <a class="db" href="order.php">
    <div style="color:Red;">    
            <i class="fa-solid fa-clipboard-list fa-3x" ></i>
            <h1><?php echo $totalorder ?></h1>
            <p>Total Order</p>
    </div>
    </a>
    <a class="db" href="review.php">
    <div style="color:Orange;">
            <i class="fa-solid fa-star fa-3x" ></i>  
            <h1><?php echo $totalreview ?></h1>
            <p>Total Review</p>
    </div>
    </a>
</div>
<div class="d-flex">
    <a class="db" href="DisplayBrand.php">
        <div style="color:Orange;">
        <img src="upload/bi.png" style="width:16%;">  
            <h1><?php echo $totalbrand ?></h1>
        <p>Total Brand</p>
    </div>
    </a>
    <a class="db" href="Displayshape.php">
        <div style="color:Red;">    
        <i class="fa-solid fa-shapes fa-3x" ></i>
            <h1><?php echo $totalshape ?></h1>
            <p>Total Shape</p>
        </div>
    </a>
    <a class="db" href="#">
        <div style="color:Gold;">
        <i class="fa-solid fa-calendar-week fa-3x"></i>
            <h1><?php echo $totalweeklysell ?></h1>
            <p>Weekly Sell</p>
        </div>
    </a>
    <a class="db" href="#">
        <div style="color:blue;">
        <i class="fa-solid fa-calendar-days fa-3x"></i>
            <h1><?php echo $totalmonthlysell ?></h1>
            <p>Monthly Sell</p>
    </div>
    </a>
</div>
<hr>
    <div>
        <h1 class="container-fluid text-center my-3">Reviews Details</h1>
    <table id="myTable" class="table">
        <thead class="table-primary">
            <tr style="Background :blue;">
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Review Title</th>
                <th>Review </th>
                <th>Ratings </th>
                <th>Product Name </th>
                <th>Date</th>
                <th>Review Image</th>
                <th>Action </th>

            </tr>
            </thead>
            <tbody>

            <?php 
 
 require_once('conn.php');

     $sql = "SELECT review.rid,review.name,review.ratings,review.title,review.comment,review.posted,review.img, product.pname FROM review INNER JOIN product ON review.pid=product.pid order by rand() LIMIT 3";

     $result = mysqli_query($con,$sql);

     $sr =1;
     if($result){
         while($row=mysqli_fetch_array($result)){
             $date= new DateTime($row['posted']) ;  
             echo"<tr class='table-light'>
                 <td>".$sr++."</td>
                 <td>".$row['name'] ."</td>
                 <td>".$row['title'] ."</td>
                 <td>".$row['comment'] ."</td>
                 <td>".$row['ratings'] ."</td>
                 <td>".$row['pname'] ."</td>
                 <td>".$date->format('Y-m-d')."</td>
                 <td> <img src = ". $row['img']." height=100px; style='width:75%;'/></td>

                 <td><form action='DeleteReview.php' method='post'>						
                 <button type='submit' name='btndel' class='btn btn-danger btndel'>Disable</button>
                 <input type='text' hidden value = ".$row['rid']. " name = 'delid'>
                </form>
                </td>

                 
                 </div>
                 </tr>";
                 
         }
     }
 
?>

</tbody>
        </table>
    </div>
<hr>
    <h1 class="container-fluid text-center my-3">User Information</h1>
    <div>
    <table id="mytable4" class="table" >
        <thead class="table-primary">
            <tr>
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Contact No</th>
                <th>pic</th>
            </tr>
            </thead>
            <tbody>
            <!-- <tr class='table-light'> -->
            <?php 
 
					require_once('conn.php');
				
						$sql = "select * from user order by rand() LIMIT 3";

						$result = mysqli_query($con,$sql);
                        $sr =1;
						if($result){
							while($row=mysqli_fetch_array($result)){
								echo"<tr class='table-light' style='text-align:center'>
									<td>".$sr++."</td>
									<td>".$row['uname'] ."</td>
									<td>".$row['email'] ."</td>
									<td>".$row['phone'] ."</td>
									<td> <img src = ". $row['image']." height=100px; style='width:40%;'/></td>
									</tr>";
									
							}
						}
						
					
				?>
                
            <!-- </tr> -->
</tbody>
        </table>
    </div>
    <hr>
    <div>
        <h1 class="container-fluid text-center my-3">Order Details</h1>
    <table id="mytable2"class="table">
        <thead class="table-primary">
            <tr>
                <th>Sr No.</th>
                <th>User Name</th>
                <th>Product Name</th>
                <th>price</th>
                <th>Quantity</th>
                <th>Size</th>
                <th>Order Date</th>
                <th>Image </th>
            </tr>
            </thead>
            <tbody>
            <?php 
                
                require_once('conn.php');
                                    
                    $sql = "SELECT ordered_item.pname,ordered_item.price,ordered_item.qty,ordered_item.size,ordered_item.odered,ordered_item.image, user.uname FROM ordered_item INNER JOIN user ON ordered_item.uid=user.uid order by rand() LIMIT 3";
                    
                    $result = mysqli_query($con,$sql);
                    $sr =1;
                    if($result){
                        while($row=mysqli_fetch_array($result)){
                            
                            $date= new DateTime($row['odered']) ;  

                            echo"<tr class='table-light'>
                                <td>".$sr++."</td>
                                <td>".$row['uname']."</td>
                                <td>".$row['pname'] ."</td>
                                <td>".$row['price'] ."</td>
                                <td>".$row['qty'] ."</td>
                                <td>".$row['size'] ."</td>
                                <td>".$date->format('Y-m-d')."</td>
                                <td> <img src = ../admin/". $row['image']." height=100px; style='width:75%;'/></td>
                                </tr>";
                                
                        }
                    
                    }	
                    else{
                        echo" Sorry this page is not working  ... Try after some time";
                    }
                
                    mysqli_close($con);
            ?>
</tbody>
        </table>
    </div>
    <hr>

</body>
</html>

<?php
  require_once "php/header.php";
?>
<body>
<header>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	  <a class="navbar-brand" href="./">Portal</a>
	
	  <div id="navbarNav" class="float-right">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="#">Features</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
	      </li>
	    </ul>
	  </div>
	</nav>
</header>

<section>
  <div class="container-fluid"> 
  	<div class="row">
      <?php require_once "php/sidebar.php"; ?>
  		<div class="col-md-10 mainbar p-4">
  			<div class="container-fluid">
  				<div class="row">
  					<div class="col-md-12 col-12">
  						<h6><a href="./dasboard">Dashboard</a> > <a href="./courses">Courses Registration</a></h6>
  					</div>
  					<div class="col-md-12 p-3 ">
               <div class="card">
                 <div class="p-4 row container-fluid">
                   <div class="col-6 col-md-6">
                     <p>Name: <span><?php echo  $getUserDetails['fullName']; ?></span></p>
                     <p>Phone: <span><?php echo  $getUserDetails['phone']; ?></span></p>
                     <p>Mail: <span><?php echo  $getUserDetails['email']; ?></span></p>
                   </div>
                   <div class="col-6 col-md-6">
                      <p>Matric No: <span><?php echo $_SESSION['matricNo']; ?></span> </p>
                      <p>Level: <span><?php echo $getUserDetails['level']; ?></span> </p>
                      <p>Department: <span><?php 
                                               $rows = select('departments', 'id', $getUserDetails['department'], $mysqli);
                                               echo  $rows['name']; 
                                            ?></span> </p>
                   </div>                   
                 </div>
                 <hr>
                 <div class="col-12 col-md-12">
                   <div class="" style="font-weight: bolder;">
                    <label>Select Your courses:</label>
                     <div class="table-responsive">
                       <form method="POST" id="regCourses">
                         <table class="table table-hover" id="myTable">
                           <thead>
                             <th>S/N</th>
                             <th>Title</th>
                             <th>Code</th>
                             <th>Type</th>
                             <th>Check</th>
                           </thead>
                           <tbody>
                            <?php
                              $select = $mysqli->prepare("SELECT * FROM courses WHERE level = ? AND department = ?");
                              $select->bind_param("ii", $getUserDetails['level'], $getUserDetails['department']);
                              $select->execute();
                              $res = $select->get_result();
                              $i = 1;
                              while ($rows = $res->fetch_assoc()) { ?>
                               <tr>
                                 <td><?php echo $i++; ?></td>
                                 <td><?php echo $rows['title']; ?></td>
                                 <td><?php echo $rows['name']; ?></td>
                                 <td><?php echo $rows['name']; ?></td>
                                 <td>
                                   <div class="form-group">
                                    <input type="checkbox" name="selectedCourse" class="selectedCourse" data-id="<?php echo $rows['id']; ?>" data-title="<?php echo $rows['name']; ?>">
                                   </div>
                                 </td>
                               </tr>
                             <?php }
                             ?>
  
                           </tbody>
                           <tfoot>
                             <th>S/N</th>
                             <th>Title</th>
                             <th>Code</th>
                             <th>Type</th>
                             <th>Check</th>
                           </tfoot>
                         </table>
                         <br>
                         <div class="form-group text-center">
                           <button type="submit" class="btn btn-primary btn-lg">Register Courses <span class="fa fa-spinner fa-spin"></span> </button>
                           <div id="resMsg">                         
                           </div>
                         </div>
                       </form>
                     </div>
                   </div>
                 </div>
               </div>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
  </div>
</section>


<?php
  require_once "php/footer.php";
 ?>










<!-- 






<h3> Frequently Asked Questions </h3>
<h5>Quickly Find Your Preferred Items By Filtering Search Results</h5>
<p>ibakaxpress has developed and continuously updates proprietary software algorithms to automatically monitor data for patterns, and quickly detect potential risks and violations.</p>

<h5>Inspect Product Details and Ratings & Reviews Before You Buy</h5>
<p>Inspecting details & reviews can help prevent surprises and confirm that an item meets your needs. Stronger ratings & reviews indicate safer, more trustworthy sellers.</p>

<h5>If You Have Outstanding Questions Or Concerns, Message The Seller Before You Buy</h5>
<p>If you have questions/concerns about a product, ibakaxpress makes it easy to contact the seller before you buy -- just click the 'Message Seller' button.</p>

<h5>How does ibakaxpress protect me from fake or substandard products?</h5>
<p>ibakaxpress has a formal Authentic Items Policy that prohibits the sale of counterfeit items, and our team continuously monitors items offered for sale. Sellers who are found to violate the policy may be banned from selling on ibakaxpress. If you suspect an item displayed on the website is not authentic, please contact trustandsafety@ibakaxpress.com.</p>

<h5>I just received my order and something is wrong, what should I do? What can I expect?</h5>
<p>If you recently received your order and something is wrong, please email help@ibakaxpress.com or call 0809 460 5555 or 01 460 5555 and provide details. Depending on the exact issue and whether you paid before delivery or paid on delivery, different resolutions can occur. But in all cases, ibakaxpress will offer support and will try to work with the seller to offer a resolution quickly, such as a repair, replacement, refund upon return, instant refund, or other form of compensation as applicable.</p>

<h5>How do I avoid fraudulent individuals posing as genuine sellers?</h5>
<p>We take various actions to keep fraudulent individuals out of our community including requiring sellers to undergo verification before listing products, but you can avoid negative fraud-related experiences by
1) pre-paying and 2) not paying into seller accounts before delivery if you choose to Pay on Delivery (POD).

• Pre-pay for your order. A great way to safeguard against negative experiences with sellers is to pre-pay for your order online when you checkout. By doing so, ibakaxpress has control of your funds for a limited period and can more easily refund you if things happen to go wrong.

• If you choose POD, do not pay until you receive your order. If you choose the Pay on Delivery payment method, as a general rule, do not pay directly to sellers until you receive your order. If a seller requests that you pay into his/her account before your order is delivered, please contact trustandsafety@ibakaxpress.com to verify. ibakaxpress advises that if you do internet bank transfers before delivery, you should pay only into the ibakaxpress accounts listed here.

If you feel that a seller is potentially fraudulent, please contact trustandsafety@ibakaxpress.com
</p>

<h5>Can I trust all sellers on ibakaxpress? How do I know which sellers to trust?</h5>
<p>ibakaxpress has several processes in place to make sure sellers are safe and worthy of your trust. All sellers go through verification processes and we continuously monitor seller behavior. In addition, you can inspect a seller's ratings and reviews -- stronger ratings & reviews indicate safer, more trustworthy sellers. Finally, our more established sellers can be identified by a "verified premium seller" badge when you search for an item. ibakaxpress regularly updates the list of verified premium sellers to account for changing seller behavior. We take our responsibility to provide a safe marketplace very seriously, but sometimes bad behavior does happen. If you feel that a seller has violated your trust by misrepresenting an item or otherwise acting inappropriately, please contact trustandsafety@ibakaxpress.com.
I appreciate ibakaxpress's efforts on my behalf. What can I do to help?
We thank you for you business and we will continue to make sure ibakaxpress remains the safest and most trusted place to buy and sell online in Nigeria. You can help by:
• paying online at checkout when you place an order (so we can offer you maximum protection, and help delivery couriers spend more time delivering and less time with cash/POS issues on delivery)

• making sure you are available by phone and in person to accept your delivery (so you and other members of our buyer community get orders delivered more quickly)

• providing honest ratings & reviews for all of your items after delivery (so you and other members of our buyer community have more information about items and sellers)

• interacting with us on Twitter or Facebook (so we can hear your feedback and suggestions directly)

• downloading our Android or iOS mobile app (so we can offer you special deals and additional mobile application security)

• referring us to your friends and family (so we can increase the size of our community and help more Nigerians experience safe & secure online shopping)</p> -->
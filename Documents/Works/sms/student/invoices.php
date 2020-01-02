<?php  
include('header.php');

?>

<div class="row">
                        <div class="col-sm-12 p-0">
                            <div class="main-header" style="margin-top: 0px;">
                               
                                <ol class="breadcrumb breadcrumb-title breadcrumb-arrow">
                                    <li class="breadcrumb-item"><a href="index-2.html"><i class="icofont icofont-home"></i></a>
                                    </li>
                                     <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="fee_type_list.php">Invoices List</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

<div class="row">
<div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-header-text">List Of Invoices</h5>
                           
                        </div>
                        <div class="card-block">
						<div class="table table-responsive">
						<table id="example" class="table table-striped"  width="100%">
 <?php
 $trans=$obj->Get_All_Data("select * from reciept 
 Join allocate_fee on reciept.alloc_fee_id=allocate_fee.alloc_fee_id 
 JOIN fee_type on reciept.fee_type=fee_type.fee_id
 JOIN student on reciept.std_id=student.uid where student.uid=".$_SESSION['uid']." and reciept.status=0");
 ?>
 <thead>
 <tr><th> S/N</th><th> Title</th><th>Description</th><th>Amount</th> <th>Pay</th></tr>
 </thead>
 <tbody>
 
 <?php
///looping through the dataset
$n=0;
 for($i=0;$i<count($trans);$i++){ 
 $n++;
 ?>
 <tr>
 <td><?php echo $n; ?></td>
 <td><?php echo $trans[$i]['title']; ?></td>
 <td><?php echo $trans[$i]['description']; ?></td>
 <td><?php echo $trans[$i]['amount'] ?></td>

 <td> 
 <a class=" waves-light btn btn-primary" onclick="payWithPaystack('<?php echo $trans[$i]['email'] ?>',<?php echo $trans[$i]['uid'] ?>,<?php echo $trans[$i]['amount'] ?>,<?php echo $trans[$i]['re_id'] ?>)"  ><i class="fa fa-money"></i></a></td>

 </tr>
  
<?php 
}
echo '</tbody>';

?>

 </table>
 </div>
                          </div>
                        </div>
                    </div>
                </div>


</div>
		
			<?php  
include('footer.php');
?>

						
						<script>
 
 $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
 
 
 </script>
 
  <script src="https://js.paystack.co/v1/inline.js"></script>
 
<script>
  function payWithPaystack(email,uid,amount2,reciept_id){
    var handler = PaystackPop.setup({
      key: 'pk_test_6d43948bb24e825517d29b3e2b5d903202f2625c',
      email: email,
      amount: amount2*100,
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      metadata: {
         custom_fields: [
            {
                display_name: "User Id",
                variable_name: "uid",
                value:uid
            }
         ]
      },
      callback: function(response){
		//console.log(response);
		doAsyncWork(reciept_id,response.reference);
      },
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
  
  function doAsyncWork(reciept_id,ref)
						{
							var jdata={"rid":reciept_id,"update_payment":"","ref":ref};
							//var formData=new FormData();
							//for
								$.ajax({
									type:"POST",
									url:"../controller/controller.php",
									data:jdata,
									success: function(response){
									if(response=="Payment Successfully")
									{
									
									//alert("Payment Successfully")
									}else
									{
											//alert(response)
									}
									}
								});
						}
</script>

	
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<script type="text/javascript">
	$(document).ready( function () {
	   // $('#myTable').DataTable();




        var courseReg = [];
	   $('.selectedCourse').click(function(){
          var id = $(this).data("id");
          var title = $(this).data("title");
          var array = {'id': id, 'title': title};
          
          if (checkIfExist(id, courseReg) > 0) {
          	var len = courseReg.length;
			   	for (var i = 0; i < len; i++) {
			   		if (courseReg[i].id === id) {
			   			courseReg.splice(i,1);
			   		}
			   	} 
          }else{
          	 courseReg.push(array);
          }
          console.log(courseReg);
	   })

	   function checkIfExist(id, array){
	   	var len = array.length; trues = 0;
	   	for (var i = 0; i < len; i++) {
	   		if (array[i]['id'] === id) {
	   			trues = trues + 1;
	   		}
	   	}
	   	 return trues;
	   }

	   $('#regCourses').submit(function(e){
	   	e.preventDefault();
	   	 $.ajax({
	   	 	url: 'php/controller.php',
	   	 	method: 'POST',
	   	 	data: 'datas='+JSON.stringify(courseReg),
	   	 	success: function(data){
	   	 		var datas = JSON.parse(data);
	   	 		if (datas['status'] === 1) {
	   	 			var msg = "<div class='alert alert-success'>"+datas['msg']+"</div>";
	   	 			$('#resMsg').html(msg)
	   	 		}else{
	   	 			var msg = "<div class='alert alert-danger'> Some course has already been registered "+datas['msg']+"</div>";
	   	 			$('#resMsg').html(msg)
	   	 		}
	   	 	}
	   	 })
	   })
	} );
</script>
</body>
</html>
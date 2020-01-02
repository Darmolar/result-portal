<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#submitSession').submit(function(e){
		e.preventDefault();
        var datas = new FormData(this);

          $.ajax({
          	url: 'php/controller.php',
          	method: 'POST',
          	data: datas,
          	success: function(data){
                var curData = JSON.parse(data);
                if(curData['msg'] ==  "Success"){
                	window.location = './sessions'
                }else{
                	alert(curData['msg'] );
                };
          	},
          	cache: false,
            contentType: false,
            processData: false
          })
	})

	$('#submitDepartment').submit(function(e){
		e.preventDefault();
        var datas = new FormData(this);

          $.ajax({
          	url: 'php/controller.php',
          	method: 'POST',
          	data: datas,
          	success: function(data){
                var curData = JSON.parse(data);
                if(curData['msg'] ==  "Success"){
                	window.location = './departments'
                }else{
                	alert(curData['msg'] );
                };
          	},
          	cache: false,
            contentType: false,
            processData: false
          })
	})

	$('#submitCourse').submit(function(e){
		e.preventDefault();
        var datas = new FormData(this);

          $.ajax({
          	url: 'php/controller.php',
          	method: 'POST',
          	data: datas,
          	success: function(data){
                var curData = JSON.parse(data);
                if(curData['msg'] ==  "Success"){
                	window.location = './courses'
                }else{
                	alert(curData['msg'] );
                };
          	},
          	cache: false,
            contentType: false,
            processData: false
          })
	})

  $('#submitResult').submit(function(e){
    e.preventDefault();
     var datas = new FormData(this);

      $.ajax({
        url: 'php/controller.php',
        method: 'POST',
        data: datas,
        success: function(data){
            var curData = JSON.parse(data);
            if(curData['msg'] ==  "Success"){
              window.location = './courses'
            }else{
              alert(curData['msg'] );
            };
        },
        cache: false,
        contentType: false,
        processData: false
      })
  })
})
</script>
<script type="text/javascript">
$(document).ready( function () {
   $('#myTable').DataTable();
} );
</script>

</body>
</html>
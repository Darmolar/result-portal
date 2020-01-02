</div>	
			</div>
			
<!-- Required Jqurey -->
<script src="../assets/js/jquery-3.1.1.min.js"></script>
<script src="../assets/js/jquery-ui.min.js"></script>
<script src="../assets/js/tether.min.js"></script>

<!-- Required Fremwork -->
<script src="../assets/js/bootstrap.min.js"></script>

<!-- waves effects.js -->
<script src="../assets/plugins/waves/js/waves.min.js"></script>

<!-- Scrollbar JS-->
<script src="../assets/plugins/slimscroll/js/jquery.slimscroll.js"></script>
<script src="../assets/plugins/slimscroll/js/jquery.nicescroll.min.js"></script>

<!--classic JS-->
<script src="../assets/plugins/search/js/classie.js"></script>

<!-- notification -->
<script src="../assets/plugins/notification/js/bootstrap-growl.min.js"></script>

<!-- Sparkline charts -->
<script src="../assets/plugins/charts/sparkline/js/jquery.sparkline.js"></script>

<!-- Counter js  -->
<script src="../assets/plugins/countdown/js/waypoints.min.js"></script>
<script src="../assets/plugins/countdown/js/jquery.counterup.js"></script>

<!-- custom js -->
<script type="text/javascript" src="../assets/js/main.js"></script>
<script type="text/javascript" src="../assets/pages/dashboard.js"></script>
<script type="text/javascript" src="../assets/pages/elements.js"></script>
<script src="../assets/js/menu.js"></script>

<!-- Model animation js -->
<script src="../assets/plugins/modal/js/classie.js"></script>
<script src="../assets/plugins/modal/js/modalEffects.js"></script>


<!-- calender js -->
<script src="../assets/plugins/calender/js/moment.min.js"></script>
<script src="../assets/plugins/calender/js/fullcalendar.min.js"></script>

	<!-- Select 2 js -->
		<script src="../assets/plugins/select2/js/select2.full.min.js"></script>

		
		<!-- Multi Select js -->
		<script src="../assets/plugins/multi-select/js/bootstrap-multiselect.js"></script>
		<script src="../assets/plugins/multi-select/js/jquery.multi-select.js"></script>
		<script type="text/javascript" src="../assets/plugins/multi-select/js/jquery.quicksearch.js"></script>




<!-- data-table js -->
<script src="../assets/plugins/data-table/js/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/data-table/js/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/data-table/js/jszip.min.js"></script>
<script src="../assets/plugins/data-table/js/pdfmake.min.js"></script>
<script src="../assets/plugins/data-table/js/vfs_fonts.js"></script>
<script src="../assets/plugins/data-table/js/buttons.print.min.js"></script>
<script src="../assets/plugins/data-table/js/buttons.html5.min.js"></script>
<script src="../assets/plugins/data-table/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/data-table/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/data-table/js/responsive.bootstrap4.min.js"></script>


<script>

 function notify(from, align, icon, type, animIn, animOut,response,status){
        $.growl({
            icon: icon,
            title: status,
            message:response,
            url: ''
        },{
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 30,
                y: 30
            },
            spacing: 10,
            z_index: 999999,
            delay: 2500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            icon_type: 'class',
            template: '<div data-growl="container" class="alert" role="alert">' +
            '<button type="button" class="close" data-growl="dismiss">' +
            '<span aria-hidden="true">&times;</span>' +
            '<span class="sr-only">Close</span>' +
            '</button>' +
            '<span data-growl="icon"></span>' +
            '<span data-growl="title"></span>' +
            '<span data-growl="message"></span>' +
            '<a href="#" data-growl="url"></a>' +
            '</div>'
        });
    };


</script>
</body>


<!-- Mirrored from ableproadmin.com/light/vertical/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 15 Mar 2017 21:01:56 GMT -->
</html>

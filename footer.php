
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <!--li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li-->
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy;
                    <?php 
                        $hoy = getdate(time());
                        echo $hoy["year"]."-0".$hoy["mon"];
                     ?>
                    <a href="">Gamificame</a>, Proyecto desarrollado con fines académicos para TC
                </p>
            </div>
        </footer>
        
    </div>   
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
    <script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<script src="assets/js/chartist.min.js"></script>
    <script src="assets/js/bootstrap-notify.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	<script src="assets/js/demo.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/chart-data.js"></script>
    <script src="assets/js/easypiechart.js"></script>
    <script src="assets/js/easypiechart-data.js"></script>
    <script src="assets/js/bootstrap-datepicker.js"></script>


<!--datatables js-->
    <!-- start: JavaScript-->

        <script src="assets/js/jquery-1.9.1.min.js"></script>
        <script src="assets/js/jquery-migrate-1.0.0.min.js"></script>
    
        <script src="assets/js/jquery-ui-1.10.0.custom.min.js"></script>
    
        <script src="assets/js/jquery.ui.touch-punch.js"></script>
    
        <script src="assets/js/modernizr.js"></script>
    
        <script src="assets/js/bootstrap.min.js"></script>
    
        <script src="assets/js/jquery.cookie.js"></script>
    
        <script src='assets/js/fullcalendar.min.js'></script>
    
        <script src='assets/js/jquery.dataTables.min.js'></script>

        <script src="assets/js/excanvas.js"></script>
        <script src="assets/js/jquery.flot.js"></script>
        <script src="assets/js/jquery.flot.pie.js"></script>
        <script src="assets/js/jquery.flot.stack.js"></script>
        <script src="assets/js/jquery.flot.resize.min.js"></script>
    
        <script src="assets/js/jquery.chosen.min.js"></script>
    
        <script src="assets/js/jquery.uniform.min.js"></script>
        
        <script src="assets/js/jquery.cleditor.min.js"></script>
    
        <script src="assets/js/jquery.noty.js"></script>
    
        <script src="assets/js/jquery.elfinder.min.js"></script>
    
        <script src="assets/js/jquery.raty.min.js"></script>
    
        <script src="assets/js/jquery.iphone.toggle.js"></script>
    
        <script src="assets/js/jquery.uploadify-3.1.min.js"></script>
    
        <script src="assets/js/jquery.gritter.min.js"></script>
    
        <script src="assets/js/jquery.imagesloaded.js"></script>
    
        <script src="assets/js/jquery.masonry.min.js"></script>
    
        <script src="assets/js/jquery.knob.modified.js"></script>
    
        <script src="assets/js/jquery.sparkline.min.js"></script>
    
        <script src="assets/js/counter.js"></script>
    
        <script src="assets/js/retina.js"></script>

        <script src="assets/js/custom.js"></script>




	<script type="text/javascript">
    	$(document).ready(function(){
        	window.location.hash="no-back-button";
            window.location.hash="Again-No-back-button" //chrome
            window.onhashchange=function(){window.location.hash="no-back-button";}
    	});

        !function ($) {
            $(document).on("click","ul.nav li.parent > a > span.icon", function(){        
                $(this).find('em:first').toggleClass("glyphicon-minus");      
            }); 
            $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
        }(window.jQuery);

        $(window).on('resize', function () {
          if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
        })
        $(window).on('resize', function () {
          if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
        })
    </script>
    
</html>
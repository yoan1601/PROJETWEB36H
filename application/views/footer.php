
    </div>

<!--  Footer Start  -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="footer__text">
                <div class="footer__logo">
                    <a href="#"><img src="img/logo.png" alt=""></a>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut<br> labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus
                    commodo viverra<br> maecenas accumsan lacus vel facilisis. </p>

            </div>
            <div class="footer__copyright">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>20232023202320232023 All rights
                    reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by Colorlib
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</div>
<!--  Footer End  -->

<!--  jQuery (Necessary for All JavaScript Plugins)  -->
<script src="./assets/js/jquery/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="./assets/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="./assets/js/bootstrap.min.js"></script>
<!-- Plugins js -->
<script src="./assets/js/plugins.js"></script>
<!-- Active js -->
<script src="./assets/js/active.js"></script><a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="fa fa-angle-up" aria-hidden="true"></i></a><a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up" aria-hidden="true"></i></a><a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up" aria-hidden="true"></i></a><a id="scrollUp" href="#top" style="display: none; position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up" aria-hidden="true"></i></a><a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: block;"><i class="fa fa-angle-up" aria-hidden="true"></i></a>


<!--   Core JS Files   -->
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>

<!--  Plugin for TypedJS, full documentation here: https://github.com/inorganik/CountUp.js -->
<script src="./assets/js/plugins/countup.min.js"></script>

<script src="./assets/js/plugins/choices.min.js"></script>

<script src="./assets/js/plugins/prism.min.js"></script>
<script src="./assets/js/plugins/highlight.min.js"></script>

<!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
<script src="./assets/js/plugins/rellax.min.js"></script>
<!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
<script src="./assets/js/plugins/tilt.min.js"></script>
<!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
<script src="./assets/js/plugins/choices.min.js"></script>


<!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
<script src="./assets/js/plugins/parallax.min.js"></script>
<!-- Control Center for Material UI Kit: parallax effects, scripts for the example pages etc -->
<!--  Google Maps Plugin    -->

<script src="./assets/js/material-kit.min.js?v=3.0.0" type="text/javascript"></script>


<script type="text/javascript">
    if (document.getElementById('state1')) {
        const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    }
    if (document.getElementById('state2')) {
        const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
        if (!countUp1.error) {
            countUp1.start();
        } else {
            console.error(countUp1.error);
        }
    }
    if (document.getElementById('state3')) {
        const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
        if (!countUp2.error) {
            countUp2.start();
        } else {
            console.error(countUp2.error);
        };
    }
</script>




</body>

</html>
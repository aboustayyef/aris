<div class="inner">
    <div id="signature">
        Al-Rayan International School, {{date('Y')}} &copy;
    </div>
    <div>
        <a href="{{route('login')}}?return={{Request::path()}}">Admin Login</a>
    </div>
	<!-- Jquery, use CDN in production -->
	<script src="{{asset('js/jquery/jquery.min.js')}}"></script>

	<!-- external assets. Merge in production -->
	<script src="{{asset('js/flexslider/jquery.flexslider-min.js')}}"></script>
	<script src="{{asset('js/hoverintent/hoverintent.min.js')}}"></script>

	<script src="{{asset('js/aris-min.js')}}"></script>
	
	<!-- Statcounter -->

	<script type="text/javascript">
	var sc_project=10380367; 
	var sc_invisible=1; 
	var sc_security="7bcdb6d9"; 
	var scJsHost = (("https:" == document.location.protocol) ?
	"https://secure." : "http://www.");
	document.write("<sc"+"ript type='text/javascript' src='" +
	scJsHost+
	"statcounter.com/counter/counter.js'></"+"script>");
	</script>
	<noscript><div class="statcounter"><a title="shopify
	analytics ecommerce tracking"
	href="http://statcounter.com/shopify/" target="_blank"><img
	class="statcounter"
	src="http://c.statcounter.com/10380367/0/7bcdb6d9/1/"
	alt="shopify analytics ecommerce
	tracking"></a></div></noscript>

	<!-- End of StatCounter Code -->


	<!-- Analytics -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-61584501-1', 'auto');
	  ga('send', 'pageview');

	</script>


</div>
@yield('additionalScripts')
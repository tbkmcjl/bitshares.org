	<! ========== CALL TO ACTION BAR ===============================================================================================
	=============================================================================================================================>


	<! ========== FOOTER ========================================================================================================
	=============================================================================================================================>

<section class="extra-nav">
    <div class="container">
      <article class="col-25">
        <h3>About</h3>
        <ul>
          <li><a href="about">Vision</a></li>
          <li><a href="about/faqs">FAQ's</a></li>
          <li><a href="about/videos">Videos</a></li>
        </ul>
      </article>
      <article class="col-25">
        <h3>Solutions</h3>
        <ul>
          <li><a href="solutions/bitsharesx">BITSHARES X</a></li>
          <li><a href="solutions/keyhotee">KEYHOTEE</a></li>
          <li><a href="solutions/ags-pts">PTS/AGS</a></li>
        </ul>
      </article>
      <article class="col-25">
        <h3>News</h3>
        <ul>
          <li><a href="news/">In The News</a></li>
          <li><a href="news/newsletter">Newsletter</a></li>
          <li><a href="blog" target="_blank">Blog</a></li>
        </ul>
      </article>
      <article class="col-25">
        <h3>Community</h3>
        <ul>
          <li><a href="http://bitsharestalk.org" target="_blank">Forum</a></li>
          <li><a href="/community/leaders/">Leaders</a></li>
          <li><a href="/community/partners/">Partners</a></li>
        </ul>
      </article>
      <div class="clear"></div>
    </div>
  </section>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/retina.js"></script>
    <script src="assets/js/invictus.js"></script>
	<script>
		$(window).scroll(function() {
			$('.si').each(function(){
			var imagePos = $(this).offset().top;

			var topOfWindow = $(window).scrollTop();
				if (imagePos < topOfWindow+400) {
					$(this).addClass("slideUp");
				}
			});
		});
	</script>
    <script>
	    $('#myTab a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		})
	</script>
  </body>
</html>

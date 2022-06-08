<?php
    $title = "error";
    include ("inc/main_head.php");
?>
<div id="page-404">
	<div class="content">
		<div class="title-on-desktop">
			<svg style="width: 600px; height: 200px" alignment-baseline="middle">
				<defs>
					<clipPath id="clip2">
						<path d="M 0 0 L 600 0 L 600 80 L 0 80 L 0 0 L 0 125 L 600 125 L 600 200 L 0 200 Z" />
					</clipPath>
				</defs>
				<text x="300" y="190"  style="width: 600px; height: 200px" text-anchor="middle" font-family="Lato" font-weight="700" font-size="250" fill="#ff5b5b" clip-path="url(#clip2)">500</text>
			</svg>
			<div class="title">INTERNAL SERVER ERROR</div>
		</div>
		<h1 class="title-on-mobile">Error 500: Internal server error</h1>
		<p>The server encountered an internal error of misconfiguration and was unable to complete your request</p>
		<a href="index" class="btn btn-success">Return home</a>
		
	</div>
</div>
<?php
    include ("inc/main_footer.php");
?>
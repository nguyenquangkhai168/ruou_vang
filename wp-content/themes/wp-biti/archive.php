<?php
	get_header();
	$queried_object = get_queried_object();
	global $post;
	global $wp_query;
?>

<main id="main" class="page-content w-100 float-left">
	<section class="section-blog post-layout">
		<div class="container">
			<div class="row">
				<div class="col-12 col-xl-9">
					<div class="post-new__left">
						<div class="section-title">
							<img class="symbol-mark" src="<?php bloginfo('template_url'); ?>/assets/images/symbol-mark.svg" />
							<h3><span class="section-title__text"><?php echo $queried_object->name; ?></span></h3>
							<a class="section-title__more mode-view active" id="list"></a>
							<a class="section-title__more mode-view" id="grid"></a>
						</div>
						<div class="filter-option row">
							<div class="col-lg-8">
								<div class="search-form d-flex align-items-center">
									<input id="searchArchive" class="search-field" type="text" placeholder="Tìm trong <?php echo $queried_object->name ?>" />
									<input id="searchArchiveButton" class="search-submit" type="button" value="" />
								</div>
							</div>
							<div class="col-lg-4">
								<select name="orderFilter" id="orderFilter">
									<option value="" selected disabled>Sắp xếp theo</option>
									<option value="DESC">Sắp xếp theo: Từ mới tới cũ</option>
									<option value="ASC">Sắp xếp theo: Từ cũ tới mới</option>
								</select>
							</div>
						</div>
						<div id="list-post" class="list-post">
							<?php
								$args = array(
									'posts_per_page' => -1,
									'post_type' 	 => 'post',
									'cat'       	 => $queried_object->term_id,
								);
								$myposts = get_posts( $args );
								foreach ( $myposts as $post ) : setup_postdata( $post );
									get_template_part( 'templates/posts/content', 'archive' );
								endforeach; wp_reset_postdata();
							?>
						</div>
					</div>
				</div>
				<div class="col-12 col-xl-3">
					<?php get_sidebar(); ?>
				</div>	            
			</div>
			<?php get_template_part( 'templates/posts/content', 'recent' ); ?>
		</div>
	</section>
</main><!--main-content-->
<script type="text/javascript">
	(function($){
		$(document).ready(function(){
			$("#orderFilter").on('change', function() {
				let sortValue = $("#orderFilter").val();
				let search = $("#searchArchive").val();

				$.ajax({
					type : "post",
					dataType : "html",
					url : '<?php echo admin_url('admin-ajax.php');?>',
					data : {
						action: "sorted",
						filter : sortValue, // $_POST['filter']
						category: <?php echo $queried_object->term_id ?>,
						tag: null,
						search: search
					},
					context: this,
					beforeSend: function(){
						$("#list-post").html(
							"<div style='text-align:center;margin-bottom:2rem'><div class='spinner-border text-warning' role='status'><span class='sr-only'></span></div></div>"
						);
					},
					success: function(response) {
						if(response) {
							$("#list-post").html(response);
						}
						else {
							alert('Đã có lỗi xảy ra');
							console.log(response);
						}
					},
					error: function( jqXHR, textStatus, errorThrown ){
						console.log( 'The following error occured: ' + textStatus, errorThrown );
					}
				});
			});

			$("#searchArchiveButton").click(function(){
				let sortValue = $("#orderFilter").val();
				let search = $("#searchArchive").val();

				$.ajax({
					type : "post",
					dataType : "html",
					url : '<?php echo admin_url('admin-ajax.php');?>',
					data : {
						action: "search",
						filter : sortValue,
						category: <?php echo $queried_object->term_id ?>,
						tag: null,
						search: search
					},
					context: this,
					beforeSend: function(){
						$("#list-post").html(
							"<div style='text-align:center;margin-bottom:2rem'><div class='spinner-border text-warning' role='status'><span class='sr-only'></span></div></div>"
						);
					},
					success: function(response) {
						if(response) {
							$("#list-post").html(response);
						}
						else {
							alert('Đã có lỗi xảy ra');
							console.log(response);
						}
					},
					error: function( jqXHR, textStatus, errorThrown ){
						console.log( 'The following error occured: ' + textStatus, errorThrown );
					}
				});
			});
		})
	})(jQuery)
</script>
<?php get_footer(); ?>

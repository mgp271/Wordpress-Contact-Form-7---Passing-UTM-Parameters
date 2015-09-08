<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.cookie.js"></script>
<script type="text/javascript">
	// MATTSTER UTM CODE
	jQuery(document).ready(function() {
	
	// Look for and create a cookie, mine is called "googy"
	<?php if (!isset($_COOKIE["googy"])): ?>
	
	// show once
	var query = location.search.substring(1);
	query = query.replace(/%20/g," ");
	query = query.replace(/%21/g,"!");
	query = query.replace(/%22/g,'"');
	query = query.replace(/%23/g,"#");
	query = query.replace(/%24/g,"$");
	query = query.replace(/%25/g,"%");
	query = query.replace(/%26/g,"&");
	query = query.replace(/%27/g,"'");
	query = query.replace(/%28/g,"(");
	query = query.replace(/%29/g,")");
	query = query.replace(/%2A/g,"*");
	query = query.replace(/%2B/g,"+");
	query = query.replace(/%2C/g,",");
	query = query.replace(/%2D/g,"-");
	query = query.replace(/%2E/g,".");
	query = query.replace(/%2F/g,"/");
	
	var date = new Date();
        var minutes = 60;
        date.setTime(date.getTime() + (minutes * 60 * 1000));
	// jQuery.cookie("googy", query, { expires: date, path: '/', domain: 'tvlift.com' });
	jQuery.cookie("googy", query, { expires: date, path: '/' });
	
	<?php endif; ?>
	
	// place all query string parameters in JSON
	var parameters = {};
	
	//if (location.search.substring(1).length) {
	if (jQuery.cookie("googy").length) {
		//var search_arr = location.search.substring(1).split("&");
		//var search_arr = jQuery.cookie("googy").split("&");
		for (var item in search_arr) {
			if (search_arr[item].length) { // lose this question if you want to send empty parameters
				var item_arr = search_arr[item].split("=");
				if (item_arr[1].length) {
                parameters[item_arr[0]] = item_arr[1];
				}
			}
		}
	}
	
	// If there are any values, do what you want to with them
	if (JSON.stringify(parameters) != '{}') {
		// Do it generically
		for (var prop in parameters) {
			jQuery("#" + prop).val(parameters[prop]);
		}

    // Or do it specifically I guess if your hidden field IDs don't match the query string names
	/*jQuery(document).ready(function () {
    jQuery('#utm_term').val(parameters.utm_term);
    jQuery('#utm_source').val(parameters.utm_source);
    jQuery('#utm_medium').val(parameters.utm_medium);
    jQuery('#utm_campaign').val(parameters.utm_campaign);
	});*/
	}
	});
</script>

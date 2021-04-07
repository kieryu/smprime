<?php



// CUSTOM POST METABOX FOR REPORT FILE

// ADD TO SUSTAINABLE REPORTS
add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'upload_report_metabox', // ID
      'Report File', // Title
      'report_file_metabox', // Callback (Construct function)
      'sustain_reports', //screen 
      'side' // Context
    );
 }
);
// ADD TO ANNUAL REPORTS
add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'upload_report_metabox', // ID
      'Report File', // Title
      'report_file_metabox', // Callback (Construct function)
      'annual_reports', //screen 
      'side' // Context
    );
 }
);

function report_file_metabox($post){
  $url = get_post_meta($post->ID, 'report_file_post', true); 
	$baseName = pathinfo($url);

	$fileName = ($baseName['basename']) ? $baseName['basename'] : '';

  ?>

  <input id="upload_report_file" hidden name="upload_report_file" type="text" value="<?= $url;?>"/>
  <p class="pdf-file-upload">File Uploaded: <br/>
		<?php if($fileName) { ?>
	  	<a id="pdfFile" class="pdf-file-link" href="<?= $url; ?>"><?= $fileName; ?></a>
	  <?php } else { ?>
			<strong>No File Uploaded</strong>
	  <?php } ?>
  </p>
  <input id="add_media_button" type="button" class="button insert-media add_media" value="Upload PDF" />
  <script>
  jQuery(document).ready( function($) {
    jQuery('#add_media_button').click(function() {
      window.send_to_editor = function(html) {
        pdfUrl = jQuery(html).attr('href')
        jQuery('#upload_report_file').val(pdfUrl);
        jQuery('#pdfFile').attr("href", pdfUrl);
        Filename = pdfUrl.split('/').pop();
        jQuery('#pdfFile').text(Filename);
        if(!jQuery('.pdf-file-link').length) {
        	jQuery('.pdf-file-upload strong').remove();
        	jQuery('.pdf-file-upload').append('<a id="pdfFile" class="pdf-file-link" href="'+pdfUrl+'">'+Filename+'</a>');
        }
      }

      formfield = jQuery('#upload_report_file').attr('name');
      // return false;
    }); // End on click
  });
  </script>
<?php
}

add_action('save_post', function ($post_id) {
  if (isset($_POST['upload_report_file'])){
    update_post_meta($post_id, 'report_file_post', $_POST['upload_report_file']);
  }
});


// CUSTOM META BOX FOR POSITION BOARD OF DIRECTORS
add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'bodposition_metabox', // ID
      'Position', // Title
      'bod_position_metabox', // Callback (Construct function)
      'board_directors', //screen 
      'side' // Context
    );
 }
);
function bod_position_metabox($post){
  $position = get_post_meta($post->ID, 'bod_position', true); 
 ?>
  <input id="bod_position" name="bod_position" type="text" value="<?= $position;?>"/>
<?php
}

add_action('save_post', function ($post_id) {
  if (isset($_POST['bod_position'])){
    update_post_meta($post_id, 'bod_position', $_POST['bod_position']);
  }
});

add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'bod_age_metabox', // ID
      'Age', // Title
      'bod_age_metabox', // Callback (Construct function)
      'board_directors', //screen 
      'side' // Context
    );
 }
);
function bod_age_metabox($post){
  $age = get_post_meta($post->ID, 'bod_age', true); 
 ?>
  <input id="bod_age" name="bod_age" type="text" value="<?= $age;?>"/>
<?php
}

add_action('save_post', function ($post_id) {
  if (isset($_POST['bod_age'])){
    update_post_meta($post_id, 'bod_age', $_POST['bod_age']);
  }
});

// CUSTOM META BOX FOR FEATURED POST


add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'featured_post', // ID
      'Featured Post', // Title
      'featured_post', // Callback (Construct function)
      'story_covid_response', //screen 
      'side' // Context
    );
 }
);
add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'featured_post', // ID
      'Featured Post', // Title
      'featured_post', // Callback (Construct function)
      'story_green_movement', //screen 
      'side' // Context
    );
 }
);
add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'featured_post', // ID
      'Featured Post', // Title
      'featured_post', // Callback (Construct function)
      'story_kasama_sm', //screen 
      'side' // Context
    );
 }
);
add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'featured_post', // ID
      'Featured Post', // Title
      'featured_post', // Callback (Construct function)
      'stories', //screen 
      'side' // Context
    );
 }
);

add_action(
  'add_meta_boxes',
  function(){
    add_meta_box(
      'featured_post', // ID
      'Featured Post', // Title
      'featured_post', // Callback (Construct function)
      'videos', //screen 
      'side' // Context
    );
 }
);


function featured_post($post){
  $featured = get_post_meta($post->ID, 'featured-post', true); 
 ?>

   <?php 
     if($post->post_type == 'stories' || $post->post_type == 'videos'): 
      $featuredHistory = get_post_meta($post->ID, 'featured-history', true); 
  ?>
      <p>
        <div class="sm-row-content">
          <label for="meta-checkbox-history">
              <input type="checkbox" name="featured-history" id="meta-checkbox-history" value="yes" <?php if ( isset ( $featuredHistory ) ) checked( $featuredHistory, 'yes' ); ?> />
              <?php _e( 'Featured to History', 'sm-textdomain' )?>
          </label>
        </div>
      </p>
   <?php endif; ?>
   <?php if($post->post_type == 'story_kasama_sm' || $post->post_type == 'story_covid_response' || $post->post_type == 'story_green_movement'): ?>
    <p>
      <div class="sm-row-content">
        <label for="meta-checkbox">
            <input type="checkbox" name="featured-post" id="meta-checkbox" value="yes" <?php if ( isset ( $featured ) ) checked( $featured, 'yes' ); ?> />
            <?php _e( 'Featured this Post', 'sm-textdomain' )?>
        </label>
      </div>
    </p>
  <?php endif; ?>
<?php
}

add_action('save_post', function ($post_id) {

  if (isset($_POST['featured-post']) == 'yes') {
    update_post_meta($post_id, 'featured-post', $_POST['featured-post']);
  } else {
    update_post_meta($post_id, 'featured-post', '');
  }
  if (isset($_POST['featured-homepage']) == 'yes') {
    update_post_meta($post_id, 'featured-homepage', $_POST['featured-homepage']);
  } else {
    update_post_meta($post_id, 'featured-homepage', '');
  }
  if (isset($_POST['featured-history']) == 'yes') {
    update_post_meta($post_id, 'featured-history', $_POST['featured-history']);
  } else {
    update_post_meta($post_id, 'featured-history', '');
  }

});


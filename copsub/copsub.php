<?php
/*
Plugin Name: Site Plugin for copsub.com
Description: Site specific code changes for copsub.com
*/

/*
----------------------------------------
[ @-> Widgets ]
----------------------------------------
*/	

/* CS News Widget ---------------------*/

// Creating the widget 
class csnews_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'csnews_widget', 

// Widget name will appear in UI
__('CS News Widget', 'csnews_widget_domain'), 

// Widget description
array( 'description' => __( 'CS News Widget', 'csnews_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

   $query =  new WP_Query( array(
      'no_found_rows'           => true, // counts posts, remove if pagination required
      'update_pos t_meta_cache' => false,  // grabs post meta, remove if post meta required
      'update_post_term_cache'  => false, // grabs terms, remove if terms required (category, tag...)
      'post_type'               => array( 'news' ),
      'posts_per_page'          => 3,
	  'order'                   => 'date'
   ) );

$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output

echo ( '<ul class="clr">' );
            
if ( $query->have_posts() ) : $query->have_posts();
    
while ( $query->have_posts() ) :	$query->the_post();
	echo ( '<li>' );
    printf ( '<span class="date">%s</span>', get_the_date( 'd.m.Y' ) );
    printf ( '<h2><a href="%s">%s</a></h2>', get_permalink(), get_the_title() );
	printf ( '<a class="newscontent" href="%s">%s</a>', get_permalink(), wp_trim_words( strip_tags( get_the_content( '', TRUE ) ), 20 ) );
	echo ( '</li>' );
                    
endwhile;
            
else :
endif;
    
wp_reset_postdata();
echo ( '</ul>' );
echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'csnews_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class csnews_widget ends here

// Register and load the widget
function csnews_load_widget() {
	register_widget( 'csnews_widget' );
}
add_action( 'widgets_init', 'csnews_load_widget' );


/* CS Twitter Widget ---------------------*/

// Creating the widget 
class cstwit_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'cstwit_widget', 

// Widget name will appear in UI
__('CS Twitter Widget', 'cstwit_widget_domain'), 

// Widget description
array( 'description' => __( 'CS Twitter Widget', 'cstwit_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

// Data getting code here


$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output


echo ( '<div>' );
echo ( '<a class="twitter-timeline" href="https://twitter.com/CopSub" data-widget-id="398783478361100288" data-tweet-limit="3" data-show-replies="false" data-border-color="#fff" data-chrome="nofooter noheader noborders noscrollbar transparent">Tweets by @CopSub</a>' );
echo ( '<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>' );
echo ( '</div>' );


echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'cstwit_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class cstwit_widget ends here

// Register and load the widget
function cstwit_load_widget() {
	register_widget( 'cstwit_widget' );
}
add_action( 'widgets_init', 'cstwit_load_widget' );





/* CS Youtube Widget ---------------------*/

// Creating the widget 
class csyoutube_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'csyoutube_widget', 

// Widget name will appear in UI
__('CS Youtube Widget', 'csyoutube_widget_domain'), 

// Widget description
array( 'description' => __( 'CS Youtube Widget', 'csyoutube_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

// Data getting code here


$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output


echo ( 'Dummy text');

echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'csyoutube_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class csyoutube_widget ends here

// Register and load the widget
function csyoutube_load_widget() {
	register_widget( 'csyoutube_widget' );
}
add_action( 'widgets_init', 'csyoutube_load_widget' );





/* CS Newsletter Widget ---------------------*/

// Creating the widget 
class csnewsletter_widget extends WP_Widget {

function __construct() {
parent::__construct(
// Base ID of your widget
'csnewsletter_widget', 

// Widget name will appear in UI
__('CS Newsletter Widget', 'csnewsletter_widget_domain'), 

// Widget description
array( 'description' => __( 'CS Newsletter Widget', 'csnewsletter_widget_domain' ), ) 
);
}

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {

// Data getting code here


$title = apply_filters( 'widget_title', $instance['title'] );
// before and after widget arguments are defined by themes
echo $args['before_widget'];
if ( ! empty( $title ) )
echo $args['before_title'] . $title . $args['after_title'];

// This is where you run the code and display the output


echo ( '<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">' );
echo ( '<style type="text/css">
	#mc_embed_signup{ }
	#mce-EMAIL { float: left;}
	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
</style> ' );
echo ( '<div id="mc_embed_signup">' );
echo ( '<form action="http://copenhagensuborbitals.us5.list-manage.com/subscribe/post?u=3f64c6f691faf3c39b11c92a4&amp;id=0922a9e460" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>' );
echo ( '<label for="mce-EMAIL">Subscribe to our mailing list</label>' );
echo ( '<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>' );
//    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
echo ( '<div style="position: absolute; left: -5000px;"><input type="text" name="b_3f64c6f691faf3c39b11c92a4_0922a9e460" value=""></div>' );
echo ( '<div><input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe" class="button"></div>' );
echo ( '</form>' );
echo ( '</div>' );

// <!--End mc_embed_signup-->

echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'New title', 'csnewsletter_widget_domain' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class csnewsletter_widget ends here

// Register and load the widget
function csnewsletter_load_widget() {
	register_widget( 'csnewsletter_widget' );
}
add_action( 'widgets_init', 'csnewsletter_load_widget' );













/*
------------------------------------------------------------------------------------------
[ @-> user handling ]
------------------------------------------------------------------------------------------
*/



    remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );







function copsub_user_profile_countries() {

	$countries = array(
			'AX' => 'Aland Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
	
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia-Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory',
			'BN' => 'Brunei Darussalam',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
	
			'KM' => 'Cambodia',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos (Keeling) Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CD' => 'Democratic Republic of Congo',
			'CG' => 'Congo',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'HR' => 'Croatia',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
	
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
	
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'ER' => 'Eriteria',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
	
			'FK' => 'Falkland Islands (Malvinas)',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
	
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea Bissau',
			'GY' => 'Guyana',
	
			'HM' => 'Heard Island / McDonald Islands',
			'VA' => 'Holy See (Vatican)',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
	
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
	
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
	
			'KZ' => 'Kazakhstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KR' => 'Korea, Republic of',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
	
			'LA' => 'Laos',
			'LV' => 'Latvia',
			'LS' => 'Lesotho',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
	
			'MO' => 'Macao',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia, Federated States of',
			'MD' => 'Moldova, Republic of',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
	
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'AN' => 'Netherlands Antilles',
			'NC' => 'New Calendonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
	
			'OM' => 'Oman',
	
			'PW' => 'Palau',
			'PS' => 'Palestine',
			'PA' => 'Panama',
			'PY' => 'Paraguay',
			'PG' => 'Papua New Guinea',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
	
			'QA' => 'Qatar',
	
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RS' => 'Republic of Serbia',
			'RU' => 'Russian Federation',
			'RW' => 'Rwanda',
	
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent / Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SK' => 'Slovakia',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia / South Sandwich',
			'ES' => 'Spain',
			'LK' => 'Sri Lanka',
			'SR' => 'Suriname',
			'SJ' => 'Svalbard and Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
	
			'TW' => 'Taiwan, Province of China',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania, United Republic of',
			'TH' => 'Thailand',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
	
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'US' => 'United States',
			'UM' => 'US Minor Outlying Islands',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
	
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'VG' => 'Virgin Islands, British',
			'VI' => 'Virgin Islands, U.S.',
	
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
	
			'YE' => 'Yemen',
	
			'ZM' => 'Zambia'
		);
		
		return $countries;

}









/* Stop Adding Functions Below this Line */










?>

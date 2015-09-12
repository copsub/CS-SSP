<?php
/*
Plugin Name: Site Plugin for copsub.com
Description: Site specific code changes for copsub.com
*/

function copsub_stylesheet() 
{
	wp_enqueue_style( 'copsub-plugin', plugins_url('copsub.css', __FILE__) );

//	wp_enqueue_style( 'copsub-fancybox', plugins_url('fancybox/source/jquery.fancybox.css', __FILE__), array(), '2.1.5', 'screen' );
//	wp_enqueue_style( 'copsub-fancybox-buttons', plugins_url('fancybox/source/helpers/jquery.fancybox-buttons.css', __FILE__), array(), '1.0.5', 'screen' );
//	wp_enqueue_script( 'copsub-fancybox-pack', plugins_url('fancybox/source/jquery.fancybox.pack.js', __FILE__), array('jquery'), '2.1.5' );
//	wp_enqueue_script( 'copsub-fancybox-buttons', plugins_url('fancybox/source/helpers/jquery.fancybox-buttons.js', __FILE__), array('jquery'), '1.0.5' );
//	wp_enqueue_script( 'copsub-fancybox-media', plugins_url('fancybox/source/helpers/jquery.fancybox-media.js', __FILE__), array('jquery'), '1.0.6' );

//	wp_enqueue_style( 'copsub-fancybox-thumbs', plugins_url('fancybox/source/helpers/jquery.fancybox-thumbs.css', __FILE__), array(), '1.0.7', 'screen' );
//	wp_enqueue_script( 'copsub-fancybox-thumbs', plugins_url('fancybox/source/helpers/jquery.fancybox-thumbs.js', __FILE__), array('jquery'), '1.0.7' );

}

// Disabled for old theme
add_action('wp_enqueue_scripts', 'copsub_stylesheet');


/*
----------------------------------------
[ @-> Widgets ]
----------------------------------------
*/	

include( plugin_dir_path( __FILE__ ) . 'widgets/cs_support_widget.php');
include( plugin_dir_path( __FILE__ ) . 'widgets/cs_watchus_widget.php');
include( plugin_dir_path( __FILE__ ) . 'widgets/cs_facts_widget.php');
include( plugin_dir_path( __FILE__ ) . 'widgets/cs_externalvideo_widget.php');
include( plugin_dir_path( __FILE__ ) . 'widgets/cs_imagetag_widget.php');
include( plugin_dir_path( __FILE__ ) . 'widgets/cs_posttag_widget.php');
include( plugin_dir_path( __FILE__ ) . 'widgets/cs_livestream_widget.php');

include( plugin_dir_path( __FILE__ ) . 'csfancybox2.php');


/*
------------------------------------------------------------------------------------------
[ @-> sandbox button ]
------------------------------------------------------------------------------------------
*/

include( plugin_dir_path( __FILE__ ) . 'lib/sandbox_button.php');



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

function get_youtube_streaming_url_from_text_file(){
  $text_file_path = "/home/streamteam/youtubelink.txt";
  if( file_exists($text_file_path) && is_readable($text_file_path)) {
    return trim(file_get_contents($text_file_path));
  }else{
    return "link_not_available";
  }
}

/* This function makes sure all other plugins are loaded before  */
function copsub_plugin_postload() {

/*
------------------------------------------------------------------------------------------
[ @-> ACF Settings Page ]
------------------------------------------------------------------------------------------
*/

include( plugin_dir_path( __FILE__ ) . 'lib/acf_settings.php');

}

add_action( 'plugins_loaded', 'copsub_plugin_postload', 300);

/* Stop Adding Functions Below this Line */

?>

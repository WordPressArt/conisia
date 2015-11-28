<?php

add_action('init', 'of_options');
if (!function_exists('of_options')) {

    function of_options() {
        // VARIABLES
        $themename = function_exists('wp_get_theme') ? wp_get_theme() : get_current_theme();
        $themename = $themename['Name'];
        $shortname = "of";
        // Populate OptionsFramework option in array for use in theme
        global $of_options;
        $of_options = get_option('of_options');
        $file_rename = array("on" => "On", "off" => "Off");
        //$home_page_blog = array("on" => "On", "off" => "Off");
        //Stylesheet Reader
        $alt_stylesheets = array("black" =>
            "black", "brown" => "brown", "blue" => "blue", "green" => "green", "pink" => "pink", "purple" => "purple", "red" => "red", "yellow" => "yellow");
        //Stylesheet Reader
        $lan_stylesheets = array("Default" => "Default", "rtl" => "rtl");
        // Test data
        $test_array = array("one" => "One", "two" => "Two", "three" => "Three", "four" => "Four", "five" => "Five");
        // Multicheck Array
        $multicheck_array = array("one" => "French Toast", "two" => "Pancake", "three" => "Omelette", "four" => "Crepe", "five" => "Waffle");
        // Multicheck Defaults
        $multicheck_defaults = array("one" => "1", "five" => "1");
        // Background Defaults
        $background_defaults = array('color' => '', 'image' => '', 'repeat' => 'repeat', 'position' => 'top center', 'attachment' => 'scroll');
        // Home page slider on/off option
        $home_page_slider = array("on" => "On", "off" => "Off");
	// home page blog post on/off options
        $home_page_feature = array("on" => __("On", 'colorway'), "off" => __("Off", 'colorway'));
        $home_page_blog = array("on_with_sidebar" => __("On( With Sidebar )", 'colorway'), "off" => __("Off", 'colorway'));
        $home_page_testimonial = array("on" => __("On", 'colorway'), "off" => __("Off", 'colorway'));
        // Home page blog post count
        $home_page_blog_post = array("3" => 3, "5" => 5, "10" => 10, "15" => 15);
// Pull all the categories into an array
	$slider_option = array("slider_style_1" => "slider style 1", "slider_style_2" => "Slider Style 2");
        $options_categories = array();
        $options_categories_obj = get_categories();
        foreach ($options_categories_obj as $category) {
            $options_categories[$category->cat_ID] = $category->cat_name;
        }
        // Pull all the pages into an array
        $options_pages = array();
        $options_pages_obj = get_pages('sort_column=post_parent,menu_order');
        $options_pages[''] = 'Select a page:';
        foreach ($options_pages_obj as $page) {
            $options_pages[$page->ID] = $page->post_title;
        }
        // If using image radio buttons, define a directory path
        $imagepath = get_bloginfo('stylesheet_directory') . '/images/';
        $options = array();
        $options[] = array("name" => __("General Settings", 'colorway'),
            "type" => "heading");

        $options[] = array("name" => __("Custom Logo", 'colorway'),
            "desc" => __("Upload a logo for your Website. The suitable size for the logo is 215px width x 55px height but it can be varied.", 'colorway'),
            "id" => "colorway_logo",
            "type" => "upload");

        $options[] = array("name" => __("Custom Favicon", 'colorway'),
            "desc" => __("Here you can upload a Favicon for your Website. Specified size is 16px x 16px.", 'colorway'),
            "id" => "colorway_favicon",
            "type" => "upload");

        $options[] = array("name" => __("Contact Number For Tap To Call Feature", 'colorway'),
            "desc" => __("Mention your contact number here through which users can interact to you directly. This feature is called tap to call and this will work when the user will access your website through mobile phones or iPhone.", 'colorway'),
            "id" => "colorway_contact_number",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => __("Google Tracking Code", 'colorway'),
            "desc" => __("Go to http://www.google.co.in/analytics/ and create an account by mentioning the details of your website and get a tracking code which you can paste here to track your website statistics regularly.", 'colorway'),
            "id" => "colorway_analytics",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => __("Background Image", 'colorway'),
            "desc" => __("Choose a suitable background image that will complement your website.", 'colorway'),
            "id" => "inkthemes_bodybg",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => __("Front Page On/Off", 'colorway'),
            "desc" => __("If the front page option is active then home page will appear otherwise blog page will display.", 'colorway'),
            "id" => "re_nm",
            "std" => "on",
            "type" => "radio",
            "options" => $file_rename);
//****=============================================================================****//
//****-----------This code is used for creating slider settings--------------------****//	
//****=============================================================================****//		
        $options[] = array("name" => __("Slider Settings", 'colorway'),
            "type" => "heading");
        $options[] = array("name" => __("Home Page slider option On/Off", 'colorway'),
            "desc" => __("Turn on or off the home page slider Option as per your requirement.", 'colorway'),
            "id" => "inkthemes_homepage_slider_feature_option",
            "std" => "on",
            "type" => "radio",
            "options" => $home_page_slider);
        //Slider Speed Setting	
        $options[] = array("name" => __("Slider Speed", 'colorway'),
            "desc" => __("Set the speed of the slider in milliseconds. For e.g. if you want to set the speed of the slider for 8 seconds then enter 8000 in the field or if you want to set the slider speed for 2.5 seconds then enter 2500 in the field.", 'colorway'),
            "id" => "colorway_slide_speed",
            "std" => "3000",
            "type" => "text");
			
        $options[] = array("name" => __("First Slider Image", 'colorway'),
            "desc" => __("Upload the First image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage1",
            "std" => "",
            "type" => "upload");

        $options[] = array("name" => __("First Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the First slider.", 'colorway'),
            "id" => "colorway_slideheading1",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => __("Link for First slider", 'colorway'),
            "desc" => __("Mention the URL for First image.", 'colorway'),
            "id" => "colorway_slidelink1",
            "std" => "",
            "type" => "text");

        $options[] = array("name" => __("First Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the First slider heading.", 'colorway'),
            "id" => "colorway_slidedescription1",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Second Slider Image", 'colorway'),
            "desc" => __("Upload the Second image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage2",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Second Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Second slider.", 'colorway'),
            "id" => "colorway_slideheading2",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Link for Second slider", 'colorway'),
            "desc" => __("Mention the URL for Second image.", 'colorway'),
            "id" => "colorway_slidelink2",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Second Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Second slider heading.", 'colorway'),
            "id" => "colorway_slidedescription2",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Third Slider Image", 'colorway'),
            "desc" => __("Upload the Third image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage3",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Third Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Third slider.", 'colorway'),
            "id" => "colorway_slideheading3",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Link for Third slider", 'colorway'),
            "desc" => __("Mention the URL for Third image.", 'colorway'),
            "id" => "colorway_slidelink3",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Third Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Third slider heading.", 'colorway'),
            "id" => "colorway_slidedescription3",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Fourth Slider Image", 'colorway'),
            "desc" => __("Upload the Fourth image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage4",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Fourth Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Fourth slider.", 'colorway'),
            "id" => "colorway_slideheading4",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Link for Fourth slider", 'colorway'),
            "desc" => __("Mention the URL for Fourth image.", 'colorway'),
            "id" => "colorway_slidelink4",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Fourth Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Fourth slider heading.", 'colorway'),
            "id" => "colorway_slidedescription4",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Fifth Slider Image", 'colorway'),
            "desc" => __("Upload the Fifth image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage5",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Fifth Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Fifth slider.", 'colorway'),
            "id" => "colorway_slideheading5",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Link for Fifth slider", 'colorway'),
            "desc" => __("Mention the URL for Fifth image.", 'colorway'),
            "id" => "colorway_slidelink5",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Fifth Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Fifth slider heading.", 'colorway'),
            "id" => "colorway_slidedescription5",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Sixth Slider Image", 'colorway'),
            "desc" => __("Upload the Sixth image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage6",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Sixth Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Sixth slider.", 'colorway'),
            "id" => "colorway_slideheading6",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Link for Sixth slider", 'colorway'),
            "desc" => __("Mention the URL for Sixth image.", 'colorway'),
            "id" => "colorway_slidelink6",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Sixth Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Sixth slider heading.", 'colorway'),
            "id" => "colorway_slidedescription6",
            "std" => "",
            "type" => "textarea");
        //****------Seventh Slider------****//
        $options[] = array("name" => __("Seventh Slider Image", 'colorway'),
            "desc" => __("Upload the Seventh image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage7",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Seventh Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Seventh slider.", 'colorway'),
            "id" => "colorway_slideheading7",
            "std" => "",
            "type" => "textarea");        
        $options[] = array("name" => __("Link for Seventh slider", 'colorway'),
            "desc" => __("Mention the URL for Seventh image.", 'colorway'),
            "id" => "colorway_slidelink7",
            "std" => "",
            "type" => "text");        
        $options[] = array("name" => __("Seventh Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Seventh slider heading.", 'colorway'),
            "id" => "colorway_slidedescription7",
            "std" => "",
            "type" => "textarea");
        //****------Eighth Slider------****//
        $options[] = array("name" => __("Eighth Slider Image", 'colorway'),
            "desc" => __("Upload the Eighth image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage8",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Eighth Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Eighth slider.", 'colorway'),
            "id" => "colorway_slideheading8",
            "std" => "",
            "type" => "textarea");        
        $options[] = array("name" => __("Link for Eighth slider", 'colorway'),
            "desc" => __("Mention the URL for Eighth image.", 'colorway'),
            "id" => "colorway_slidelink8",
            "std" => "",
            "type" => "text");        
        $options[] = array("name" => __("Eighth Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Eighth slider heading.", 'colorway'),
            "id" => "colorway_slidedescription8",
            "std" => "",
            "type" => "textarea");
        //****------Ninth Slider------****//
        $options[] = array("name" => __("Ninth Slider Image", 'colorway'),
            "desc" => __("Upload the Ninth image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage9",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Ninth Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Ninth slider.", 'colorway'),
            "id" => "colorway_slideheading9",
            "std" => "",
            "type" => "textarea");        
        $options[] = array("name" => __("Link for Ninth slider", 'colorway'),
            "desc" => __("Mention the URL for Ninth image.", 'colorway'),
            "id" => "colorway_slidelink9",
            "std" => "",
            "type" => "text");        
        $options[] = array("name" => __("Ninth Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Ninth slider heading.", 'colorway'),
            "id" => "colorway_slidedescription9",
            "std" => "",
            "type" => "textarea");
        //****------Tenth Slider------****//
        $options[] = array("name" => __("Tenth Slider Image", 'colorway'),
            "desc" => __("Upload the Tenth image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage10",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Tenth Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Tenth slider.", 'colorway'),
            "id" => "colorway_slideheading10",
            "std" => "",
            "type" => "textarea");        
        $options[] = array("name" => __("Link for Tenth slider", 'colorway'),
            "desc" => __("Mention the URL for Tenth image.", 'colorway'),
            "id" => "colorway_slidelink10",
            "std" => "",
            "type" => "text");        
        $options[] = array("name" => __("Tenth Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Tenth slider heading.", 'colorway'),
            "id" => "colorway_slidedescription10",
            "std" => "",
            "type" => "textarea");
        //****------Eleventh Slider------****//
        $options[] = array("name" => __("Eleventh Slider Image", 'colorway'),
            "desc" => __("Upload the Eleventh image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage11",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Eleventh Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Eleventh slider.", 'colorway'),
            "id" => "colorway_slideheading11",
            "std" => "",
            "type" => "textarea");        
        $options[] = array("name" => __("Link for Eleventh slider", 'colorway'),
            "desc" => __("Mention the URL for Eleventh image.", 'colorway'),
            "id" => "colorway_slidelink11",
            "std" => "",
            "type" => "text");        
        $options[] = array("name" => __("Eleventh Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Eleventh slider heading.", 'colorway'),
            "id" => "colorway_slidedescription11",
            "std" => "",
            "type" => "textarea");
        //****------Twelfth Slider------****//
        $options[] = array("name" => __("Twelfth Slider Image", 'colorway'),
            "desc" => __("Upload the Twelfth image for the slider. Recommended size is 1171px width x 526px height.", 'colorway'),
            "id" => "colorway_slideimage12",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Twelfth Slider Heading", 'colorway'),
            "desc" => __("Mention the heading for the Twelfth slider.", 'colorway'),
            "id" => "colorway_slideheading12",
            "std" => "",
            "type" => "textarea");        
        $options[] = array("name" => __("Link for Twelfth slider", 'colorway'),
            "desc" => __("Mention the URL for Twelfth image.", 'colorway'),
            "id" => "colorway_slidelink12",
            "std" => "",
            "type" => "text");        
        $options[] = array("name" => __("Twelfth Slider Description", 'colorway'),
            "desc" => __("Here mention a short description for the Twelfth slider heading.", 'colorway'),
            "id" => "colorway_slidedescription12",
            "std" => "",
            "type" => "textarea");
//****=============================================================================****//
//****-----------This code is used for creating home page feature content----------****//	
//****=============================================================================****//	
        $options[] = array("name" => __("Home Page Settings", 'colorway'),
            "type" => "heading");
        
         $options[] = array("name" => __("Home Page Feature Box Area On/Off", 'colorway'),
            "desc" => __("Turn on or off the home page Feature Box as per your requirement.", 'colorway'),
            "id" => "inkthemes_homepage_feature_box_option",
            "std" => "on",
            "type" => "radio",
            "options" => $home_page_feature);
			
        $options[] = array("name" => __("Feature Text Heading", 'colorway'),
            "desc" => __("Mention the text (punch line) for feature heading here which will display just below the slider.", 'colorway'),
            "id" => "inkthemes_mainheading",
            "std" => "",
            "type" => "textarea");
        //***Code for first column***//
        $options[] = array("name" => __("First Feature Column Image", 'colorway'),
            "desc" => __("Upload the image for the First column. Specified size is 196px width x 114px height.", 'colorway'),
            "id" => "inkthemes_fimg1",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("First Feature Column Heading", 'colorway'),
            "desc" => __("Here mention the heading for the First column.", 'colorway'),
            "id" => "inkthemes_headline1",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("First Feature Link URL", 'colorway'),
            "desc" => __("Mention the URL here to link the image to any pages.", 'colorway'),
            "id" => "inkthemes_link1",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("First Feature Column Description", 'colorway'),
            "desc" => __("Mention the short description for the First column heading.", 'colorway'),
            "id" => "inkthemes_feature1",
            "std" => "",
            "type" => "textarea");
        //***Code for second column***//	
        $options[] = array("name" => __("Second Feature Image", 'colorway'),
            "desc" => __("Upload the image for the second column. Specified size is 196px width x 114px height.", 'colorway'),
            "id" => "inkthemes_fimg2",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Second Feature Column Heading", 'colorway'),
            "desc" => __("Here mention the heading for the second column.", 'colorway'),
            "id" => "inkthemes_headline2",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Second Feature Link URL", 'colorway'),
            "desc" => __("Mention the URL here to link the image to any pages.", 'colorway'),
            "id" => "inkthemes_link2",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Second Feature Column Description", 'colorway'),
            "desc" => __("Mention the short description for the second column heading.", 'colorway'),
            "id" => "inkthemes_feature2",
            "std" => "",
            "type" => "textarea");
        //***Code for third column***//	
        $options[] = array("name" => __("Third Feature Image", 'colorway'),
            "desc" => __("Upload the image for the third column. Specified size is 196px width x 114px height.", 'colorway'),
            "id" => "inkthemes_fimg3",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Third Feature Column Heading", 'colorway'),
            "desc" => __("Here mention the heading for the third column.", 'colorway'),
            "id" => "inkthemes_headline3",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Third Feature Link URL", 'colorway'),
            "desc" => __("Mention the URL here to link the image to any pages.", 'colorway'),
            "id" => "inkthemes_link3",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Third Feature Column Description", 'colorway'),
            "desc" => __("Mention the short description for the third column heading.", 'colorway'),
            "id" => "inkthemes_feature3",
            "std" => "",
            "type" => "textarea");
        //***Code for fourth column***//	
        $options[] = array("name" => __("Fourth Feature Image", 'colorway'),
            "desc" => __("Upload the image for the Fourth column. Specified size is 196px width x 114px height.", 'colorway'),
            "id" => "inkthemes_fimg4",
            "std" => "",
            "type" => "upload");
        $options[] = array("name" => __("Fourth Feature Column Heading", 'colorway'),
            "desc" => __("Here mention the heading for the Fourth column.", 'colorway'),
            "id" => "inkthemes_headline4",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Fourth Feature Link URL", 'colorway'),
            "desc" => __("Mention the URL here to link the image to any pages.", 'colorway'),
            "id" => "inkthemes_link4",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Fourth Feature Column Description", 'colorway'),
            "desc" => __("Mention the short description for the Fourth column heading.", 'colorway'),
            "id" => "inkthemes_feature4",
            "std" => "",
            "type" => "textarea");
			
		//***Code for unlimited column***//			
		$options[] = array("name" => "Add unlimited Feature Box",
                "desc" => "Enter the shortcode to add more feature boxes. for more description please read the readme.txt file of theme",
                "id" => "inkthemes_featurebox_unlimited",
                "std" => "",
                "type" => "textarea");
				
		$options[] = array("name" => __("Home Page Widget Section Heading", 'colorway'),
            "desc" => __("Enter your text for homepage Widget Section heading.", 'colorway'),
            "id" => "inkthemes_widget_head",
            "std" => "",
            "type" => "textarea");
			
		$options[] = array("name" => __("Home Page Blog Description", 'colorway'),
            "desc" => __("Enter your text for homepage Widget Section Description.", 'colorway'),
            "id" => "inkthemes_widget_desc",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => __("Home Page Blog Heading", 'colorway'),
            "desc" => __("Enter your text for homepage blog heading.", 'colorway'),
            "id" => "inkthemes_blog_head",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => __("Home Page Blog Feature Area On/Off", 'colorway'),
            "desc" => __("Turn on or off the home page blog feature as per your requirement.", 'colorway'),
            "id" => "inkthemes_homepage_blog_feature_option",
            "std" => "on_with_sidebar",
            "type" => "radio",
            "options" => $home_page_blog);

		$options[] = array("name" => __("Home Page Testimonial Setting", 'colorway'),
            "type" => "heading");
                
             $options[] = array("name" => __("Home Page Testimonial Feature Area On/Off", 'colorway'),
            "desc" => __("Turn on or off the home page Testimonial feature as per your requirement.", 'colorway'),
            "id" => "inkthemes_homepage_testimonial_option",
            "std" => "on",
            "type" => "radio",
            "options" => $home_page_testimonial);
			
		$options[] = array("name" => __("Testimonial Main Heading", 'colorway'),
            "desc" => __("Here mention the text testimonial Section Main Description", 'colorway'),
            "id" => "inkthemes_testimonial_main_head",
            "std" => "",
            "type" => "textarea");
			
		$options[] = array("name" => __("Testimonial Main Description", 'colorway'),
            "desc" => __("Here mention the text testimonial Section Description", 'colorway'),
            "id" => "inkthemes_testimonial_main_desc",
            "std" => "",
            "type" => "textarea");

        $options[] = array("name" => __("First Testimonial Description", 'colorway'),
            "desc" => __("Here mention the first testimonial description of client", 'colorway'),
            "id" => "inkthemes_testimonial",
            "std" => "",
            "type" => "textarea");
			
		$options[] = array("name" => __("First Testimonial Image", 'colorway'),
            "desc" => __("Here mention the first testimonial Image of client", 'colorway'),
            "id" => "inkthemes_testimonial_img",
            "std" => "",
            "type" => "upload");	

		$options[] = array("name" => __("First Testimonial Name", 'colorway'),
            "desc" => __("Here mention the name of  testimonial name of client", 'colorway'),
            "id" => "inkthemes_testimonial_name",
            "std" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Second Testimonial Description", 'colorway'),
            "desc" => __("Here mention the Second testimonial description of client", 'colorway'),
            "id" => "inkthemes_testimonial_2",
            "std" => "",
            "type" => "textarea");
			
		$options[] = array("name" => __("Second Testimonial Image", 'colorway'),
            "desc" => __("Here mention the Second testimonial Image of client", 'colorway'),
            "id" => "inkthemes_testimonial_img_2",
            "std" => "",
            "type" => "upload");	

		$options[] = array("name" => __("Second Testimonial Name", 'colorway'),
            "desc" => __("Here mention the name of  testimonial name of client", 'colorway'),
            "id" => "inkthemes_testimonial_name_2",
            "std" => "",
            "type" => "text");
			
		$options[] = array("name" => __("Third Testimonial Description", 'colorway'),
            "desc" => __("Here mention the Third testimonial description of client", 'colorway'),
            "id" => "inkthemes_testimonial_3",
            "std" => "",
            "type" => "textarea");
			
		$options[] = array("name" => __("Third Testimonial Image", 'colorway'),
            "desc" => __("Here mention the Third testimonial Image of client", 'colorway'),
            "id" => "inkthemes_testimonial_img_3",
            "std" => "",
            "type" => "upload");	

		$options[] = array("name" => __("Third Testimonial Name", 'colorway'),
            "desc" => __("Here mention the name of  testimonial name of client", 'colorway'),
            "id" => "inkthemes_testimonial_name_3",
            "std" => "",
            "type" => "text");	
                
            //*** Code for unlimited Testimonial ***//			
		$options[] = array("name" => "Add unlimited Testimonial",
                "desc" => "Enter the shortcode to add more Testimonial. for more description please read the readme.txt file of theme",
                "id" => "inkthemes_testimonial_unlimited",
                "std" => "",
                "type" => "textarea");
		
//****=============================================================================****//
//****-----------This code is used for creating color styleshteet options----------****//							
//****=============================================================================****//				
        $options[] = array("name" => __("Styling Options", 'colorway'),
            "type" => "heading");
        $options[] = array("name" => __("Theme Stylesheet", 'colorway'),
            "desc" => __("Select any desired color for the theme from different available colors.", 'colorway'),
            "id" => "colorway_altstylesheet",
            "std" => "green",
            "type" => "select",
            "options" => $alt_stylesheets);
        $options[] = array("name" => __("Theme Language", 'colorway'),
            "desc" => __("By default the theme content displays from left to right which you can change to right to left i.e. switching it to RTL.", 'colorway'),
            "id" => "colorway_lanstylesheet",
            "std" => "Default",
            "type" => "select",
            "options" => $lan_stylesheets);
        $options[] = array("name" => __("Custom CSS", 'colorway'),
        "desc" => __("Quickly add some custom CSS code to your theme by writing the code in this block.", 'colorway'),
        "id" => "colorway_customcss",
        "std" => "",
        "type" => "textarea");
        $options[] = array("name" => __("Footer Settings", 'colorway'),
            "type" => "heading");
        $options[] = array("name" => __("Facebook URL", 'colorway'),
            "desc" => __("Mention the URL of your Facebook Link here. If you have one.", 'colorway'),
            "id" => "colorway_facebook",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Twitter URL", 'colorway'),
            "desc" => __("Mention the URL of your Twitter Link here. If you have one.", 'colorway'),
            "id" => "colorway_twitter",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("RSS Feed URL", 'colorway'),
            "desc" => __("Mention the URL of your RSS Feed Link here. If you have one.", 'colorway'),
            "id" => "colorway_rss",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Linked In URL", 'colorway'),
            "desc" => __("Mention the URL of your Linked In Link here. If you have one.", 'colorway'),
            "id" => "colorway_linkedin",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Stumble Upon URL", 'colorway'),
            "desc" => __("Mention the URL of your Stumble Upon Link here. If you have one.", 'colorway'),
            "id" => "colorway_stumble",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Digg URL", 'colorway'),
            "desc" => __("Mention the URL of your Digg Link here. If you have one.", 'colorway'),
            "id" => "colorway_digg",
            "std" => "",
            "type" => "text");
        $options[] = array("name" => __("Footer Text", 'colorway'),
            "desc" => __("Write the text here that will be displayed on the footer i.e. at the bottom of the Website.", 'colorway'),
            "id" => "footer_text",
            "std" => "",
            "type" => "textarea");
//****=============================================================================****//
//****-----------This code is used for creating color SEO description--------------****//							
//****=============================================================================****//						
        $options[] = array("name" => __("SEO Options", 'colorway'),
            "type" => "heading");
        $options[] = array("name" => __("Meta Keywords (comma separated)", 'colorway'),
            "desc" => __("Meta keywords provide search engines with additional information about topics that appear on your site. This only applies to your home page. Keyword Limit Maximum 8", 'colorway'),
            "id" => "colorway_keyword",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Meta Description", 'colorway'),
            "desc" => __("You should use meta descriptions to provide search engines with additional information about topics that appear on your site. This only applies to your home page.Optimal Length for Search Engines, Roughly 155 Characters", 'colorway'),
            "id" => "colorway_description",
            "std" => "",
            "type" => "textarea");
        $options[] = array("name" => __("Meta Author Name", 'colorway'),
            "desc" => __("You should write the full name of the author here. This only applies to your home page.", 'colorway'),
            "id" => "colorway_author",
            "std" => "",
            "type" => "text");
        update_option('of_template', $options);
        update_option('of_themename', $themename);
        update_option('of_shortname', $shortname);
    }

}
?>
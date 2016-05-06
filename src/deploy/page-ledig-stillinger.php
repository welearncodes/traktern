<?php 

if($_POST) {
    //user posted variables
    $name = $_POST['et_pb_contact_navn_2'];
    $email = $_POST['et_pb_contact_e-post_2'];
    $message = $_POST['et_pb_contact_melding_2'];
    $human = $_POST['message_human'];

    //php mailer variables
    $to = get_option('admin_email');
    $subject = "Someone sent a message from ".get_bloginfo('name');
    $headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n";

    if (!$human == 0) {
        if ($human != 2) {
            if($debug_ledig_stilling) print('not human!!!'); //not human!
            
        } else {

            //validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL))  if($debug_ledig_stilling) print('not human!!!'); //email is invalid
            else //email is valid
            {
                //validate presence of name and message
                if (empty($name) || empty($message)) {
                    if($debug_ledig_stilling) print('not human!!!'); //missing content
                } else //ready to go!
                {
                    $sent = wp_mail($to, $subject, strip_tags($message), $headers);
                    if ($sent)  if($debug_ledig_stilling) print('not human!!!');//message sent!
                    else if($debug_ledig_stilling) print('not human!!!');//message wasn't sent
                }
            }
        }
    } 
}

?> 
    
<?php 
/*
Template Name: Ledige stillinger
*/

get_header();

$is_page_builder_used = et_pb_is_pagebuilder_used(get_the_ID()); ?>

<div id="main-content">

    <?php if (!$is_page_builder_used): ?>

    <div class="container">
        <div id="content-area" class="clearfix">
            <div id="left-area">

                <?php endif; ?> <?php while (have_posts()): the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <?php if (!$is_page_builder_used): ?>

                    <h1 class="main_title"><?php the_title(); ?></h1> <?php 
$thumb = '';

$width = (int) apply_filters('et_pb_index_blog_image_width', 1080);

$height = (int) apply_filters('et_pb_index_blog_image_height', 675);
$classtext = 'et_featured_image';
$titletext = get_the_title();
$thumbnail = get_thumbnail($width, $height, $classtext, $titletext, $titletext, false, 'Blogimage');
$thumb = $thumbnail["thumb"];

if ('on' === et_get_option('divi_page_thumbnails', 'false') && '' !== $thumb) print_thumbnail($thumb, $thumbnail["use_timthumb"], $titletext, $width, $height);
?> <?php endif; ?>

                    <div class="entry-content">
                        <?php 
the_content();

if (!$is_page_builder_used) wp_link_pages(array('before' => '<div class="page-links">'.esc_html__('Pages:', 'Divi'), 'after' => '</div>'));
?>



                        <style type="text/css">
                            .error {
                                padding: 5px 9px;
                                border: 1px solid red;
                                color: red;
                                border-radius: 3px;
                            }
                            
                            .success {
                                padding: 5px 9px;
                                border: 1px solid green;
                                color: green;
                                border-radius: 3px;
                            }
                        </style>

                        <div id="respond">
                            <?php echo $response; ?>


                            <div class="et_pb_column et_pb_column_4_4  et_pb_column_2">


                                <div id="et_pb_contact_form_2" class="et_pb_module et_pb_contact_form_container clearfix  et_pb_contact_form_2" data-form_unique_num="2">


                                    <div class="et-pb-contact-message">Det er for tiden ingen annonserte stillinger, men legg gjerne igjen CV og kontaktinformasjon i skjemaet under så tar vi kontakt.</div>

                                    <div class="et_pb_contact">
                                        <form class="et_pb_contact_form clearfix" method="post" action="<?php the_permalink(); ?>" _lpchecked="1">

                                            <p class="et_pb_contact_field et_pb_contact_field_0 et_pb_contact_field_half">
                                                <label for="et_pb_contact_navn_2" class="et_pb_contact_form_label">Navn</label>
                                                <input type="text" id="et_pb_contact_navn_2" class="input" value="Navn" name="et_pb_contact_navn_2" data-required_mark="required" data-field_type="input" data-original_id="cv_navn">
                                            </p>
                                            <p class="et_pb_contact_field et_pb_contact_field_1 et_pb_contact_field_half et_pb_contact_field_last">
                                                <label for="et_pb_contact_e-post_2" class="et_pb_contact_form_label">E-postadresse</label>
                                                <input type="text" id="et_pb_contact_e-post_2" class="input" value="Epost" name="et_pb_contact_e-post_2 " data-required_mark="required " data-field_type="email " data-original_id="cv_e-post ">
                                            </p>
                                            <p class="et_pb_contact_field et_pb_contact_field_2 et_pb_contact_field_last ">
                                                <label for="et_pb_contact_melding_2 " class="et_pb_contact_form_label ">Kort om deg selv</label>
                                                <textarea name="et_pb_contact_melding_2 " id="et_pb_contact_melding_2 " value=" " class="et_pb_contact_message input " data-required_mark="required " data-field_type="text " data-original_id="cv_melding ">Melding</textarea>
                                            </p>
                                            <p class="et_pb_contact_field ">
                                                <label for="et_pb_contact_cv_2 " class="et_pb_contact_form_label ">Last opp CV</label>
                                                <input type="file" id="cv " name="cv " accept="application/pfd,application/msword,text/plain ">
                                            </p>
                                            
                                            <p class="et_pb_contact_field ">
                                                <label for="message_human " >Human Verification: <span>*</span>
                                                    <br>
                                                    <input type="text " style="width: 60px; "  class="input" name="message_human "> + 3 = 5</label>
                                            </p>

                                            <div class="et_contact_bottom_container ">

                                                <button type="submit " class="et_pb_contact_submit et_pb_button et_pb_custom_button_icon " data-icon=" ">Send</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>



                        </div>
                        <!-- .entry-content -->

                        <?php 
if (!$is_page_builder_used && comments_open() && 'on' === et_get_option('divi_show_pagescomments', 'false')) comments_template('', true);
?>

                </article>
                <!-- .et_pb_post -->

                <?php endwhile; ?> <?php if (!$is_page_builder_used): ?>

                </div>
                <!-- #left-area -->

                <?php get_sidebar(); ?>
            </div>
            <!-- #content-area -->
        </div>
        <!-- .container -->

        <?php endif; ?>

    </div>
    <!-- #main-content -->
    
    
    <?php get_footer(); ?>
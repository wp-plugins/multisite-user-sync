<?php
/*
Plugin Name: Multisite User Sync
Plugin URI: https://shamimbiplob.wordpress.com/contact-us/
Description: Multisite User Sync will automatically synchronise users to all sites in multisite. Roles of users will be same on everysite. If Role change in one site it will also synchronise to all site. If new user/site created it will also add to all site/users.
Version: 1.1
Author: Shamim
Author URI: https://shamimbiplob.wordpress.com/contact-us/
Text Domain: mu-sunc
License: GPLv2 or later
*/

/**
 * Create a new site
 * Loop through all users and add them to the new blog
 *
 * @param  INT $blog_id - New blog ID
 *
 * @return void
 */
add_action( 'wpmu_new_blog', 'mus_add_all_users_to_new_site' );
function mus_add_all_users_to_new_site($blog_id)
{
    global $wpdb;

    // Query all blogs from multi-site install
    $blogids = $wpdb->get_col("SELECT blog_id FROM ".$wpdb->base_prefix."blogs");

    foreach($blogids as $blogid)
    {
        $users = get_users( array('blog_id' => $blogid) );

        if(!empty($users))
        {
            foreach($users as $user)
            {
                if(!empty($user->roles))
                {
                    foreach($user->roles as $role)
                    {
                        add_user_to_blog($blog_id, $user->ID, $role );
                    }
                } else {
                    add_user_to_blog($blog_id, $user->ID, 'subscriber' );
                }
            }
        }
    }
}


/**
 * Add a new user to all other sites
 *
 * @param  INT $user_id - New User ID
 *
 * @return void
 */
add_action( 'user_register', 'mus_add_new_user_to_all_sites' );
function mus_add_new_user_to_all_sites( $user_id )
{
    global $wpdb;
	
	if( !is_multisite() )
        return;

    // Query all blogs from multi-site install
    $blogids = $wpdb->get_col("SELECT blog_id FROM ".$wpdb->base_prefix."blogs");
    $user = new WP_User( $user_id );

    if(!empty($blogids))
    {
        foreach($blogids as $blogid)
        {
			if(!empty($user->roles))
              {
            	foreach($user->roles as $role)
            	{
                	add_user_to_blog($blogid, $user_id, $role );
				}
            }
			else
				{
					add_user_to_blog($blogid, $user_id, 'subscriber' );
				}
        }
    }

}

/**
 * Assign user Role to all site when change in one site
 *
 * @param  INT $user_id
 * @param  STRING $role - New role
 * @param  ARRAY $old_roles - Old roles
 *
 * @return void
 */
add_action( 'set_user_role', 'mus_add_new_user_role_to_all_sites', 10, 2 );
function mus_add_new_user_role_to_all_sites( $user_id, $role )
{
    global $wpdb;
	
	if( !is_multisite() )
        return;

    // Query all blogs from multi-site install
    $blogids = $wpdb->get_col("SELECT blog_id FROM ".$wpdb->base_prefix."blogs");

    if(!empty($blogids))
    {
        foreach($blogids as $blogid)
        {
           add_user_to_blog($blogid, $user_id, $role );
			
          }
    }
}
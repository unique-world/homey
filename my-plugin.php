<?php
/*
Plugin Name: My Plugin
Description: This is a sample plugin.
Version: 1.0.0
Author: Your Name
*/

function my_plugin_create_table()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
     id INT(11) NOT NULL AUTO_INCREMENT,
        title VARCHAR(255) NOT NULL,
        description TEXT,
        price DECIMAL(10,2) NOT NULL,
        PRIMARY KEY (id)

    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

register_activation_hook(__FILE__, 'my_plugin_create_table');

// Step 1: Add a new menu item to the admin panel
add_action('admin_menu', 'listings_menu');
function listings_menu()
{
    add_menu_page(
        'Listings',
        'Listings',
        'manage_options',
        'listings',
        'listings_page'
    );
}

// Step 2: Create the form HTML and handle form submissions
function listings_page()
{
    if (isset($_POST['submit'])) {
        // Form submitted, handle CRUD operations here
        if ($_POST['submit'] === 'Add Listing') {
            // Handle adding a new listing
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );

            insert_listing($data);


        } elseif ($_POST['submit'] === 'Update Listing') {
            // Handle updating a listing
            var_dump($_POST['listing_id']);
            $listing_id = intval($_POST['listing_id']);
            $title = sanitize_text_field($_POST['title']);
            $description = sanitize_text_field($_POST['description']);
            $price = floatval($_POST['price']);

            $data = array(
                'title' => $title,
                'description' => $description,
                'price' => $price
            );


            update_listing($listing_id, $data);



        } elseif ($_POST['submit'] === 'Delete Listing') {
            // Handle deleting a listing
            $listing_id = intval($_POST['listing_id']);
            delete_listing($listing_id);
        }
    }

    // Step 3: Render the form HTML
    ?>

    <div class="wrap">
   
    <h1>Listings</h1>

      
        <h2>Add New Listing</h2>


       
      <?php  include plugin_dir_path(__FILE__) . 'tab-forms.php'; ?>

      <form id="custom-form" method="POST" action="<?php echo esc_url(admin_url('admin.php?page=listings')); ?>">
                            
                          <div class="form-field">
                           
                            <label for="title" style="display: block; margin-bottom: 5px;"><?php _e( 'Title:', 'text-domain' ); ?></label>
                            <input type="text" id="title" name="title" class="regular-text" style="width: 100%; padding: 5px;">
                          </div>

                          <div class="form-field">
                            <label for="description" style="display: block; margin-bottom: 5px;"><?php _e( 'Description:', 'text-domain' ); ?></label>
                            <textarea id="description" name="description" class="large-text" style="width: 100%; padding: 5px;"></textarea>
                          </div>

                          <div class="form-field">
                            <label for="price" style="display: block; margin-bottom: 5px;"><?php _e( 'Price:', 'text-domain' ); ?></label>
                            <input type="number" id="price" name="price" step="0.01" class="regular-text" style="width: 100%; padding: 5px;">
                          </div>
                      
                        <input type="submit" name="submit" value="Add Listing" class="button button-primary" style="padding: 5px 10px;">

                        </form>


        <h2>Manage Listings</h2>
        <?php
        // Display existing listings in a table
        $listings = get_listings();

        if (!empty($listings)) {
            ?>
            <table class="wp-list-table widefat fixed striped">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
           <?php foreach ($listings as $listing) : ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="selected_listing_id" value="<?php echo esc_attr($listing['id']); ?>">
                                </td>
                                <td><?php echo esc_html($listing['title']); ?></td>
                                <td><?php echo esc_html($listing['description']); ?></td>
                                <td><?php echo esc_html($listing['price']); ?></td>
                                <td>
                                    <form method="post" action="<?php echo esc_url(admin_url('admin.php?page=listings')); ?>">
                                        <input type="hidden" name="listing_id" value="<?php echo esc_attr($listing['id']); ?>">
                                        <div class="form-field">
                                            <input type="submit" name="submit" value="Update Listing" class="button button-primary" style="padding: 5px 10px;">
                                            <input type="submit" name="submit" value="Delete Listing" class="button button-primary" style="padding: 5px 10px;" onclick="return confirm('Are you sure you want to delete this listing?')">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                </tbody>
            </table>
            <?php
        } else {
            echo 'No listings found.';
        }
        ?>
    </div>
    <?php
}

// Insert a new listing
function insert_listing($data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';

    $wpdb->insert(
        $table_name,
        $data,
        array('%s', '%s', '%f')
    );
}

// Get all listings
function get_listings()
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';

    $results = $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

    return $results;
}

// Update a listing
function update_listing($listing_id, $data)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';

    $wpdb->update(
        $table_name,
        $data,
        array('id' => $listing_id),
        array('%s', '%s', '%f'),
        array('%d')
    );
}





// Delete a listing
function delete_listing($listing_id)
{
    global $wpdb;
    $table_name = $wpdb->prefix . 'listings';

    $wpdb->delete(
        $table_name,
        array('id' => $listing_id),
        array('%d')
    );
}


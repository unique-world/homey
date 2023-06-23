<?php
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

    // Add the first submenu item: "New Listings"
    add_submenu_page(
        'listings',
        'New Listings',
        'New Listings',
        'manage_options',
        'listings_submenu',
        'listings_submenu_page'
    );

    // Add the second submenu item: "Room Type"
    add_submenu_page(
        'listings',
        'Room Type',
        'Room Type',
        'manage_options',
        'room_type_submenu',
        'room_type_submenu_page'
    );

    // Add the third submenu item: "Amenities"
    add_submenu_page(
        'listings',
        'Amenities',
        'Amenities',
        'manage_options',
        'amenities_submenu',
        'amenities_submenu_page'
    );


      // Add the 4th submenu item: "Facilities"
    add_submenu_page(
        'listings',
        'Facilities',
        'Facilities',
        'manage_options',
        'Facilities_submenu',
        'Facilities_submenu_page'
    );
      // Add the third submenu item: "country"
    add_submenu_page(
        'listings',
        'Country',
        'Country',
        'manage_options',
        'country_submenu',
        'country_submenu_page'
    );
      // Add the third submenu item: "state"
    add_submenu_page(
        'listings',
        'State',
        'State',
        'manage_options',
        'state_submenu',
        'state_submenu_page'
    );
      // Add the third submenu item: "city"
    add_submenu_page(
        'listings',
        'City',
        'City',
        'manage_options',
        'city_submenu',
        'city_submenu_page'
    );
        // Add the third submenu item: "area"
    add_submenu_page(
        'listings',
        'Area',
        'Area',
        'manage_options',
        'area_submenu',
        'area_submenu_page'
    );
        // Add the third submenu item: "reservations"
    add_submenu_page(
        'listings',
        'Reservations',
        'Reservations',
        'manage_options',
        'reservations_submenu',
        'reservation_submenu_page'
    );
}

// Step 2: Create callback functions for each submenu page
function listings_submenu_page()
{
    // Code for the "New Listings" submenu page
    echo '<h1>New Listings Submenu Page</h1>';


    echo '<label>New Listings Submenu Page</label><br><hr>';
}

function room_type_submenu_page()
{
    // Code for the "Room Type" submenu page
    echo '<h1>Room Type Submenu Page</h1>';
   echo '<input type=text name = root_type placeholder ="Enter Room Type"';

   
}

function amenities_submenu_page()
{
    // Code for the "Amenities" submenu page
    echo '<h1>Amenities Submenu Page</h1>';
}

function facilities_submenu_page()
{
        echo '<h2> Place here code for facilities';

}

function country_submenu_page()

{ echo '<h2> Place here code country'; }
function state_submenu_page()
{ }

function city_submenu_page()
{ }

function area_submenu_page()
{ }
function reservation_submenu_page()
{ }

?>
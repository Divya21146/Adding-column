<?php
function add_column_to_custom_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . "your_table_name";  //replace with your table name

    $wpdb->query("ALTER TABLE $table_name ADD COLUMN new_column_name VARCHAR(255) NOT NULL AFTER existing_column_name;"); // Replace "new_column_name" with the desired name for the new column and specify the location by providing the name of the existing column in "existing_column_name."
}

add_action('init', 'add_column_to_custom_table');

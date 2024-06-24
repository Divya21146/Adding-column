<?php
function add_column_to_custom_table() {
    global $wpdb;

    $table_name = $wpdb->prefix . "your_table_name";  //replace with your table name

    $column_exists = $wpdb->get_var(  //storing if the new column name already exists in table or not
        $wpdb->prepare(
            "SHOW COLUMNS FROM `$table_name` LIKE %s", 
            'new_column_name'
        )
    );
    
    if (empty($column_exists)) {  //if there is no column with our new column name then add the column
        $wpdb->query(
            "ALTER TABLE `$table_name` 
            ADD COLUMN `new_column_name` VARCHAR(255) NOT NULL 
            AFTER 'existing_column_name'"
        );
    }
}

add_action('init', 'add_column_to_custom_table');

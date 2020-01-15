<?php
	include 'database.php';

	$queries = [];

	$queries['create_users_table'] = "CREATE TABLE users(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	name VARCHAR(255) NOT NULL,
	mobile VARCHAR(255) UNIQUE NOT NULL,
	email VARCHAR(255) NOT NULL,
	password VARCHAR(255) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP)";

	$queries['create_contacts_table'] = "CREATE TABLE contacts(
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	users_id INT UNSIGNED, 
	first_name VARCHAR(255) NOT NULL,
	last_name VARCHAR(255) NOT NULL,
	DOB DATE NOT NULL,
	gender VARCHAR(255) NOT NULL, 
	mobile VARCHAR(255) UNIQUE NOT NULL,
	email VARCHAR(255)  NOT NULL,
	contact_type VARCHAR(255)  NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	update_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT users_id
	FOREIGN KEY (users_id) REFERENCES users(id)
	ON DELETE CASCADE)";

	foreach ($queries as $query) {
	if ($conn->query($query) === TRUE) {
			echo "Table created successfully";
		}
		else {
			echo "Error creating table: " . $conn->error;
		}
	}
	 ?>
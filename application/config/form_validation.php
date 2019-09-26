<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	$config = array(
		'registration' => array(
			array(
				'field'  => 'userFirstName',
				'label'  => 'First Name',
				'rules'  => 'trim|required|min_length[1]|max_length[25]',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'min_length' => 'You have too few characters for your %s.',
					'max_length' => 'You have too many characters for your %s.',
				),
			),

			array(
				'field'  => 'userLastName',
				'label'  => 'Last Name',
				'rules'  => 'trim|required|min_length[1]|max_length[25]',
				'errors' => array(
					'required'   => 'You must provide a %s for your account.',
					'min_length' => 'You have too few characters for your %s.',
					'max_length' => 'You have too many characters for your %s.',
				),
			),

			array(
				'field'  => 'userEmail',
				'label'  => 'Email',
				'rules'  => 'trim|required|min_length[3]|max_length[255]|valid_email|is_unique[users.userEmail]',
				'errors' => array(
					'required'    => 'You must provide a %s for your account.',
					'min_length'  => 'You have too few characters for your %s.',
					'max_length'  => 'You have too many characters for your %s.',
					'valid_email' => 'The %s provided was not valid.',
					'is_unique'   => 'The %s provided was not unique.'
				),
			),

			array(
				'field'  => 'userPassword',
				'label'  => 'Password',
				'rules'  => 'required|min_length[8]|callback_password_check',
				'errors' => array(
					'required'                => 'You must provide a %s for your account.',
					'min_length'              => 'You have too few characters for your %s.',
					'password_check' => 'You do not have the correct amount of letters, numbers, or special characters in your password.'
				),
			),

			array(
				'field'  => 'userPasswordConfirm',
				'label'  => 'Password Confirmation',
				'rules'  => 'required|matches[userPassword]',
				'errors' => array(
					'required'              => 'You must provide a %s for your account.',
					'matches[userPassword]' => 'Your %s did not match.'
				),
			),
		)
	);

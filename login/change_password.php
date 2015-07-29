<?php

					require_once('db_connect.php');
					require_once('data_valid_fns.php');
					require_once('login_functions.php');
					require_once('member_form.php');

					session_start();

					$old_passwd = $_POST['old_passwd'];
					$new_passwd = $_POST['new_passwd'];
					$new_passwd2 = $_POST['new_passwd2'];

					try {

						check_valid_user();

						if (!filled_out($_POST)) {
							throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>You have not filled out the form completely<br><a href=\'login_form.php\'>..Back</a></span></div>');
						}

						if ($new_passwd != $new_passwd2) {
							throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>Passwords dont match<br><a href=\'login_form.php\'>..Back</a></span></div>');
						}

						if ((strlen($new_passwd) > 16) || (strlen($new_passwd) < 6)) {
							throw new Exception('<br /><div class=\'container\'><span style=\'color:red;\'>New passwrod must be between 6 and 16 characters<br><a href=\'login_form.php\'>..Back</a></span></div>');
						}


						// attempt to update
						change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
						echo '<br /><div class=\'container\'><span style=\'color:green;\'>Password changed.<br /></span></div>';
						echo '<a href=\'login_form.php\'>..Back</a>';
					}

					catch (Exception $e) {

						echo $e->getMessage();
					}

?>	
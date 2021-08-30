<?php 

function auth_check(){
	if (empty($_SESSION['email'])) {
		redirect('Auth');
	}
}
<?php
session_start();
if($_GET['data'] == 'upcoming') {
    $_SESSION['upcoming_ev'] =  true;
    $_SESSION['past_ev'] =  false;
} elseif($_GET['data'] == 'past') {
    $_SESSION['upcoming_ev'] =  false;
    $_SESSION['past_ev'] =  true;
}
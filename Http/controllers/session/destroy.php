<?php

// Log the user out   -destroy the session  -clear out the session and cookies file -finally redirect the user 

use Core\Authenticator;

Authenticator::logout();

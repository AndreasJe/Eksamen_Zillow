<?php
// Simple Bridge
// Destroying session and refering back to the index page.

session_destroy();
header('Location: ../index');
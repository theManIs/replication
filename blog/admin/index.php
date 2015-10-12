<?php
include '../php/M_digest.php';
new M_digest(['friend' => 'true']);
header('Location: ../?reference=redact');
?>
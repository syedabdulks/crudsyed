<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'smtp.gmail.com';       // Or your SMTP server
$config['smtp_port'] = 587;                    // TLS port (465 for SSL)
$config['smtp_user'] = 'rq.syedabdul@gmail.com'; // Your SMTP email
$config['smtp_pass'] = 'cppqlriqyjibanka';        // App password (not regular password)
$config['smtp_crypto'] = 'tls';                // 'tls' or 'ssl'
$config['mailtype'] = 'html';                  // 'text' or 'html'
$config['charset']  = 'utf-8';
$config['newline']  = "\r\n";                  // Required for some servers
$config['crlf']        = "\r\n"; 

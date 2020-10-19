<?php
session_start();
switch ($_SESSION['color']) {
    case 1:
        echo "<style>
        :root {--color1: #fff;--color2: #f6faff;--color3: #00d8ff;--color4: #0052ff;}
        </style>";
        break;
    case 2:
        echo "<style>
        :root {--color1: #000;--color2: #242424;--color3: #fff;--color4: #FE752F;}
        </style>";
        break;
    case 3:
        echo "<style>
        :root {--color1: #000;--color2: #242424;--color3: #fff;--color4: #1DB46F;}
        </style>";
        break;
    default:
        echo "<style>
        :root {--color1: #fff;--color2: #f6faff;--color3: #00d8ff;--color4: #0052ff;}
        </style>";
        break;
}

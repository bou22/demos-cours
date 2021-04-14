<?php

    echo filter_input(INPUT_GET, "message", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    echo "<br /><a href='index.php'>index</a>";
<?php

echo filter_var($argv[1], FILTER_VALIDATE_IP) ? "Yes\n" : "No\n";

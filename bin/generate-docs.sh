#!/bin/sh

phpdoc \
&& php vendor/fr3nch13/phpdoc-markdown/bin/fixHtmlToMd.php

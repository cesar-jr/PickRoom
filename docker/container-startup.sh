#!/bin/bash
php artisan optimize
exec apache2-foreground

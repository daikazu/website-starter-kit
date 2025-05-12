<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('footprints:prune')->daily();
Schedule::command('footprints:purge --days=365')->daily();

Schedule::command('app:prune-log-files --days=90')->daily();
Schedule::command('welcome-bar:prune')->daily();

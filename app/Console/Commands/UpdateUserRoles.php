<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class UpdateUserRoles extends Command
{
    protected $signature = 'user:update-roles';
    protected $description = 'Perbarui role pengguna berdasarkan angkatan';

    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            $user->updateRole();
        }

        $this->info('Semua role pengguna telah diperbarui.');
    }
}

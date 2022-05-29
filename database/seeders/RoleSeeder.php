<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //roles
        $admin = Role::create([
            'name' => 'admin',
        ]);
        $moderator = Role::create([
            'name' => 'moderator',
        ]);
        $editor = Role::create([
            'name' => 'editor',
        ]);
        $validator = Role::create([
            'name' => 'validator',
        ]);

        $admin = Permission::create([
            'name' => 'admin',
        ]);
        $manage_users = Permission::create([
            'name' => 'manage_users',
        ]);
        $list_users = Permission::create([
            'name' => 'list_users',
        ]);
        $manage_api = Permission::create([
            'name' => 'manage_api',
        ]);
        $create_api = Permission::create([
            'name' => 'create_api',
        ]);
        $manage_articles = Permission::create([
            'name' => 'manage_articles',
        ]);
        $validate_posts = Permission::create([
            'name' => 'validate_posts',
        ]);

        //assign permissions to roles
        $admin->givePermissionTo([
            $admin,
            $manage_users,
            $list_users,
            $manage_api,
            $create_api,
            $manage_articles,
            $validate_posts,
        ]);

        $moderator->givePermissionTo([
            $manage_users,
            $list_users,
            $manage_api,
            $create_api,
            $manage_articles,
            $validate_posts,
        ]);

        $editor->givePermissionTo([
            $manage_articles,
        ]);

        $validator->givePermissionTo([
            $validate_posts,
        ]);

        //save roles to database
        $admin->save();
        $moderator->save();
        $editor->save();
        $validator->save();







    }
}
